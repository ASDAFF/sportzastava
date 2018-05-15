<?php
function AddFilterParamsSearch(&$arComponentParameters, $arCurrentValues, $name, $parent, $MULTIPLE = "Y")
{
    $arComponentParameters[$name] = array(
        "PARENT" => $parent,
        "NAME" => GetMessage("SEARCH_CP_WHERE_FILTER"),
        "TYPE" => "LIST",
        "MULTIPLE" => $MULTIPLE,
        "VALUES" => CSearchParameters::GetFilterDropDown(true),
        "DEFAULT" => "all",
        "REFRESH" => "Y",
    );

    if (!is_array($arCurrentValues[$name]) && strlen($arCurrentValues[$name]) > 0)
    {
        $arCurrentValues[$name] = array($arCurrentValues[$name]);
    }

    if (is_array($arCurrentValues[$name]))
    {
        foreach ($arCurrentValues[$name] as $strFILTER)
        {
            if ($strFILTER == "main")
            {
                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => $parent,
                    "NAME" => GetMessage("SEARCH_CP_URL"),
                    "TYPE" => "STRING",
                    "MULTIPLE" => $MULTIPLE,
                    "ADDITIONAL_VALUES" => "Y",
                    "DEFAULT" => "",
                );
            }
            elseif ($strFILTER == "forum")
            {
                $arrFILTER = array();
                if (CModule::IncludeModule("forum"))
                {
                    $arrFILTER["all"] = GetMessage("SEARCH_CP_ALL");
                    $rsForum = CForumNew::GetList();
                    while ($arForum = $rsForum->Fetch())
                        $arrFILTER[$arForum["ID"]] = $arForum["NAME"];
                }

                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => $parent,
                    "NAME" => GetMessage("SEARCH_CP_FORUM"),
                    "TYPE" => "LIST",
                    "MULTIPLE" => $MULTIPLE,
                    "VALUES" => $arrFILTER,
                    "ADDITIONAL_VALUES" => "N",
                    "DEFAULT" => "all",
                );
            }
            elseif (strpos($strFILTER, "iblock_") === 0)
            {
                $arrFILTER = array();
                if (CModule::IncludeModule("iblock"))
                {
                    $arrFILTER["all"] = GetMessage("SEARCH_CP_ALL");
                    $rsIBlock = CIBlock::GetList(array("SORT" => "ASC"), array("TYPE" => substr($strFILTER, 7)));
                    while ($arIBlock = $rsIBlock->Fetch())
                        $arrFILTER[$arIBlock["ID"]] = $arIBlock["NAME"];
                }

                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => $parent,
                    "NAME" => GetMessage("SEARCH_CP_IBLOCK_TYPE", array("#TYPE_ID#" => $strFILTER)),
                    "TYPE" => "LIST",
                    "MULTIPLE" => $MULTIPLE,
                    "VALUES" => $arrFILTER,
                    "ADDITIONAL_VALUES" => "N",
                    "DEFAULT" => "all",
                );
            }
            elseif ($strFILTER == "blog")
            {
                $arrFILTER = array();
                if (CModule::IncludeModule("blog"))
                {
                    $arrFILTER["all"] = GetMessage("SEARCH_CP_ALL");
                    $rsBlog = CBlog::GetList();
                    while ($arBlog = $rsBlog->Fetch())
                        $arrFILTER[$arBlog["ID"]] = $arBlog["NAME"];
                }

                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => $parent,
                    "NAME" => GetMessage("SEARCH_CP_BLOG"),
                    "TYPE" => "LIST",
                    "MULTIPLE" => $MULTIPLE,
                    "VALUES" => $arrFILTER,
                    "ADDITIONAL_VALUES" => "N",
                    "DEFAULT" => "all",
                );
            }
            elseif ($strFILTER == "socialnetwork")
            {
                $arrFILTER = array();
                if (CModule::IncludeModule("socialnetwork"))
                {
                    $arrFILTER["all"] = GetMessage("SEARCH_CP_ALL");
                    $rsGroup = CSocNetGroup::GetList(array("ID" => "DESC"), array(), false, false, array("ID", "NAME"));
                    while ($arGroup = $rsGroup->Fetch())
                        $arrFILTER[$arGroup["ID"]] = $arGroup["NAME"];
                }

                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => $parent,
                    "NAME" => GetMessage("SEARCH_CP_SOCIALNETWORK_GROUPS"),
                    "TYPE" => "LIST",
                    "MULTIPLE" => $MULTIPLE,
                    "VALUES" => $arrFILTER,
                    "ADDITIONAL_VALUES" => "N",
                    "DEFAULT" => "all",
                );
            }
            elseif ($strFILTER == "socialnetwork_user")
            {
                $arComponentParameters[$name."_".$strFILTER] = array(
                    "PARENT" => "DATA_SOURCE",
                    "NAME" => GetMessage("SEARCH_CP_SOCIALNETWORK_USER"),
                    "TYPE" => "STRING",
                    "DEFAULT" => "",
                );
            }
        }
    }
}
?>