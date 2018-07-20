<?php

//Удаление keywords и description
AddEventHandler("main", "OnEndBufferContent", "deleteMetaTags");
function deleteMetaTags(&$content)
{
    $content = preg_replace(array('/<meta(.*?)keywords(.*?)>/','/<meta(.*?)description(.*?)>/'),"",$content);
}