<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
session_start();
$_SESSION['PRIME_GIFTS_CHANGE'][$_REQUEST['site']][$_REQUEST['user']] = $_REQUEST['name'];
