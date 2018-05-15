<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule('iblock');
foreach($arResult['SECTIONS'] as $key=>$arSection) {


        if ($arSection['DEPTH_LEVEL'] != 1) {
            continue;
        }
        $blncCnt = false;
        if ($arParams['COUNT_ELEMENTS'] == 'Y')
            $blncCnt = true;

        $arNavStartParams = array();
        if ((int)$arParams['COUNT_SUBSECTIONS'] > 0) {
            $arNavStartParams['nTopCount'] = (int)$arParams['COUNT_SUBSECTIONS'];
        }

        $arFilter = array(
            'SECTION_ID' => $arSection['ID'],
            'DEPTH_LEVEL' => ($arSection['DEPTH_LEVEL'] + 1),
            'ELEMENT_SUBSECTIONS' => 'Y',
            'ACTIVE' => 'Y'
        );

        $arSelect = array('NAME', 'SECTION_PAGE_URL', 'ELEMENT_CNT');

        $arSubSections = array();
        $rsSubSections = CIBlockSection::GetList(
            array(),
            $arFilter,
            $blncCnt,
            $arSelect,
            $arNavStartParams
        );

        while ($arSubSection = $rsSubSections->GetNext()) {
            $arResult['SECTIONS'][$key]['SUBSECTIONS'][] = $arSubSection;
        }

}
