<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Покупай качественное  спортивное оборудование в Спорт Заставе с доставкой по всей России. Официальный дилер!");
$APPLICATION->SetPageProperty("keywords", "Спортивное оборудование, интернет магазин");
$APPLICATION->SetPageProperty("title", "Спорт Застава интернет-магазин спортивного оборудования с доставкой по всей РФ");

use Bitrix\Main\Loader;
use intec\constructor\Module as Constructor;
use intec\constructor\models\Build;

/**
 * @global $APPLICATION
 */

$APPLICATION->SetTitle("Спорт Застава");?>
<? if (Loader::includeModule('intec.constructor') || Loader::includeModule('intec.constructorlite')) {
    if (Constructor::isLite()) {
        $build = Build::getCurrent();
        $page = $build->getPage();
        $template = $page->getProperties()->get('template_main_page');

        if ($template === 'wide') {
            require_once(__DIR__.'/include/index/wide.php');
        } else {
            require_once(__DIR__.'/include/index/narrow.php');
        }
    }
} ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
