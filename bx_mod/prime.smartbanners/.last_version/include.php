<?php

global $DBType;
$module_id = 'prime.smartbanners';
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	$module_id,
	array(
		"Nb_class"=> "classes/Nb_class.php",
		)
	);

?>