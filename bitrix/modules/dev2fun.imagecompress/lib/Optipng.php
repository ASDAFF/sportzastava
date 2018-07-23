<?php
/**
 * @author darkfriend <hi@darkfriend.ru>
 * @copyright dev2fun
 * @version 0.2.1
 */

namespace Dev2fun\ImageCompress;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

IncludeModuleLangFile(__FILE__);

class Optipng
{
	private static $instance;
	public $lastError;

	private $MODULE_ID = 'dev2fun.imagecompress';
	private $pngOptimPath = '';

	private function __construct() {
		$this->pngOptimPath = Option::get($this->MODULE_ID,'path_to_optipng');
	}

	/**
	 * @static
	 * @return Compress
	 */
	public static function getInstance() {
		if (!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * Проверка возможности оптимизации PNG
	 * @return bool
	 */
	public function isPNGOptim() {
		exec($this->pngOptimPath.'/optipng -v',$s);
		return ($s?true:false);
	}

	/**
	 * Процесс оптимизации PNG
	 * @param string $strFilePath - абсолютный путь до картинки
	 * @param int $quality - качество от 1 до 7
	 * @param array $params - дополнительные параметры
	 * @return bool
	 * @throws \Exception
	 */
	public function compressPNG($strFilePath,$quality=3,$params=[]) {
		$strFilePath = strtr(
			$strFilePath,
			array(
				' '=>'\ ',
				'('=>'\(',
				')'=>'\)',
				']'=>'\]',
				'['=>'\[',
			)
		);
		exec($this->pngOptimPath."/optipng -strip all -o{$quality} $strFilePath 2>&1", $res);
		chmod($strFilePath,0777);
		return true;
	}
}