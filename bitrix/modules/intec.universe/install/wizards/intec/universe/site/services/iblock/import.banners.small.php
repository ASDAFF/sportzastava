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

$code = $solution.'_banners_small_'.WIZARD_SITE_ID;
$type = 'content';
$iBlock = $import($code, $type, 'banners.small');

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['BANNERS_SMALL_IBLOCK_TYPE'] = $type;
    $macros['BANNERS_SMALL_IBLOCK_ID'] = $iBlock['ID'];
    $macros['BANNERS_SMALL_IBLOCK_CODE'] = $iBlock['CODE'];
    $macros['BANNERS_SMALL_BANNES_IDS'] = [];

    $result = CIBlockElement::GetList(['SORT' => 'ASC'], [
        'IBLOCK_ID' => $iBlock['ID'],
        'ACTIVE' => 'Y'
    ]);

    $number = 0;

    while ($banner = $result->GetNext()) {
        $number++;

        if ($number > 4)
            break;
        $macros['BANNERS_SMALL_BANNERS_IDS_'.$number] = $banner['ID'];
        $macros['BANNERS_SMALL_BANNERS_IDS'][] = $banner['ID'];
    }

    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>