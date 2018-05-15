<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if (!CModule::IncludeModule('intec.core'))
    return;

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;

$arAllMapOptions = ArrayHelper::merge($arResult['ALL_MAP_OPTIONS'], $arResult['ALL_MAP_CONTROLS']);
$arMapOptions = ArrayHelper::merge($arParams['OPTIONS'], $arParams['CONTROLS']);

$id = Type::toString($arParams['MAP_ID']);
$scale = Type::toFloat($arParams['INIT_MAP_SCALE']);
$latitude = Type::toFloat($arParams['INIT_MAP_LAT']);
$longitude = Type::toFloat($arParams['INIT_MAP_LON']);
$secure = Core::$app->request->getIsSecureConnection();

?>
<script>
    (function () {
        BX.ready(function () {
            var options;
            var map;

            if (!window.google && !window.google.maps)
                return;

            options = {
                zoom: <?= JavaScript::toObject($scale) ?>,
                center: new google.maps.LatLng(<?= JavaScript::toObject($latitude) ?>, <?= JavaScript::toObject($longitude) ?>),
                <?php foreach ($arAllMapOptions as $option => $method) {
                    if (ArrayHelper::isIn($option, $arMapOptions)) {
                        $rules = array(
                            '#true#' => 'true',
                            '#false#' => 'false'
                        );
                    } else {
                        $rules = array(
                            '#true#' => 'false',
                            '#false#' => 'true'
                        );
                    }

                    echo "\t\t\t\t".StringHelper::replace($method, $rules).",\r\n";
                } ?>
                mapTypeId: google.maps.MapTypeId.<?= $arParams['INIT_MAP_TYPE'] ?>
            };

            map = new window.google.maps.Map(BX('UniverseGoogleMap<?= $id ?>'), options);

            if (!window.maps)
                window.maps = {};

            window.maps[<?= JavaScript::toObject($id) ?>] = map;
        });
    })();
</script>
<div id="UniverseGoogleMap<?= $id ?>" class="google-map" style="
    height: 100%;
    width: 100%;
"><?= GetMessage('M_G_S_DEFAULT_LOADING');?></div>
