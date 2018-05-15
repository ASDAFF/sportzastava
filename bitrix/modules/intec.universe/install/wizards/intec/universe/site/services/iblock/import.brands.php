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

$code = $solution.'_brands_'.WIZARD_SITE_ID;
$type = 'content';
$iBlock = $import($code, $type, 'brands');

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['BRANDS_IBLOCK_TYPE'] = $type;
    $macros['BRANDS_IBLOCK_ID'] = $iBlock['ID'];
    $macros['BRANDS_IBLOCK_CODE'] = $iBlock['CODE'];
    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>