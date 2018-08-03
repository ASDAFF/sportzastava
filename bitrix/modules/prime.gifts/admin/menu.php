<?
IncludeModuleLangFile(__FILE__);
$module_id = "prime.gifts";

if(CModule::IncludeModuleEx($module_id) == 3)
	return false;

{
	$aMenu = array(
		"parent_menu" => "global_menu_marketing",
		"sort" => 100,
		"url" => "prime_gifts_list.php?lang=".LANGUAGE_ID,
		"more_url"=> array("prime_gifts_edit.php?lang=".LANGUAGE_ID),
		"text" => GetMessage("PRIME_GIFTS_MAIN"),
		"title" => GetMessage("PRIME_GIFTS_MAIN"),
		"icon" => "prime_sticker_gifts_icon",
		"page_icon" => "prime_sticker_gifts_icon",
		"module_id" => $module_id,
		"items_id" => "menu_prime",
		"items" => array(),
	);


	return $aMenu;
}
return false;
?>
