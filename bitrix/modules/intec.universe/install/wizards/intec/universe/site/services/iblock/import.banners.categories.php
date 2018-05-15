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

$code = $solution.'_banners_categories_'.WIZARD_SITE_ID;
$type = 'content';
$iBlock = $import($code, $type, 'banners.categories');

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['BANNERS_CATEGORIES_IBLOCK_TYPE'] = $type;
    $macros['BANNERS_CATEGORIES_IBLOCK_ID'] = $iBlock['ID'];
    $macros['BANNERS_CATEGORIES_IBLOCK_CODE'] = $iBlock['CODE'];
    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>