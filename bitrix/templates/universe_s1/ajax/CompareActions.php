<?php
namespace template\ajax;

use intec\Core;
use intec\core\handling\Actions;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use Bitrix\Main\Loader;

class CompareActions extends Actions
{
    /**
     * @inheritdoc
     */
    public function beforeAction ($action)
    {
        if (parent::beforeAction($action)) {
            if (!Loader::includeModule('iblock'))
                return false;

            return true;
        }

        return false;
    }

    /**
     * Возвращает данные запроса.
     * @return array|mixed
     */
    protected function getData()
    {
        $data = Core::$app->request->post('data');
        return Type::isArray($data) ? $data : [];
    }

    /**
     * Добавление товарова в список сравнения.
     * @post int $id Идентификатор элемента инфоблока.
     * @post string $list Код списка сравнения.
     * @post int $iblock Идентификатор инфоблока.
     * @return bool
     */
    public function actionAdd ()
    {
        $session = Core::$app->session;
        $data = $this->getData();
        $id = ArrayHelper::getValue($data, 'id');
        $id = Type::toInteger($id);
        $key = ArrayHelper::getValue($data, 'list');
        $iblock = ArrayHelper::getValue($data, 'iblock');

        if (empty($id) || empty($key))
            return false;

        $arElement = \CIBlockElement::GetByID($id)->GetNext();

        if (empty($arElement))
            return false;

        $list = $session->get($key);
        $iblock = !empty($iblock) ? $iblock : ArrayHelper::getValue($arElement, 'IBLOCK_ID');

        if (!Type::isArray($list))
            $list = [];

        $item = ArrayHelper::getValue($list, [$iblock, 'ITEMS', $id]);

        if (empty($item))
            $list[$iblock]['ITEMS'][$id] = ['ID' => $id];

        $session->set($key, $list);

        return true;
    }

    /**
     * Получает товары из списка сравнения.
     * @post string $list Код списка сравнения.
     * @return bool|array
     */
    public function actionGet()
    {
        $session = Core::$app->session;
        $data = $this->getData();
        $key = ArrayHelper::getValue($data, 'list');

        if (empty($key))
            return false;

        $result = [];
        $list = $session->get($key);

        if (!Type::isArray($list))
            $list = [];

        foreach ($list as $id => $items) {
            $result[$id] = [];
            $items = ArrayHelper::getValue($items, 'ITEMS');

            if (Type::isArray($items))
                foreach ($items as $item) {
                    $item = ArrayHelper::getValue($item, 'ID');

                    if (!empty($item))
                        $result[$id][] = $item;
                }
        }

        return $result;
    }

    /**
     * Удаление товара из списка сравнения.
     * @post int $id Идентификатор элемента инфоблока.
     * @post string $list Код списка сравнения.
     * @post string $iblock Идентификатор инфоблока.
     * @return bool
     */
    public function actionRemove ()
    {
        $session = Core::$app->session;
        $data = $this->getData();
        $id = ArrayHelper::getValue($data, 'id');
        $id = Type::toInteger($id);
        $key = ArrayHelper::getValue($data, 'list');
        $iblock = ArrayHelper::getValue($data, 'iblock');

        if (empty($id) || empty($key))
            return false;

        $arElement = \CIBlockElement::GetByID($id)->GetNext();

        if (empty($arElement))
            return false;

        $list = $session->get($key);
        $iblock = !empty($iblock) ? $iblock : ArrayHelper::getValue($arElement, 'IBLOCK_ID');

        if (!Type::isArray($list))
            $list = [];

        $item = ArrayHelper::getValue($list, [$iblock, 'ITEMS', $id]);

        if (!empty($item))
            unset($list[$iblock]['ITEMS'][$id]);

        $session->set($key, $list);

        return true;
    }

    /**
     * Очистка списка сравнения.
     * @post string $list Код списка сравнения.
     * @return bool
     */
    public function actionClear ()
    {
        $session = Core::$app->session;
        $data = $this->getData();
        $key = ArrayHelper::getValue($data, 'list');

        if (empty($key))
            return false;

        $session->remove($key);

        return true;
    }
}