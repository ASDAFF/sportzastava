<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;

/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

if (!CModule::IncludeModule('intec.startshop') || !CModule::IncludeModule('intec.core'))
	return false;


$request = Core::$app->request;

$arParams = ArrayHelper::merge([
    'REQUEST_VARIABLE_ACTION' => 'action',
    'REQUEST_VARIABLE_PROPERTIES' => 'properties',
    'PRODUCT' => null,
    'CURRENCY' => null,
    'DELIVERY' => null,
    'PAYMENT' => null,
    'STATUS' => null,
    'PROPERTIES' => []
], $arParams);

$bSend = $request->post($arParams['REQUEST_VARIABLE_ACTION']) == 'send';
$arUser = null;
$arProduct = null;
$arCurrency = null;
$arStatus = null;
$arPropertiesAll = CStartShopOrderProperty::GetList(['SORT' => 'ASC'], [
    'SID' => SITE_ID,
    'ACTIVE' => 'Y'
]);
$arPropertiesAll = CStartShopUtil::DBResultToArray($arPropertiesAll);
$arProperties = [];
$arValues = $request->post($arParams['REQUEST_VARIABLE_PROPERTIES']);
$arOrder = null;
$arError = null;

if ($USER->IsAuthorized()) {
    $arUser = CUser::GetByID($USER->GetID());
    $arUser = $arUser->GetNext();

    if (empty($arUser))
        $arUser = null;
}

if (!Type::isArray($arValues))
    $arValues = [];

if (!empty($arParams['PRODUCT_ID'])) {
    $arProduct = CStartShopCatalogProduct::GetByID(
        $arParams['PRODUCT_ID'], [], [],
        $arParams['CURRENCY']
    );
    $arProduct = $arProduct->GetNext();

    if (!empty($arProduct)) {

        if (!empty($arProduct['PREVIEW_PICTURE']))
            $arProduct['PREVIEW_PICTURE'] = CFile::GetFileArray($arProduct['PREVIEW_PICTURE']);

        if (!empty($arProduct['DETAIL_PICTURE']))
            $arProduct['DETAIL_PICTURE'] = CFile::GetFileArray($arProduct['DETAIL_PICTURE']);

        $quantityRatio = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'QUANTITY', 'RATIO'], 1);
        $quantity = ArrayHelper::getValue($arParams, 'PRODUCT_QUANTITY', 1);
        $quantity = Type::toFloat($quantity);
        $quantity = round($quantity / $quantityRatio) * $quantityRatio;
        if ($quantity < $quantityRatio) {
            $quantity = $quantityRatio;
        }

        $arProduct['QUANTITY'] = $quantity;
        $arProduct['PRICE'] = $price = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'PRICES', 'MINIMAL', 'VALUE'], 0);
        $arProduct['SUM'] = $price * $quantity;
        unset($quantity, $price);
    } else {
        $arProduct = null;
    }
}

if (!empty($arParams['CURRENCY'])) {
    $arCurrency = CStartShopCurrency::GetByCode($arParams['CURRENCY']);
    $arCurrency = $arCurrency->GetNext();

    if (empty($arCurrency))
        $arCurrency = null;
}

if (!empty($arParams['STATUS'])) {
    $arStatus = CStartShopOrderStatus::GetByID($arParams['STATUS']);
    $arStatus = $arStatus->GetNext();

    if (empty($arStatus))
        $arStatus = null;
}

if (empty($arStatus)) {
    $arStatus = CStartShopOrderStatus::GetDefault(SITE_ID);
    $arStatus = $arStatus->GetNext();

    if (empty($arStatus))
        $arStatus = null;
}

foreach ($arPropertiesAll as $arProperty) {
    if ($arProperty['REQUIRED'] == 'Y' || ArrayHelper::isIn($arProperty['ID'], $arParams['PROPERTIES'])) {
        $bReceived = ArrayHelper::keyExists($arProperty['CODE'], $arValues);
        $sValue = ArrayHelper::getValue($arValues, $arProperty['CODE']);
        $bEmpty = empty($sValue) && !Type::isNumeric($sValue);

        if (!empty($arUser) && !empty($arProperty['USER_FIELD']) && !$bReceived) {
            $sValue = ArrayHelper::getValue($arUser, $arProperty['USER_FIELD']);
            $bEmpty = empty($sValue) && !Type::isNumeric($sValue);
        }

        $bEmptyError = false;
        $bInvalidError = false;
        $bLengthError = false;

        if ($bSend) {
            $bEmptyError = $bEmpty && $arProperty['REQUIRED'] == 'Y';

            if ($arProperty['TYPE'] == 'S') {
                if (empty($arProperty['SUBTYPE']) && $arProperty['DATA']['LENGTH'] > 0)
                    $bLengthError = StringHelper::length($sValue) > $arProperty['DATA']['LENGTH'];

                if (!empty($arProperty['DATA']['EXPRESSION']))
                    $bInvalidError = !RegExp::isMatchBy($arProperty['DATA']['EXPRESSION'], $sValue);
            }
        }

        $arProperty['VALUE'] = $sValue;
        $arProperty['ERROR'] = $bEmptyError || $bInvalidError || $bLengthError;
        $arProperty['ERRORS'] = [
            'EMPTY' => $bEmptyError,
            'INVALID' => $bInvalidError,
            'LENGTH' => $bLengthError
        ];

        if ($arProperty['ERROR'])
            $arError = [
                'CODE' => 'PROPERTIES'
            ];

        $arProperties[$arProperty['ID']] = $arProperty;

        unset($sValue);
        unset($bEmpty);
        unset($bEmptyError);
        unset($bInvalidError);
        unset($bLengthError);
    }
}

