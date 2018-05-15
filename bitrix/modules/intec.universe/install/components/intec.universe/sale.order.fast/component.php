<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Sale;
use Bitrix\Sale\Delivery\Services\Manager as Deliveries;
use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 */

global $APPLICATION;

if (!CModule::IncludeModule('intec.core')
    || !CModule::IncludeModule('iblock')
    || !CModule::IncludeModule('sale')
    || !CModule::IncludeModule('catalog')
    || !CModule::IncludeModule('currency'))
    return false;


if (!function_exists('json_encode'))
{
    function json_encode($value)
    {
        if (is_int($value)) { return (string)$value; }
        elseif (is_string($value))
        {
            $value = str_replace(array('\\', '/', '"', "\r", "\n", "\b", "\f", "\t"),  array('\\\\', '\/', '\"', '\r', '\n', '\b', '\f', '\t'), $value);
            $convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
            $result = "";
            for ($i = mb_strlen($value) - 1; $i >= 0; $i--)
            {
                $mb_char = mb_substr($value, $i, 1);
                if (mb_ereg("&#(\\d+);", mb_encode_numericentity($mb_char, $convmap, "UTF-8"), $match)) { $result = sprintf("\\u%04x", $match[1]) . $result;  }
                else { $result = $mb_char . $result;  }
            }
            return '"' . $result . '"';
        }
        elseif (is_float($value)) { return str_replace(",", ".", $value); }
        elseif (is_null($value)) {  return 'null';}
        elseif (is_bool($value)) { return $value ? 'true' : 'false';   }
        elseif (is_array($value))
        {
            $with_keys = false;
            $n = count($value);
            for ($i = 0, reset($value); $i < $n; $i++, next($value))  { if (key($value) !== $i) {  $with_keys = true; break;  }  }
        }
        elseif (is_object($value)) { $with_keys = true; }
        else { return ''; }
        $result = array();
        if ($with_keys)  {  foreach ($value as $key => $v) {  $result[] = json_encode((string)$key) . ':' . json_encode($v); }  return '{' . implode(',', $result) . '}'; }
        else {  foreach ($value as $key => $v) { $result[] = json_encode($v); } return '[' . implode(',', $result) . ']';  }
    }
}

if (!function_exists('getJson'))
{
    function getJson($message, $res='N', $error='')
    {
        global $APPLICATION;
        $result = array(
            'result' => $res=='Y'?'Y':'N',
            'message' => $APPLICATION->ConvertCharset($message, SITE_CHARSET, 'utf-8')
        );
        if (strlen($error) > 0) { $result['err'] = $APPLICATION->ConvertCharset($error, SITE_CHARSET, 'utf-8'); }
        return json_encode($result);
    }
}


$arResult = array(
    'COMPONENT_HASH' => 'sale_order_fast_'. spl_object_hash($this),
    'PRODUCT' => array(),
    'SHOW_ORDER_PROPERTIES' => array(),
    'ORDER_PROPERTIES' => array(),
    'FORM_RESULT' => null
);

$arProperties = $arParams['SHOW_ORDER_PROPERTIES'];

if (!Type::isArray($arProperties))
    $arProperties = [];

$arResult['SHOW_ORDER_PROPERTIES'] = $arProperties;

if (empty($arParams['PERSON_TYPE_ID']))
    $arParams['PERSON_TYPE_ID'] = 1;

// Order properties
$saleOrderPropsFilter = array(
    'PERSON_TYPE_ID' => $arParams['PERSON_TYPE_ID']
);
$saleOrderProps = CSaleOrderProps::GetList(array(), $saleOrderPropsFilter);
while ($row = $saleOrderProps->GetNext()) {

    if ($row['ID'] === $arParams['PROPERTY_PHONE']) {
        $row['REQUIED'] = true;
    } else {
        $row['REQUIED'] = $row['REQUIED'] == 'Y';
    }

    if (!$row['REQUIED'] && !ArrayHelper::isIn($row['ID'], $arProperties))
        continue;

    $arResult['ORDER_PROPERTIES'][$row['ID']] = $row;
}
unset($saleOrderProps, $saleOrderPropsFilter);

