<?php

//Удаление keywords и description
AddEventHandler("main", "OnEndBufferContent", "deleteMetaTags");
function deleteMetaTags(&$content)
{
    $content = preg_replace(array('/<meta(.*?)keywords(.*?)>/','/<meta(.*?)description(.*?)>/'),"",$content);
}


function getCityForIp($ip = false){
    $xml = new CDataXML();
    if(!$ip)
    $ip = $_SERVER['REMOTE_ADDR'];
    var_dump($ip);
    $result = file_get_contents('http://ipgeobase.ru:7020/geo?ip='.$ip);
    $xml->LoadString(iconv("Windows-1251", "UTF-8", $result));
    if ($node = $xml->SelectNodes('/ip-answer/ip/city')) {
        return $node->textContent();
    }
}