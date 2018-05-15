<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $APPLICATION;

if (!CModule::IncludeModule('intec.constructor'))
    return;

IncludeModuleLangFile(__FILE__);

if (!array_key_exists("code", $_REQUEST) && !array_key_exists("constructor_component", $_REQUEST["parameters"]))
{
    die();
}

use intec\Core;
use intec\core\base\InvalidParamException;
use intec\core\db\ActiveRecords;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\FileHelper;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Json;
use intec\core\net\Url;
use intec\core\web\UploadedFile;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\template\Container;
use intec\constructor\models\build\template\Containers;
use intec\constructor\models\build\Property;
use intec\constructor\models\build\Theme;
use intec\constructor\models\build\theme\Value;
use intec\constructor\models\build\template\Component;

$componentName = empty($_REQUEST["code"])?$_REQUEST["parameters"]['constructor_component']:$_REQUEST["code"];
$componentTemplate = $_REQUEST["parameters"]['template'];
$templateId = empty($_REQUEST["templateId"])?$_REQUEST["parameters"]['constructor_templateID']:$_REQUEST["templateId"];

$curParams = $_REQUEST["parameters"];

CModule::IncludeModule("fileman");

$data = CComponentParamsManager::GetComponentProperties(
    $componentName,
    $componentTemplate,
    $templateId,
    $curParams
);

$data['templates'] = CComponentUtil::GetTemplatesList($componentName, $templateId);

$arSiteTemplatesDesc = array();
$dbst = CSiteTemplate::GetList(array(), array(), array('NAME', 'ID'));
while($siteTempl = $dbst->Fetch())
    $arSiteTemplatesDesc[$siteTempl['ID']] = $siteTempl['NAME'];

foreach ($data['templates'] as $skey => $sTemplate) {
    if ($sTemplate['TEMPLATE'] == '.default') {
        $data['templates'][$skey]['DISPLAY_NAME'] = $sTemplate['NAME'].' ('.GetMessage('component.properties.site.template.default.default').')';
    } else if (!empty($sTemplate['TEMPLATE'])) {
        $data['templates'][$skey]['DISPLAY_NAME'] = $sTemplate['NAME'].' ('.$arSiteTemplatesDesc[$sTemplate['TEMPLATE']].')';
    } else {
        $data['templates'][$skey]['DISPLAY_NAME'] = $sTemplate['NAME'].' ('.GetMessage('component.properties.site.template.default').')';
    }
}

$data['templateID'] = $templateId;
$data['template_active'] = $componentTemplate;

$componentDescription = CComponentUtil::GetComponentDescr($componentName);

$arSiteID = array();
$rsSites = CSite::GetList($by="sort", $order="desc", array());
while ($arSite = $rsSites->Fetch())
{
    $arSiteID[$arSite['LID']] = '('.$arSite['LID'].') '.$arSite['NAME'];
}

$data['SITE_ID'] = $arSiteID;
if (!empty($curParams)) {
    foreach ($data['parameters'] as $key=>$value) {
        if (!empty($curParams[$value['ID']])) {
            if ($value['TYPE'] == 'LIST') {
                if ($data['parameters'][$key]['MULTIPLE']=='Y' && is_array($curParams[$value['ID']])) {
                    foreach ($curParams[$value['ID']] as $multiVal) {
                        if (array_key_exists($multiVal, $value['VALUES'])) {
                            $data['parameters'][$key]['ACTIVE_VALUE'][] = $multiVal;
                        } else if ($value['ADDITIONAL_VALUES'] == 'Y') {
                            $data['parameters'][$key]['ADD_ACTIVE_VALUE'][] = $multiVal;
                        }
                    }
                }else if (array_key_exists($curParams[$value['ID']], $value['VALUES'])) {
                    $data['parameters'][$key]['ACTIVE_VALUE'] = $curParams[$value['ID']];
                } else if ($value['ADDITIONAL_VALUES'] == 'Y' && $value['MULTIPLE'] != 'Y') {
                    $data['parameters'][$key]['ADD_ACTIVE_VALUE'] = $curParams[$value['ID']];
                }
            } else if ($value['TYPE'] == 'STRING') {
                if (!is_array($curParams[$value['ID']])) {
                    $data['parameters'][$key]['ACTIVE_VALUE'] = $curParams[$value['ID']];
                }
            } else if ($value['TYPE'] == 'CHECKBOX') {
                if ($curParams[$value['ID']] == 'Y') {
                    $data['parameters'][$key]['ACTIVE_VALUE'] = 'Y';
                } else $data['parameters'][$key]['ACTIVE_VALUE'] = false;
            }
        }
    }
}

