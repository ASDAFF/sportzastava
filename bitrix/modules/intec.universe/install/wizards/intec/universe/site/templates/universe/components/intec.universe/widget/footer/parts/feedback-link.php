<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $sTemplateId
 */

?>
<?php if ($arParams['FOOTER_SHOW_FEEDBACK'] === 'Y') { ?>
    <a class="intec-cl-text link-button intec-cl-border" onclick="universe.forms.show(<?= JavaScript::toObject([
        'id' => $arParams['FOOTER_FORM_ID'],
        'template' => '.default',
        'parameters' => [
            'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FORM',
            'CONSENT_URL' => $arResult['CONSENT_URL']
        ],
        'settings' => [
            'title' => $arParams["FOOTER_SHOW_TEXT_BUTTON"]
        ]
    ]) ?>)">
        <?= $arParams["FOOTER_SHOW_TEXT_BUTTON"] ?>
    </a>
<?php } ?>