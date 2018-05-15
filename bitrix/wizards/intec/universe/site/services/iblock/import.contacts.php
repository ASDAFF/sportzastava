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

$code = $solution.'_contacts_'.WIZARD_SITE_ID;
$type = 'content';
$iBlock = $import($code, $type, 'contacts');

if (!empty($iBlock)) {
    $macros = $data->get('macros');
    $macros['CONTACTS_IBLOCK_TYPE'] = $type;
    $macros['CONTACTS_IBLOCK_ID'] = $iBlock['ID'];
    $macros['CONTACTS_IBLOCK_CODE'] = $iBlock['CODE'];
    $macros['CONTACTS_CONTACT_ID'] = null;

    $item = CIBlockElement::GetList(['SORT' => 'ASC'], [
        'IBLOCK_ID' => $iBlock['ID'],
        'ACTIVE' => 'Y'
    ])->Fetch();

    if (!empty($item))
        $macros['CONTACTS_CONTACT_ID'] = $item['ID'];

    $data->set('macros', $macros);
}

?>
<? include(__DIR__.'/.end.php') ?>