if(!CComponentEngine::CheckComponentName($componentName))
    $strWarning .= GetMessage("comp_prop_error_name")."<br>";

$arGroupTemp = array();

foreach ($data['groups'] as $key=>$group) {
    $data['groups'][$key]['PARAMETERS'] = array();
    $arGroupTemp[$group['ID']] = $key;
}

if (!array_key_exists('ADDITIONAL_SETTINGS', $arGroupTemp)) {
    $data['groups']['ADDITIONAL_SETTINGS'] = array(
        'NAME'=> GetMessage('component.properties.additional_settings'),
        'ID' => 'ADDITIONAL_SETTINGS',
        'PARAMETERS' => array()
    );
}

foreach ($data['parameters'] as $parameter) {
    if (array_key_exists($parameter['PARENT'], $arGroupTemp)) {
        $data['groups'][$arGroupTemp[$parameter['PARENT']]]['PARAMETERS'][] = $parameter;
    } else {
        if (array_key_exists('ADDITIONAL_SETTINGS', $arGroupTemp)) {
            $data['groups'][$arGroupTemp['ADDITIONAL_SETTINGS']]['PARAMETERS'][] = $parameter;
        } else {
            $data['groups']['ADDITIONAL_SETTINGS']['PARAMETERS'][] = $parameter;
        }
    }
}

$data['COMPONENT_DESCRIPTION'] = $componentDescription;
$data['COMPONENT_DESCRIPTION']['CODE'] = $componentName;
?>

