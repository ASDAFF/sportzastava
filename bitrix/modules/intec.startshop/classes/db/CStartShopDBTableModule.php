<? $GLOBALS['_1149133681_']=Array('strval','' .'strval','strval','is' .'_array','i' .'s' .'_array','' .'is' .'_a' .'rray','' .'in_array','in_array','a' .'rra' .'y_merge','in' .'_a' .'r' .'r' .'ay','' .'arr' .'ay_' .'m' .'erge'); ?><? function _1852550850($i){$a=Array();return $a[$i];} ?><? class CStartShopDBTableModule{protected $Table=null;protected $Fields=null;protected $FieldLink=null;protected $FieldKey=null;public function __construct($_0,$_1,$_2,$_3=null){$this->Table=$GLOBALS['_1149133681_'][0]($_0);$this->FieldLink=$GLOBALS['_1149133681_'][1]($_1);$this->FieldKey=$GLOBALS['_1149133681_'][2]($_2);$this->Fields=$GLOBALS['_1149133681_'][3]($_3)?$_3:array();}public function Set($_4=array(),$_5=array()){if(empty($this->Table)|| empty($this->FieldLink))return $this;$_6=array();if(!empty($_4))$_6[$this->FieldLink]=$_4;CStartShopDBQueryBX::Delete()->From($this->Table)->Where($_6)->Execute();if(!empty($_4)&&!empty($_5)&& $GLOBALS['_1149133681_'][4]($_5)){$_7=array();if(!$GLOBALS['_1149133681_'][5]($_4)){$_7[]=$_4;}else{$_7=$_4;}if(!empty($_7))foreach($_7 as $_8)foreach($_5 as $_9 => $_3){if(empty($_9))continue;if(!empty($this->Fields)){foreach($_3 as $_10 => $_11){if(!$GLOBALS['_1149133681_'][6]($_10,$this->Fields))unset($_12[$_10]);}}else{$_3=array();}$_3[$this->FieldLink]=$_8;$_3[$this->FieldKey]=$_9;CStartShopDBQueryBX::Insert()->Into($this->Table)->Values($_3)->Execute();}}}public function Get($_13=array(),$_4=null,$_14=null,$_6=array()){foreach($_13 as $_9 => $_15){if(!$GLOBALS['_1149133681_'][7]($_9,$GLOBALS['_1149133681_'][8]($this->Fields,array($this->FieldLink,$this->FieldKey))))unset($_13[$_9]);}foreach($_6 as $_9 => $_16){if(!$GLOBALS['_1149133681_'][9]($_9,$GLOBALS['_1149133681_'][10]($this->Fields,array($this->FieldLink,$this->FieldKey))))unset($_6[$_9]);}if(!empty($_4))$_6[$this->FieldLink]=$_4;if(!empty($_14))$_6[$this->FieldKey]=$_14;return CStartShopDBQueryBX::Select()->From($this->Table)->Where($_6)->OrderBy($_13)->Execute();}public function GetTable(){return $this->Table;}public function GetFieldLink(){return $this->FieldLink;}public function GetFieldKey(){return $this->FieldKey;}} ?>