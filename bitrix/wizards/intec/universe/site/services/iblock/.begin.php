<? include(__DIR__.'/../.begin.php') ?>
<?

use Bitrix\Main\Loader;
use intec\core\base\Collection;
use intec\core\helpers\ArrayHelper;

/**
 * @var Collection $data
 * @var CWizardBase $wizard
 * @var CWizardStep $this
 */

if (!Loader::includeModule('iblock'))
    return;

$import = function ($code, $type, $file, $fields = []) use ($wizard) {
    $import = $wizard->GetVar('systemImportIBlocks') === 'Y';

    $path = WIZARD_SERVICE_RELATIVE_PATH.'/data/'.LANGUAGE_ID.'/'.$file.'.xml';
    $site = WIZARD_SITE_ID;
    $permissions = [
        1 => 'X',
        2 => 'R'
    ];

    $iBlock = CIBlock::GetList(array(), array(
        'XML_ID' => $code,
        'TYPE' => $type
    ))->GetNext();

    if ($import && empty($iBlock)) {
        $iBlockId = WizardServices::ImportIBlockFromXML(
            $path,
            $code,
            $type,
            $site,
            $permissions
        );

        if (empty($iBlockId))
            return null;

        $fields = ArrayHelper::merge([
            'IBLOCK_SECTION' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'ACTIVE' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'Y'
            ],
            'ACTIVE_FROM' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '=today'
            ],
            'ACTIVE_TO' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'SORT' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'NAME' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => ''
            ],
            'PREVIEW_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'FROM_DETAIL' => 'N',
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'DELETE_WITH_DETAIL' => 'N',
                    'UPDATE_WITH_DETAIL' => 'N'
                ]
            ],
            'PREVIEW_TEXT_TYPE' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text'
            ],
            'PREVIEW_TEXT' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'DETAIL_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95
                ]
            ],
            'DETAIL_TEXT_TYPE' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text'
            ],
            'DETAIL_TEXT' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'XML_ID' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'CODE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'UNIQUE' => 'Y',
                    'TRANSLITERATION' => 'Y',
                    'TRANS_LEN' => 100,
                    'TRANS_CASE' => 'L',
                    'TRANS_SPACE' => '_',
                    'TRANS_OTHER' => '_',
                    'TRANS_EAT' => 'Y',
                    'USE_GOOGLE' => 'Y'
                ]
            ],
            'TAGS' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'SECTION_NAME' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => ''
            ],
            'SECTION_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'FROM_DETAIL' => 'N',
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'DELETE_WITH_DETAIL' => 'N',
                    'UPDATE_WITH_DETAIL' => 'N'
                ]
            ],
            'SECTION_DESCRIPTION_TYPE' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text'
            ],
            'SECTION_DESCRIPTION' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'SECTION_DETAIL_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95
                ]
            ],
            'SECTION_XML_ID' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ''
            ],
            'SECTION_CODE' => [
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => [
                    'UNIQUE' => 'Y',
                    'TRANSLITERATION' => 'Y',
                    'TRANS_LEN' => 100,
                    'TRANS_CASE' => 'L',
                    'TRANS_SPACE' => '_',
                    'TRANS_OTHER' => '_',
                    'TRANS_EAT' => 'Y',
                    'USE_GOOGLE' => 'N'
                ]
            ]
        ], $fields);

        (new CIBlock())->Update($iBlockId, [
            'ACTIVE' => 'Y',
            'CODE' => $code,
            'XML_ID' => $code,
            'FIELDS' => $fields
        ]);

        $iBlock = CIBlock::GetByID($iBlockId)->GetNext();
    }

    if (!empty($iBlock))
        return $iBlock;

    return null;
};