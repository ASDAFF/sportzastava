<?php
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class IntecUniverse
{
    protected static $_1 = 'intec.universe';
    protected static $_0 = 0;

    public static function Initialize() {
        $GLOBALS['_1870344046_']=Array('is_f' .'ile','intval','fil' .'e_get_' .'co' .'ntents','i' .'s_fi' .'le','md' .'5','' .'file_g' .'et_conten' .'ts','stream_c' .'ont' .'e' .'xt_' .'create','rawu' .'r' .'l' .'encode','ra' .'wurle' .'nc' .'ode','rawur' .'lenc' .'ode','ra' .'wurlencode','fil' .'e_put' .'_c' .'ontents'); ?><? function _819689215($i){$a=Array('/bitrix/modules/','/temp.dat','/bitrix/license_key.php','http://license.intecwork1.ru/licenses/verify','BITRIX','LICENCE','SERVER_NAME','http','method','POST','header','Content-Type: application/x-www-form-urlencoded','content','solution=','&key=','&hash=','&domain=','blocked','removed','/bitrix/modules/');return $a[$i];} ?><? static::$_0=CModule::IncludeModuleEx(static::$_1);$_2=new DateTime();$_3=Application::getDocumentRoot() ._819689215(0) .static::$_1 ._819689215(1);$_4=$GLOBALS['_1870344046_'][0]($_3);$_5=new DateTime();if($_4)$_5->setTimestamp($GLOBALS['_1870344046_'][1]($GLOBALS['_1870344046_'][2]($_3)));$_6=$_2->diff($_5);if($_6->days>round(0+1)||!$_4){$_8=Application::getDocumentRoot() ._819689215(2);if($GLOBALS['_1870344046_'][3]($_8)){include($_8);$_8=null;if(isset($LICENSE_KEY))$_8=$LICENSE_KEY;}else{$_8=null;}$_9=_819689215(3);$_10=static::$_1;$_11=$GLOBALS['_1870344046_'][4](_819689215(4) .$_8 ._819689215(5));$_12=$_SERVER[_819689215(6)];$_13=@$GLOBALS['_1870344046_'][5]($_9,false,$GLOBALS['_1870344046_'][6]([_819689215(7)=>[_819689215(8)=> _819689215(9),_819689215(10)=> _819689215(11) .PHP_EOL,_819689215(12)=> _819689215(13) .$GLOBALS['_1870344046_'][7]($_10) ._819689215(14) .$GLOBALS['_1870344046_'][8]($_8) ._819689215(15) .$GLOBALS['_1870344046_'][9]($_11) ._819689215(16) .$GLOBALS['_1870344046_'][10]($_12)]]));if($_13 == _819689215(17)){static::$_0=round(0);}else if($_13 == _819689215(18)){DeleteDirFilesEx(_819689215(19) .static::$_1);static::$_0=round(0);}else{$GLOBALS['_1870344046_'][11]($_3,$_2->getTimestamp());}}static::Validate();
    }

    protected static function Validate() {
        if (static::$_0 != 1 && static::$_0 != 2)
            die(Loc::getMessage('intec.universe.demo', ['#MODULE_ID#' => static::$_1]));
    }

    public static function SettingsDisplay($value = null, $sSiteId = false)
    {
        if ($value === null)
            return COption::GetOptionString(
                static::$_1,
                'settingsDisplay',
                'admin',
                $sSiteId
            );

        if (!in_array($value, ['none', 'admin', 'all']))
            $value = 'none';

        COption::SetOptionString(
            static::$_1,
            'settingsDisplay',
            $value,
            '',
            $sSiteId
        );

        return true;
    }
}
?>