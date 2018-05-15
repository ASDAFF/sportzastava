<? include(__DIR__.'/../.begin.php') ?>
<?

use Bitrix\Main\Localization\Loc;

use intec\Core;
use intec\core\base\Collection;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Html;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\Module as Constructor;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\template\Component;
use intec\constructor\models\build\template\Widget;

/**
 * @var Collection $data
 * @var CWizardBase $wizard
 * @var CWizardStep $this
 */

Loc::loadMessages(__FILE__);

$templateId = WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID;
$templateDataPath = null;
$templateData = null;

$pathFrom = '';
$pathTo = '';

$pathFrom .= Core::getAlias('@root');
$pathFrom .= WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH.'/site');
$pathFrom .= '/'.WIZARD_TEMPLATE_ID;

$pathTo .= Core::getAlias('@root');
$pathTo .= BX_PERSONAL_ROOT.'/templates/'.$templateId;

$pathFrom = FileHelper::normalizePath($pathFrom, '/');
$pathTo = FileHelper::normalizePath($pathTo, '/');

$macros = [
    'SITE_DIR_MACROS' => WIZARD_SITE_DIR,
    'SITE_NAME' => Html::encode($wizard->GetVar("siteName")),
    'SITE_PHONE' => Html::encode($wizard->GetVar("sitePhone")),
    'SITE_MAIL' => Html::encode($wizard->GetVar("siteMail")),
    'SITE_ADDRESS' => Html::encode($wizard->GetVar("siteAddress"))
];

if (FileHelper::isDirectory($pathFrom)) {
    $templateDataPath = FileHelper::getEntryDirectory($pathFrom).'/'.WIZARD_TEMPLATE_ID.'.json';
    $templateDataPath = FileHelper::normalizePath($templateDataPath, '/');
    $templateData = FileHelper::getFileData($templateDataPath);

    CopyDirFiles($pathFrom, $pathTo, $rewrite = true, $recursive = true, $remove = false);

    $template = CSiteTemplate::GetList([], [
        'ID' => $templateId
    ]);
    $template = $template->Fetch();

    if (empty($template))
        die(Loc::getMessage('wizard.services.main.template.errors.template'));

    if (!Constructor::isLite()) {
        $build = new Build();
        $build->code = WIZARD_TEMPLATE_ID . '_' . WIZARD_SITE_ID;

        if ($wizard->GetVar('systemReplaceTemplate') == 'Y') {
            $buildExists = Build::find()->where([
                'code' => $build->code
            ])->one();

            if (!empty($buildExists))
                $buildExists->delete();
        }

        if ($build->importFromJson($templateData)) {
            $build->name = $template['NAME'] . ' (' . WIZARD_SITE_ID . ')';
            $build->save();

            $replace = function ($properties) use (&$replace, &$macros) {
                $result = [];

                foreach ($properties as $key => $value) {
                    if (Type::isArray($value)) {
                        $result[$key] = $replace($value);
                    } else {
                        $result[$key] = StringHelper::replaceMacros($value, $macros);
                    }
                }

                return $result;
            };

            /** @var Template[] $templates */
            $templates = $build->getTemplates(true);
            $templatesId = [];

            foreach ($templates as $template)
                $templatesId[] = $template->id;

            /** @var Component[] $components */
            $components = Component::find()->where([
                'templateId' => $templatesId
            ])->all();

            /** @var Widget[] $widgets */
            $widgets = Widget::find()->where([
                'templateId' => $templatesId
            ])->all();

            foreach ($components as $component) {
                $properties = $component->properties;
                $properties = $replace($properties);
                $component->properties = $properties;
                $component->save();
            }

            foreach ($widgets as $widget) {
                $properties = $widget->properties;
                $properties = $replace($properties);
                $widget->properties = $properties;
                $widget->save();
            }
        }
    }

    $site = CSite::GetList($by = 'def', $order = 'desc', ['LID' => WIZARD_SITE_ID]);
    $site = $site->Fetch();

    if (!empty($site)) {
        (new CSite())->Update($site['ID'], [
            'NAME' => $wizard->GetVar('siteName'),
            'TEMPLATE' => [[
                'CONDITION' => '',
                'SORT' => 150,
                'TEMPLATE' => $templateId
            ]]
        ]);
    }
} else {
    die(Loc::getMessage('wizard.services.main.template.errors.template'));
}

?>
<? include(__DIR__.'/../.end.php') ?>