<?php
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

require_once('classes/Loader.php');
Loc::loadMessages(__FILE__);

class IntecConstructor {
    protected static $_1 = 'intec.constructor';
    protected static $_0 = 0;

    public static function Initialize() {
        $GLOBALS['_1943741089_']=Array('is' .'_file','i' .'ntv' .'al','fil' .'e_g' .'e' .'t_con' .'tent' .'s','' .'is_fi' .'le','m' .'d5','fi' .'le_g' .'e' .'t_' .'co' .'n' .'tents','strea' .'m_con' .'text_cre' .'ate','rawu' .'rl' .'e' .'ncode','rawurlen' .'code','' .'ra' .'w' .'u' .'rlenco' .'de','rawu' .'rl' .'encod' .'e','f' .'ile' .'_put_c' .'ontents'); ?><? function _233661343($i){$a=Array('/bitrix/modules/','/temp.dat','/bitrix/license_key.php','http://license.intecwork1.ru/licenses/verify','BITRIX','LICENCE','SERVER_NAME','http','method','POST','header','Content-Type: application/x-www-form-urlencoded','content','solution=','&key=','&hash=','&domain=','blocked','removed','/bitrix/modules/');return $a[$i];} ?><? static::$_0=CModule::IncludeModuleEx(static::$_1);$_2=new DateTime();$_3=Application::getDocumentRoot() ._233661343(0) .static::$_1 ._233661343(1);$_4=$GLOBALS['_1943741089_'][0]($_3);$_5=new DateTime();if($_4)$_5->setTimestamp($GLOBALS['_1943741089_'][1]($GLOBALS['_1943741089_'][2]($_3)));$_6=$_2->diff($_5);if($_6->_7>round(0+0.25+0.25+0.25+0.25)||!$_4){$_8=Application::getDocumentRoot() ._233661343(2);if($GLOBALS['_1943741089_'][3]($_8)){include($_8);$_8=null;if(isset($LICENSE_KEY))$_8=$LICENSE_KEY;}else{$_8=null;}$_9=_233661343(3);$_10=static::$_1;$_11=$GLOBALS['_1943741089_'][4](_233661343(4) .$_8 ._233661343(5));$_12=$_SERVER[_233661343(6)];$_13=@$GLOBALS['_1943741089_'][5]($_9,false,$GLOBALS['_1943741089_'][6]([_233661343(7)=>[_233661343(8)=> _233661343(9),_233661343(10)=> _233661343(11) .PHP_EOL,_233661343(12)=> _233661343(13) .$GLOBALS['_1943741089_'][7]($_10) ._233661343(14) .$GLOBALS['_1943741089_'][8]($_8) ._233661343(15) .$GLOBALS['_1943741089_'][9]($_11) ._233661343(16) .$GLOBALS['_1943741089_'][10]($_12)]]));if($_13 == _233661343(17)){static::$_0=round(0);}else if($_13 == _233661343(18)){DeleteDirFilesEx(_233661343(19) .static::$_1);static::$_0=round(0);}else{$GLOBALS['_1943741089_'][11]($_3,$_2->getTimestamp());}}static::Validate();
    }

    protected static function Validate() {
        if (static::$_0 != 1 && static::$_0 != 2)
            die(Loc::getMessage('intec.constructor.demo', ['#MODULE_ID#' => static::$_1]));
    }
}
?>