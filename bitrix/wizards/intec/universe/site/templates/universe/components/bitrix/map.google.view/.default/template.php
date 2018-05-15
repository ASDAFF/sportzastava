<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$this->setFrameMode(true);

use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

$arTransParams = array(
	'INIT_MAP_TYPE' => $arParams['INIT_MAP_TYPE'],
	'INIT_MAP_LON' => $arResult['POSITION']['google_lon'],
	'INIT_MAP_LAT' => $arResult['POSITION']['google_lat'],
	'INIT_MAP_SCALE' => $arResult['POSITION']['google_scale'],
	'MAP_WIDTH' => $arParams['MAP_WIDTH'],
	'MAP_HEIGHT' => $arParams['MAP_HEIGHT'],
	'CONTROLS' => $arParams['CONTROLS'],
	'OPTIONS' => $arParams['OPTIONS'],
	'MAP_ID' => $arParams['MAP_ID'],
	'API_KEY' => $arParams['API_KEY'],
);

$sId = Type::toString($arParams['MAP_ID']);

?>
<div class="google-map-layout">
    <div class="google-map-view">
        <?php $APPLICATION->IncludeComponent('bitrix:map.google.system', '.default', $arTransParams, false, array('HIDE_ICONS' => 'Y')) ?>
    </div>
</div>
<script>
    (function () {
        BX.ready(function () {
            if (!window.maps) return;
            var map = window.maps[<?= JavaScript::toObject($sId) ?>];
            if (!map) return;

            <?php if (Type::isArray($arResult['POSITION']['PLACEMARKS'])) { ?>
                <?php foreach ($arResult['POSITION']['PLACEMARKS'] as $placemark) { ?>
                <?php
                    $latitude = Type::toFloat($placemark['LAT']);
                    $longitude = Type::toFloat($placemark['LON']);
                    $title = Type::toString($placemark['TEXT']);
                ?>
                    new google.maps.Marker({
                        position: new google.maps.LatLng(
                            <?= JavaScript::toObject($latitude)?>,
                            <?= JavaScript::toObject($longitude)?>
                        ),
                        map: map,
                        title: <?= JavaScript::toObject($title) ?>
                    });
                <?php } ?>
            <?php } ?>
        });
    })();
</script>