$request = Core::$app->request;
$requestPOST = $request->post();

$productId = ArrayHelper::getValue($arParams, 'PRODUCT_ID');
$productQuantity = ArrayHelper::getValue($arParams, 'PRODUCT_QUANTITY', 1);
$productMeasureRatio = 1;
if ($productId) {
    $measureRatioResult = CCatalogMeasureRatio::getList(array(), array(
        'PRODUCT_ID' => $productId
    ));
    if ($measureRatioResult) {
        $measureRatioArray = $measureRatioResult->GetNext();
        if (!empty($measureRatioArray['RATIO'])) {
            $productMeasureRatio = $measureRatioArray['RATIO'];
            if ($productMeasureRatio > $productQuantity) {
                $productQuantity = $productMeasureRatio;
            }
        }
        unset($measureRatioArray);
    }
    unset($measureRatioResult);
}


if (!empty($requestPOST)) {

    $personTypeId = ArrayHelper::getValue($arParams, 'PERSON_TYPE_ID');
    $deliveryId = ArrayHelper::getValue($arParams, 'DELIVERY_ID');
    $paymentId = ArrayHelper::getValue($arParams, 'PAYMENT_ID');
    $comment = trim($request->post('COMMENT', ''));
    $name = '';
    $email = '';
    $phone = '';
    $hasErrors = false;
    $userId = null;

    foreach ($arResult['ORDER_PROPERTIES'] as $property) {
        if ($property['IS_EMAIL'] == 'Y') {
            $email = $request->post($property['CODE'], '');
        } else if ($property['IS_PHONE'] == 'Y') {
            $phone = $request->post($property['CODE'], '');
        } else if ($property['IS_PROFILE_NAM'] == 'Y') {
            $name = $request->post($property['CODE'], '');
        }
        if (in_array($property['TYPE'], ['TEXT', 'TEXTAREA']) &&
            $property['REQUIED'] == 'Y' &&
            !$request->post($property['CODE'], false)) {
            $arResult['ORDER_PROPERTIES'][$property['ID']]['IS_EMPTY'] = true;
            $hasErrors = true;
            $arResult['FORM_RESULT'] = 'REQUIED_FIELDS_IS_EMPTY';
        }
    }

    if (!empty($arParams['PROPERTY_PHONE'])) {
        $phone = $request->post($arParams['PROPERTY_PHONE'], '');
    }

    if (!$hasErrors) {
        // User registration
        global $USER;

        if (!$USER->IsAuthorized()) {
            $login = 'user_' . (microtime(true) * 10000);

            if (empty($email)) {
                $email = $login . '@' . $_SERVER['SERVER_NAME'];
            } else {
                $email = trim($email);
                $arUser = CUser::GetList($by = 'ID', $order = 'ASC', array(
                    '=EMAIL' => $email
                ));

                if ($arUser->SelectedRowsCount() > 0 && COption::GetOptionString("main", "new_user_email_uniq_check")=='Y') {
                    $email = $login . '@' . $_SERVER['SERVER_NAME'];
                }

                /*if ($arUser->SelectedRowsCount() == 1) {
                    $arUser = $arUser->Fetch();
                    $userId = $arUser['ID'];
                    $login = $arUser['LOGIN'];
                } else if ($arUser->SelectedRowsCount() != 0) {
                    $hasErrors = true;
                }*/
            }

            if ($userId === null) {
                $captcha = COption::GetOptionString('main', 'captcha_registration', 'N');

                if ($captcha == 'Y')
                    COption::SetOptionString('main', 'captcha_registration', 'N');

                $userPassword = randString(10);
                $userName = explode(' ', $name);
                $userLastName = '';

                if (count($userName) > 1)
                    $userLastName = $userName[1];

                $userName = $userName[0];
                $arUser = $USER->Register(
                    $login,
                    $userName,
                    $userLastName,
                    $userPassword,
                    $userPassword,
                    $email
                );

                if ($captcha == 'Y')
                    COption::SetOptionString('main', 'captcha_registration', 'Y');

                if ($arUser['TYPE'] == 'ERROR') {
                    $hasErrors = true;
                    $arResult['FORM_RESULT'] = 'USER_REGISTER_INVALID';
                } else {
                    $userId = $USER->GetID();

                    if (!empty($phone))
                        $USER->Update($userId, array('PERSONAL_PHONE' => $phone));

                    $USER->Logout();
                }
            }
        } else {
            $userId = $USER->GetID();
        }

        if (!$hasErrors) {
            $saleBasket = CSaleBasket::GetList(
                array('SORT' => 'DESC'),
                array(
                    'FUSER_ID' => CSaleBasket::GetBasketUserID(),
                    'LID' => SITE_ID,
                    'ORDER_ID' => 'NULL'
                ),
                false,
                false,
                array('ID', 'PRODUCT_ID', 'QUANTITY')
            );

            $backToBasket = array();

            if (!$productId) {
                $added = true;
            } else {
                while ($row = $saleBasket->fetch()) {
                    $backToBasket[$row['PRODUCT_ID']] = $row['QUANTITY'];
                    CSaleBasket::Delete($row['ID']);
                }
                $added = Add2BasketByProductID($productId, $productQuantity, array(), false);
            }

            if (!$added) {
                $strError = '';
                if ($ex = $APPLICATION->GetException()) {
                    $strError = $ex->GetString();
                }

                if ($strError) {
                    $arResult['FORM_RESULT'] = $strError;
                } else {
                    $arResult['FORM_RESULT'] = getJson(GetMessage('ITEM_ADD_FAIL'), 'N', $strError);
                }
            } else {
                //start D7_orderCreate
                $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());

                $order = Bitrix\Sale\Order::create(SITE_ID, $userId);
                $order->setPersonTypeId($personTypeId);
                $order->setBasket($basket);

                //Добавление отгрузки
                $shipmentCollection = $order->getShipmentCollection();
                /** @var Sale\Shipment $shipment */
                $shipment = $shipmentCollection->createItem();
                $shipmentItemCollection = $shipment->getShipmentItemCollection();
                foreach ($basket as $basketItem) {
                    $discountPrice = getSalePrice(
                        $basketItem->getField('PRODUCT_ID'),
                        $basketItem->getId(),
                        $basketItem->getFinalPrice(),
                        $basketItem->getQuantity(),
                        $basketItem->getCurrency()
                    );
                    $basketItem->setPrice($discountPrice, true);
                    $item = $shipmentItemCollection->createItem($basketItem);
                    $item->setQuantity($basketItem->getQuantity());
                }
                $arDeliveryServiceAll = Deliveries::getRestrictedObjectsList($shipment);
                $shipmentCollection = $shipment->getCollection();

                if (!empty($arDeliveryServiceAll)) {
                    if (array_key_exists($deliveryId, $arDeliveryServiceAll)) {
                        $deliveryObj = $arDeliveryServiceAll[$deliveryId];
                    } else {
                        $deliveryObj = reset($arDeliveryServiceAll);
                    }

                    $shipment->setDeliveryService($deliveryObj);

                    /*if ($deliveryObj->isProfile()) {
                        $name = $deliveryObj->getNameWithParent();
                    } else {
                        $name = $deliveryObj->getName();
                    }

                    $shipment->setFields(array(
                        'DELIVERY_ID' => $deliveryObj->getId(),
                        'DELIVERY_NAME' => $name,
                        'CURRENCY' => $order->getCurrency()
                    ));*/

                    $shipmentCollection->calculateDelivery();
                }

                //Добавление оплаты
                $paymentCollection = $order->getPaymentCollection();
                $payment = $paymentCollection->createItem(
                    Bitrix\Sale\PaySystem\Manager::getObjectById($paymentId)
                );
                $order->getDiscount()->calculate();
                $order->setField('COMMENTS', $comment);
                $order->setField('USER_DESCRIPTION', $comment);
                $order->setField('USER_ID', $userId);

                //свойства заказа
                $propertyCollection = $order->getPropertyCollection();
                foreach ($propertyCollection->getGroups() as $group)
                {
                    foreach ($propertyCollection->getGroupProperties($group['ID']) as $property)
                    {
                        $prop = $property->getProperty();
                        $propRequest = $request->post($prop["CODE"]);
                        if (!empty($propRequest))
                            $property->setValue($propRequest);
                    }
                }

                //Сумма заказа для письма
                $orderPrice = $order->getPrice();

                $result = $order->save();

                $orderId = $order->GetId();

                /*if ($result->isSuccess()) {
                    $arResult['FORM_RESULT'] = GetMessage('SOF_FORM_RESULT');
                } else {
                    $arResult['FORM_RESULT'] = getJson($result->getErrors(), 'Y');
                }*/

                $arResult['FORM_RESULT'] = json_decode(getJson($result->getErrors(), 'Y'), 'Y');

                //end D7_orderCreate
            }

            foreach ($backToBasket as $id => $quantity) {
                Add2BasketByProductID($id, $quantity, array(), false);
            }
        }
    }
}


