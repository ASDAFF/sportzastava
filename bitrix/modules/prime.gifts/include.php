<?php

global $DBType;
$module_id = 'prime.gifts';
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
    $module_id,
    array(
        "Gifts"=> "classes/Gifts.php",
    )
);

?>