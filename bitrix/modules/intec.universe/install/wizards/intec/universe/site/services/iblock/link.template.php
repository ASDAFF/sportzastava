<? include('.begin.php') ?>
<?

use intec\core\base\Collection;
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
 * @var Closure($code, $type, $file, $fields = []) $import
 * @var CWizardStep $this
 */

$templateId = WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID;
$macros = $data->get('macros');
$build = null;

if (!Constructor::isLite()) {
    /** @var Build $build */
    $build = Build::find()->where([
        'code' => $templateId
    ])->one();
}

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

if (!empty($build)) {
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

        if ($component->code == 'intec.universe:widget') {
            if ($component->template == 'slider.complex' || $component->template == 'slider')
                if (empty($properties['SLIDER_CB_PROPERTY_ELEMENTS']))
                    $properties['SLIDER_CB_PROPERTY_ELEMENTS'] = $macros['BANNERS_SMALL_BANNERS_IDS'];

            if ($component->template == 'categories')
                if (empty($properties['ID_CATEGORIES']))
                    $properties['ID_CATEGORIES'] = $macros['PRODUCTS_CATEGORIES_IDS'];
        }

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

?>
<? include('.end.php') ?>