<?function drawFormComponentProp($arrayParam) {?>
    <form name="component-properties">
        <input type="hidden" name="constructor_templateID" value="<?=$arrayParam['templateID']?>">
        <input type="hidden" name="constructor_component" value="<?=$arrayParam['COMPONENT_DESCRIPTION']['CODE']?>">
        <div class="component-properties-left">
            <div class="component-properties-search">
                <div class="component-properties-search-wrap">
                    <input id="input-properties-search" type="text" placeholder="<?=GetMessage('component.properties.search');?>" />
                    <div class="component-properties-search-icon"></div>
                </div>
            </div>
            <div class="component-properties-groups-wrap">
                <div class="component-properties-groups">
                    <div class="component-properties-group component-properties-group-active" data-comp-group-id="COMPONENT_TEMPLATE">
                        <?=GetMessage('component.properties.param_template_title')?>
                    </div>
                    <?foreach ($arrayParam['groups'] as $paramGroup) {?>
                        <?if (!empty($paramGroup['PARAMETERS'])) {?>
                            <div class="component-properties-group" data-comp-group-id="<?=$paramGroup['ID']?>">
                                <?=$paramGroup['NAME']?>
                            </div>
                        <?}?>
                    <?}?>
                </div>
            </div>
        </div>
        <div class="component-properties-right">
            <?if (!empty($arrayParam['SITE_ID'])) {?>
                <div class="component-properties-param constructor-component-properties-sid">
                    <div class="component-properties-param-label">
                        <label for="param_templates">
                            <?=GetMessage('component.properties.site_id');?>
                        </label>
                    </div>
                    <div class="component-properties-param-value">
                        <select name="constructor_site_id" class="constructor-component-properties-sid">
                            <?foreach ($arrayParam['SITE_ID'] as $siteID=>$siteName) {?>
                                <option value="<?=$siteID?>"><?=$siteName?></option>
                            <?}?>
                        </select>
                    </div>
                </div>
            <?}?>
            <div class="component-component-desc">
                <div class="component-component-name">
                    <div class="component-component-name-value">
                        <?=$arrayParam['COMPONENT_DESCRIPTION']['NAME']?>
                    </div>
                    <div class="component-component-desc-value" title="<?=$arrayParam['COMPONENT_DESCRIPTION']['DESCRIPTION']?>">
                        i
                    </div>
                </div>
                <div class="component-component-code">
                    <?=$arrayParam['COMPONENT_DESCRIPTION']['CODE']?>
                </div>
            </div>
            <div class="component-properties-params-wrap">
                <div class="component-properties-params">
                    <div class="component-properties-search-empty">
                        <?=GetMessage('component.properties.search_empty')?>
                    </div>
                    <div class="component-properties-parent" id="COMPONENT_TEMPLATE">
                        <div class="component-properties-parent-title">
                            <?=GetMessage('component.properties.param_template_title');?>
                        </div>
                        <div class="component-properties-param" data-comp-prop="TEMPLATE">
                            <div class="component-properties-param-label">
                                <label for="param_templates" data-comp-prop-lable="true">
                                    <?=GetMessage('component.properties.param_template_title');?>:
                                </label>
                            </div>
                            <div class="component-properties-param-value">
                                <select id="param_templates" class="component-properties-refresh" name="template">
                                    <?foreach ($arrayParam['templates'] as $arTemplate) {?>
                                        <option value="<?=$arTemplate['NAME']?>"
                                                <?=($arTemplate['NAME'] == $arrayParam['template_active'])?'selected':''?>>
                                                        <?=$arTemplate['DISPLAY_NAME']?>
                                        </option>
                                    <?}?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?if (!empty($arrayParam['groups'])){
                        foreach ($arrayParam['groups'] as $propGroup) {?>
                            <?if (!empty($propGroup['PARAMETERS'])) {?>
                                <div class="component-properties-parent" id="<?=$propGroup['ID']?>">
                                    <div class="component-properties-parent-title">
                                        <?=$propGroup['NAME']?>
                                    </div>
                                    <?foreach ($propGroup['PARAMETERS'] as $dataParam) { ?>
                                        <div class="component-properties-param" data-comp-prop="<?= $dataParam['ID'] ?>">
                                            <?if ($dataParam['TYPE'] != 'CHECKBOX') {?>
                                                <div class="component-properties-param-label">
                                                    <label for="<?= $dataParam['ID'] ?>" data-comp-prop-lable="true">
                                                        <?= $dataParam['NAME'] ?>:
                                                    </label>
                                                    <?if (!empty($arrayParam['tooltips'][$dataParam['ID'].'_TIP'])) {?>
                                                        <div class="component-component-param-desc" title="<?=$arrayParam['tooltips'][$dataParam['ID'].'_TIP']?>">
                                                            i
                                                        </div>
                                                    <?}?>
                                                </div>
                                            <?}?>
                                            <div class="component-properties-param-value">
                                                <? if ($dataParam['TYPE'] == 'LIST') { ?>
                                                    <select <?= ($dataParam['REFRESH'] == 'Y') ? 'class="component-properties-refresh"' : '' ?> <?= ($dataParam['MULTIPLE'] == 'Y') ? 'multiple' : '' ?>
                                                            data-bind="bind: $root.styler"
                                                            id="param_templates" name="<?= $dataParam['ID'] ?>">
                                                        <?if ($dataParam['ADDITIONAL_VALUES'] == 'Y' && $dataParam['MULTIPLE'] != 'Y'){?>
                                                            <option value=""><?=GetMessage('component.properties.other')?></option>
                                                        <?}?>
                                                        <? foreach ($dataParam['VALUES'] as $codeParam => $valueParam) {
                                                            if ($dataParam['MULTIPLE'] == 'Y' && $dataParam['ACTIVE_VALUE']) {?>
                                                                <option <?=(in_array($codeParam, $dataParam['ACTIVE_VALUE']))?'selected':''?> value="<?= $codeParam ?>"><?= $valueParam ?></option>
                                                            <?}else {?>
                                                                <option <?=($codeParam == $dataParam['ACTIVE_VALUE'])?'selected':''?> value="<?= $codeParam ?>"><?= $valueParam ?></option>
                                                            <?}?>
                                                        <?}?>
                                                    </select>
                                                    <?if ($dataParam['ADDITIONAL_VALUES'] == 'Y' && $dataParam['MULTIPLE'] != 'Y') {?>
                                                        <input class="component-prop-input-ok" type="text" name="<?= $dataParam['ID'] ?>_alt"
                                                               value="<?=(empty($dataParam['ACTIVE_VALUE']) && !empty($dataParam['ADD_ACTIVE_VALUE'])) ? $dataParam['ADD_ACTIVE_VALUE'] : '' ?>"
                                                               <?=(!empty($dataParam['ACTIVE_VALUE']))?'disabled="disabled"':''?>
                                                        />
                                                        <?if ($dataParam['REFRESH'] == 'Y') {?>
                                                            <input class="component-prop-button-ok" value="OK" type="button">
                                                        <?}?>
                                                    <?} else if ($dataParam['ADDITIONAL_VALUES'] == 'Y' && $dataParam['MULTIPLE'] == 'Y'){?>
                                                        <input class="component-prop-add-input"
                                                               type="text" name="<?= $dataParam['ID'] ?>"
                                                        />
                                                        <input class="component-prop-button-add-input" value="+" type="button">
                                                    <?}?>

                                                <?} else if ($dataParam['TYPE'] == 'STRING') { ?>
                                                    <input type="text" id="<?= $dataParam['ID'] ?>" name="<?= $dataParam['ID'] ?>"
                                                           value="<?= (!empty($dataParam['ACTIVE_VALUE'])) ? $dataParam['ACTIVE_VALUE'] : '' ?>"/>
                                                    <?
                                                } else if ($dataParam['TYPE'] == 'CHECKBOX') { ?>
                                                    <input class="component-properties-param-checkbox <?= ($dataParam['REFRESH'] == 'Y') ? 'component-properties-refresh' : '' ?>"
                                                           id="<?= $dataParam['ID'] ?>"
                                                           data-ui-switch="{}"
                                                           type="checkbox"
                                                           name="<?= $dataParam['ID'] ?>"
                                                           value="Y"
                                                           <?=($dataParam['ACTIVE_VALUE'] == 'Y')? 'checked':''?>
                                                    >
                                                    <div class="component-properties-param-label component-properties-param-label-checkbox">
                                                        <label for="<?= $dataParam['ID'] ?>" data-comp-prop-lable="true">
                                                            <?= $dataParam['NAME'] ?>
                                                        </label>
                                                        <?if (!empty($arrayParam['tooltips'][$dataParam['ID'].'_TIP'])) {?>
                                                            <div class="component-component-param-desc" title="<?=$arrayParam['tooltips'][$dataParam['ID'].'_TIP']?>">
                                                                i
                                                            </div>
                                                        <?}?>
                                                    </div>
                                                    <?
                                                } else if ($dataParam['TYPE'] == 'FILE') { ?>
                                                    <input type="file" id="<?= $dataParam['ID'] ?>" name="<?= $dataParam['ID'] ?>"/>
                                                <? } else { ?>
                                                    <input type="text" id="<?= $dataParam['ID'] ?>" name="<?= $dataParam['ID'] ?>" value/>
                                                    <?
                                                } ?>
                                            </div>
                                        </div>
                                    <?}?>
                                </div>
                            <?}?>
                        <?}
                    }?>
                </div>
            </div>
        </div>
    </form>
<?}?>

<?
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'refresh') {
    drawFormComponentProp($data);
    die();
}?>

<div class="component-properties">
    <div class="component-properties-content" id="constructor-component-properties">
        <?drawFormComponentProp($data);?>
    </div>
</div>
