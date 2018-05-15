<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Loader;
use intec\constructor\Module as Constructor;
use intec\constructor\models\Build;

/**
 * @global $APPLICATION
 */

$APPLICATION->SetTitle("#SITE_NAME#");?>
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
