<? include(__DIR__.'/.begin.php') ?>
<?

use Bitrix\Main\Loader;
use intec\core\base\Collection;

/**
 * @var Collection $data
 * @var array $languages
 * @var string $solution
 * @var CWizardBase $wizard
 * @var Closure($code, $type, $file, $fields = []) $import
 * @var CWizardStep $this
 */

$code = $solution.'_products_'.WIZARD_SITE_ID;
$type = 'catalogs';
$iBlock = $import($code, $type, 'products', [
    'CODE' => [
        'IS_REQUIRED' => 'N'
    ]
]);

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['PRODUCTS_IBLOCK_TYPE'] = $type;
    $macros['PRODUCTS_IBLOCK_ID'] = $iBlock['ID'];
    $macros['PRODUCTS_IBLOCK_CODE'] = $iBlock['CODE'];
    $macros['PRODUCTS_CATEGORIES_IDS'] = [];

    $result = CIBlockSection::GetList(['SORT' => 'ASC'], [
        'IBLOCK_ID' => $iBlock['ID'],
        'ACTIVE' => 'Y'
    ]);

    $number = 0;

    while ($category = $result->GetNext()) {
        $number++;

        if ($number > 6)
            break;
        $macros['PRODUCTS_CATEGORIES_IDS_'.$number] = $category['ID'];
        $macros['PRODUCTS_CATEGORIES_IDS'][] = $category['ID'];
    }

    if (Loader::includeModule('intec.startshop') && $mode !== WIZARD_MODE_UPDATE) {
        $price = CStartShopPrice::GetByCode('BASE')->Fetch();

        if (!empty($price)) {
            $property = CIBlockProperty::GetList([], [
                'IBLOCK_ID' => $iBlock['ID'],
                'CODE' => 'STARTSHOP_PRICE'
            ])->Fetch();

            if (!empty($property))
                (new CIBlockProperty())->Update($property['ID'], [
                    'CODE' => 'STARTSHOP_PRICE_'.$price['ID']
                ]);

            $property = CIBlockProperty::GetList([], [
                'IBLOCK_ID' => $iBlock['ID'],
                'CODE' => 'STARTSHOP_CURRENCY'
            ])->Fetch();

            if (!empty($property))
                (new CIBlockProperty())->Update($property['ID'], [
                    'CODE' => 'STARTSHOP_CURRENCY_'.$price['ID']
                ]);
        }

        CStartShopCatalog::Add([
            'IBLOCK' => $iBlock['ID'],
            'USE_QUANTITY' => true
        ]);
    }

    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>