if ($request->getIsPost() && $bSend && $arError === null) {
    $fSum = 0;
    $arPropertiesMail = [];
    $arFields = array(
        'SID' => SITE_ID,
        'ITEMS' => [],
        'PROPERTIES' => []
    );

    if (!empty($arProduct)) {
        $fQuantity = ArrayHelper::getValue($arProduct, 'QUANTITY');
        $fPrice = ArrayHelper::getValue($arProduct, 'PRICE');
        $fSum = ArrayHelper::getValue($arProduct, 'SUM');

        $arFields['ITEMS'][$arProduct['ID']] = [
            'NAME' => $arProduct['NAME'],
            'QUANTITY' => $fQuantity,
            'PRICE' => $fPrice
        ];
    } else {
        $arProducts = CStartShopBasket::GetList([], [], [], [], $arCurrency['CODE'], SITE_ID);
        $arProducts = CStartShopUtil::DBResultToArray($arProducts);

        foreach ($arProducts as $arProduct) {
            $fPrice = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'BASKET', 'PRICE', 'VALUE'], 0);
            $fQuantity = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'BASKET', 'QUANTITY']);
            $fQuantity = $fQuantity < 0 ? 1 : Type::toFloat($fQuantity);
            $fSum = $fPrice * $fQuantity;

            $arFields['ITEMS'][$arProduct['ID']] = [
                'NAME' => $arProduct['NAME'],
                'QUANTITY' => $fQuantity,
                'PRICE' => $fPrice
            ];
        }

        $arProduct = null;
    }

    foreach ($arProperties as $arProperty)
        $arFields['PROPERTIES'][$arProperty['ID']] = $arProperty['VALUE'];

    if (!empty($arUser))
        $arFields['USER'] = $arUser['ID'];

    if (!empty($arCurrency))
        $arFields['CURRENCY'] = $arCurrency['CODE'];

    if (!empty($arParams['DELIVERY']))
        $arFields['DELIVERY'] = $arParams['DELIVERY'];

    if (!empty($arParams['PAYMENT']))
        $arFields['PAYMENT'] = $arParams['PAYMENT'];

    if (!empty($arStatus))
        $arFields['STATUS'] = $arStatus['ID'];

    $iOrderId = CStartShopOrder::Add($arFields);

    if (!empty($iOrderId)) {
        if (empty($arProduct))
            CStartShopBasket::Clear(SITE_ID);

        $arOrder = CStartShopOrder::GetByID($iOrderId);
        $arOrder = $arOrder->GetNext();

        $sProperties = '';
        $sItems = '';

        foreach ($arOrder['PROPERTIES'] as $iPropertyId => $sPropertyValue) {
            $arProperty = ArrayHelper::getValue($arProperties, $iPropertyId);

            if (empty($arProperty))
                continue;

            $sProperties .= $arProperty['LANG'][LANGUAGE_ID]['NAME'].' - '.$sPropertyValue."\r\n";
        }

        foreach ($arOrder['ITEMS'] as $arItem)
            $sItems .= $arItem['NAME'].' - '.
                $arItem['QUANTITY'].'x'.
                CStartShopCurrency::FormatAsString(CStartShopCurrency::Convert(
                    $arItem['PRICE'],
                    $arOrder['CURRENCY']
                ))."\r\n";

        if (CStartShopVariables::Get('MAIL_USE', 'N', SITE_ID) == 'Y') {
            if (CStartShopVariables::Get('MAIL_ADMIN_ORDER_CREATE', 'N', SITE_ID) == 'Y') {
                $sEvent = CStartShopVariables::Get('MAIL_ADMIN_ORDER_CREATE_EVENT', '', SITE_ID);
                $sMail = CStartShopVariables::Get('MAIL_MAIL', '', SITE_ID);
                $oEvent = new CEvent();

                if (!empty($sEvent) && !empty($sMail))
                    $oEvent->SendImmediate($sEvent, SITE_ID, array(
                        'ORDER_ID' => $arOrder['ID'],
                        'ORDER_AMOUNT' => CStartShopCurrency::FormatAsString(CStartShopCurrency::Convert($fSum, $arOrder['CURRENCY'])),
                        'STARTSHOP_SHOP_EMAIL' => $sMail,
                        'STARTSHOP_ORDER_LIST' => $sItems,
                        'STARTSHOP_ORDER_PROPERTY' => $sProperties
                    ), 'N', '');
            }
        }
    } else {
        $arError = [
            'CODE' => 'ORDER',
            'STAGE' => 'CREATE'
        ];
    }
}

$arResult['PRODUCT'] = $arProduct;
$arResult['CURRENCY'] = $arCurrency;
$arResult['STATUS'] = $arStatus;
$arResult['PROPERTIES'] = $arProperties;
$arResult['ORDER'] = $arOrder;
$arResult['ERROR'] = $arError;

$this->IncludeComponentTemplate();