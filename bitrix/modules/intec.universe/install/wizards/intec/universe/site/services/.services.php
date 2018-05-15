<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arServices = array(
    'main' => array(
        'NAME' => Loc::getMessage('wizard.services.main'),
        'STAGES' => array(
            'files.php',
            'search.php',
            'menu.php',
            'url.php',
            'template.php',
            'theme.php'
        )
    ),
    'form' => array(
        'NAME' => Loc::getMessage('wizard.services.form'),
        'STAGES' => array(
            'call.php',
            'feedback.php',
            'product.php',
            'project.php',
            'question.php',
            'service.php',
            'vacancy.php'
        )
    ),
    'intec.startshop' => array(
        'NAME' => Loc::getMessage('wizard.services.sale'),
        'STAGES' => array(
            'shop.currencies.php',
            'shop.prices.php',
            'shop.orders.properties.php',
            'shop.orders.statuses.php',
            'shop.deliveries.php',
            'shop.payments.php',
            'form.call.php',
            'form.feedback.php',
            'form.product.php',
            'form.project.php',
            'form.question.php',
            'form.service.php',
            'form.vacancy.php'
        )
    ),
    'highloadblock' => array(
        'NAME' => Loc::getMessage('wizard.services.highloadblock'),
        'STAGES' => array()
    ),
    'iblock' => array(
        'NAME' => Loc::getMessage('wizard.services.iblock'),
        'STAGES' => array(
            'types.php',
            'import.articles.php',
            'import.banners.php',
            'import.banners.small.php',
            'import.banners.categories.php',
            'import.brands.php',
            'import.certificates.php',
            'import.contacts.php',
            'import.faq.php',
            'import.icons.php',
            'import.jobs.php',
            'import.news.php',
            'import.photo.php',
            'import.products.php',
            'import.products.reviews.php',
            'import.projects.php',
            'import.reviews.php',
            'import.services.php',
            'import.services.reviews.php',
            'import.shares.php',
            'import.shares.conditions.php',
            'import.shares.icons.php',
            'import.shares.teasers.php',
            'import.shares.text.php',
            'import.staffs.php',
            'import.video.php',
            'link.files.php',
            'link.template.php'
        )
    ),
    'sale' => array(
        'NAME' => Loc::getMessage('wizard.services.sale'),
        'STAGES' => array(
            'locations.php',
            'persons.php'
        )
    )
);
