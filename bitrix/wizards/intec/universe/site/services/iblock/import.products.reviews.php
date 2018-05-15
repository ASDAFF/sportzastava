<? include(__DIR__.'/.begin.php') ?>
<?

use intec\core\base\Collection;

/**
 * @var Collection $data
 * @var array $languages
 * @var string $solution
 * @var CWizardBase $wizard
 * @var Closure($code, $type, $file, $fields = []) $import
 * @var CWizardStep $this
 */

$code = $solution.'_products_reviews_'.WIZARD_SITE_ID;
$type = 'reviews';
$iBlock = $import($code, $type, 'products.reviews');

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['PRODUCTS_REVIEWS_IBLOCK_TYPE'] = $type;
    $macros['PRODUCTS_REVIEWS_IBLOCK_ID'] = $iBlock['ID'];
    $macros['PRODUCTS_REVIEWS_IBLOCK_CODE'] = $iBlock['CODE'];
    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>