<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
    CModule::IncludeModule('iblock');
    foreach($arResult['SECTIONS'] as $key=>$arSection) {

        $picture = array();

        if (!empty($arSection['PICTURE'])) {
            if (is_array($arSection['PICTURE'])) {
                $dataPicture = $arSection['PICTURE']['ID'];
            } else $dataPicture = $arSection['PICTURE'];

            $picture = CFile::ResizeImageGet($dataPicture, array('width' => 300, 'height' => 300, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
            $strTitle = (!empty($arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_TITLE'])
                ? $arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_TITLE']
                : $arSection['NAME']
            );
            $strAlt = (!empty($arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_ALT'])
                ? $arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_ALT']
                : $arSection['NAME']
            );
        } elseif (!empty($arSection['DETAIL_PICTURE']))  {
            if (is_array($arSection['DETAIL_PICTURE'])) {
                $dataPicture = $arSection['DETAIL_PICTURE']['ID'];
            } else $dataPicture = $arSection['DETAIL_PICTURE'];

            $picture = CFile::ResizeImageGet($dataPicture, array('width' => 300, 'height' => 300, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
            $strTitle = (!empty($arSection['IPROPERTY_VALUES']['SECTION_DETAIL_PICTURE_FILE_TITLE'])
                ? $arSection['IPROPERTY_VALUES']['SECTION_DETAIL_PICTURE_FILE_TITLE']
                : $arSection['NAME']
            );
            $strAlt = (!empty($arSection['IPROPERTY_VALUES']['SECTION_DETAIL_PICTURE_FILE_ALT'])
                ? $arSection['IPROPERTY_VALUES']['SECTION_DETAIL_PICTURE_FILE_ALT']
                : $arSection['NAME']
            );
        } else {
            $picture['src'] = SITE_TEMPLATE_PATH.'/images/noimg/no-img.png';
            $strTitle = $arSection['NAME'];
            $strAlt = $arSection['NAME'];
        }

        $picture['imgTitle'] = $strTitle;
        $picture['imgAlt'] = $strAlt;

        $arResult['SECTIONS'][$key]['PICTURE'] = $picture;

        if ($arResult['SECTIONS_COUNT'] > 0 && $arParams['USE_SUBSECTIONS'] == 'Y') {
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

    }