$arResult['SHOW_FORM'] = true;
if (is_array($arResult['FORM_RESULT']) && !empty($arResult['FORM_RESULT']['result']) && $arResult['FORM_RESULT']['result'] == 'Y') {
    $arResult['SHOW_FORM'] = false;
}

if (!empty($arParams['SHOW_COMMENT']) && $arParams['SHOW_COMMENT'] == 'Y') {
    $arResult['ORDER_PROPERTIES'][] = array(
        'ID' => null,
        'CODE' => 'COMMENT',
        'TYPE' => 'TEXTAREA',
        'NAME' => GetMessage('SOF_COMMENT'),
        'DEFAULT_VALUE' => '',
        'REQUIED' => false
    );
}

// Product if pointed
if ($productId) {
    $element = CIBlockElement::GetByID($productId);
    $element = $element->GetNext();
    $element['PICTURE'] = array();
    $element['QUANTITY'] = $productQuantity;
    $element['PRODUCT'] = CCatalogProduct::GetByID($productId);

    $measureResult = CCatalogMeasure::getList(array(), array(
        'ID' => $element['PRODUCT']['MEASURE']
    ));
    if ($measureResult) {
        $element['MEASURE'] = $measureResult->GetNext();
    }

    $element['PRICE'] = CCatalogProduct::GetOptimalPrice($productId, 1);

    if ($element['PREVIEW_PICTURE']) {
        $element['PICTURE'] = CFile::GetFileArray($element['PREVIEW_PICTURE']);
    }
    if ($element['DETAIL_PICTURE']) {
        $element['PICTURE'] = CFile::GetFileArray($element['DETAIL_PICTURE']);
    }

    if (!$element['PICTURE']) {
        $parentProduct = CCatalogSku::GetProductInfo($element['ID'], $element['IBLOCK_ID']);
        if ($parentProduct) {
            $parentProductId = ArrayHelper::getValue($parentProduct, 'ID');
            $parentElement = CIBlockElement::GetList(
                array(),
                array('ID' => $parentProductId),
                false,
                false,
                array('PREVIEW_PICTURE', 'DETAIL_PICTURE')
            );
            $parentElement = $parentElement->getNext();

            $parentElementPicturePreview = ArrayHelper::getValue($parentElement, 'PREVIEW_PICTURE');
            $parentElementPictureDetail = ArrayHelper::getValue($parentElement, 'DETAIL_PICTURE');

            if (empty($parentElementPicturePreview)) {
                if (!empty($parentElementPictureDetail)) {
                    $element['PICTURE'] = CFile::GetFileArray($parentElementPictureDetail);
                }
            } else {
                $element['PICTURE'] = CFile::GetFileArray($parentElementPicturePreview);
            }
        }
    }

    $arResult['ELEMENT'] = $element;
}

$this->IncludeComponentTemplate();
