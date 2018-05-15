<?php
namespace Bitrix\EsolImportxml;

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

class Utils {
	protected static $moduleId = 'esol.importxml';
	protected static $fileSystemEncoding = null;
	protected static $siteEncoding = null;
	protected static $cpSpecCharLetters = null;
	
	public static function GetOfferIblock($IBLOCK_ID, $retarray=false)
	{
		if(!$IBLOCK_ID || !Loader::includeModule('catalog')) return false;
		$dbRes = \CCatalog::GetList(array(), array('IBLOCK_ID'=>$IBLOCK_ID));
		$arFields = $dbRes->Fetch();
		if(!$arFields['OFFERS_IBLOCK_ID'])
		{
			$dbRes = \CCatalog::GetList(array(), array('PRODUCT_IBLOCK_ID'=>$IBLOCK_ID));
			if($arFields2 = $dbRes->Fetch())
			{
				$arFields = Array(
					'IBLOCK_ID' => $arFields2['PRODUCT_IBLOCK_ID'],
					'YANDEX_EXPORT' => $arFields2['YANDEX_EXPORT'],
					'SUBSCRIPTION' => $arFields2['SUBSCRIPTION'],
					'VAT_ID' => $arFields2['VAT_ID'],
					'PRODUCT_IBLOCK_ID' => 0,
					'SKU_PROPERTY_ID' => 0,
					'OFFERS_PROPERTY_ID' => $arFields2['SKU_PROPERTY_ID'],
					'OFFERS_IBLOCK_ID' => $arFields2['IBLOCK_ID'],
					'ID' => $arFields2['IBLOCK_ID'],
					'IBLOCK_TYPE_ID' => $arFields2['IBLOCK_TYPE_ID'],
					'IBLOCK_ACTIVE' => $arFields2['IBLOCK_ACTIVE'],
					'LID' => $arFields2['LID'],
					'NAME' => $arFields2['NAME']
				);
			}
		}
		if($arFields['OFFERS_IBLOCK_ID'])
		{
			if($retarray) return $arFields;
			else return $arFields['OFFERS_IBLOCK_ID'];
		}
		return false;
	}
	
	public static function GetFileName($fn)
	{
		global $APPLICATION;
		if(file_exists($_SERVER['DOCUMENT_ROOT'].$fn)) return $fn;
		
		if(defined("BX_UTF")) $tmpfile = $APPLICATION->ConvertCharsetArray($fn, LANG_CHARSET, 'CP1251');
		else $tmpfile = $APPLICATION->ConvertCharsetArray($fn, LANG_CHARSET, 'UTF-8');
		
		if(file_exists($_SERVER['DOCUMENT_ROOT'].$tmpfile)) return $tmpfile;
		
		return false;
	}
	
	public static function Win1251Utf8($str)
	{
		global $APPLICATION;
		return $APPLICATION->ConvertCharset($str, "Windows-1251", "UTF-8");
	}
	
	public static function GetFileLinesCount($fn)
	{
		if(!file_exists($fn)) return 0;
		
		$cnt = 0;
		$handle = fopen($fn, 'r');
		while (!feof($handle)) {
			$buffer = trim(fgets($handle));
			if($buffer) $cnt++;
		}
		fclose($handle);
		return $cnt;
	}
	
	public static function SortFileIds($fn)
	{
		if(!file_exists($fn)) return 0;

		$arIds = array();
		$handle = fopen($fn, 'r');
		while (!feof($handle)) {
			$buffer = trim(fgets($handle, 128));
			if($buffer) $arIds[] = (int)$buffer;
		}
		fclose($handle);
		sort($arIds, SORT_NUMERIC);

		unlink($fn);

		$handle = fopen($fn, 'a');
		$cnt = count($arIds);
		$step = 10000;
		for($i=0; $i<$cnt; $i+=$step)
		{
			fwrite($handle, implode("\r\n", array_slice($arIds, $i, $step))."\r\n");
		}
		fclose($handle);
		
		if($cnt > 0) return end($arIds);
		else return 0;
	}
	
	public static function GetPartIdsFromFile($fn, $min)
	{
		if(!file_exists($fn)) return array();

		$cnt = 0;
		$maxCnt = 5000;
		$arIds = array();
		$handle = fopen($fn, 'r');
		while (!feof($handle) && $maxCnt>$cnt) {
			$buffer = (int)trim(fgets($handle, 128));
			if($buffer > $min)
			{
				$arIds[] = (int)$buffer;
				$cnt++;
			}
		}
		fclose($handle);
		return $arIds;
	}
	
	public static function SaveFile($arFile, $strSavePath, $bForceMD5=false, $bSkipExt=false)
	{
		$oProfile = \Bitrix\EsolImportxml\Profile::getInstance();
		$isUtf = (bool)(defined("BX_UTF") && BX_UTF);
		if(\CUtil::DetectUTF8($arFile["name"]))
		{
			if(!$isUtf) $arFile["name"] = \Bitrix\Main\Text\Encoding::convertEncoding($arFile["name"], 'utf-8', LANG_CHARSET);
		}
		else
		{
			if($isUtf) $arFile["name"] = \Bitrix\Main\Text\Encoding::convertEncoding($arFile["name"], 'windows-1251', LANG_CHARSET);
		}
		$strFileName = GetFileName($arFile["name"]);	/* filename.gif */

		if(isset($arFile["del"]) && $arFile["del"] <> '')
		{
			\CFile::DoDelete($arFile["old_file"]);
			if($strFileName == '')
				return "NULL";
		}

		if($arFile["name"] == '')
		{
			if(isset($arFile["description"]) && intval($arFile["old_file"])>0)
			{
				\CFile::UpdateDesc($arFile["old_file"], $arFile["description"]);
			}
			return false;
		}

		if (isset($arFile["content"]))
		{
			if (!isset($arFile["size"]))
			{
				$arFile["size"] = \CUtil::BinStrlen($arFile["content"]);
			}
		}
		else
		{
			try
			{
				$file = new \Bitrix\Main\IO\File(\Bitrix\Main\IO\Path::convertPhysicalToLogical($arFile["tmp_name"]));
				$arFile["size"] = $file->getSize();
			}
			catch(IO\IoException $e)
			{
				$arFile["size"] = 0;
			}
		}

		$arFile["ORIGINAL_NAME"] = $strFileName;

		//translit, replace unsafe chars, etc.
		$strFileName = self::transformName($strFileName, $bForceMD5, $bSkipExt);

		//transformed name must be valid, check disk quota, etc.
		if (self::validateFile($strFileName, $arFile) !== "")
		{
			return false;
		}

		if($arFile["type"] == "image/pjpeg" || $arFile["type"] == "image/jpg")
		{
			$arFile["type"] = "image/jpeg";
		}
		
		/*Remove bad string*/
		$ext = GetFileExtension($strFileName);
		if(Tolower($ext)=='xml' && $arFile['tmp_name'])
		{
			$break = false;
			$filesize = filesize($arFile['tmp_name']);
			$handle = fopen($arFile['tmp_name'], 'r');
			while(!$break && !feof($handle)) 
			{
				$str = fgets($handle);
				if(trim($str) && stripos(trim($str), '<?xml')===false && stripos(trim($str), '<!DOCTYPE')===false)
				{
					$break = true;
				}
				$buffer .= $str;
			}
			
			$updateFile = false;
			if(\COption::GetOptionString(static::$moduleId, 'AUTO_CORRECT_ENCODING', 'N')=='Y' && preg_match('/<\?xml[^>]*encoding=[\'"]([^\'"]*)[\'"][^>]*\?>/is', $buffer, $m))
			{
				$encoding = ToLower($m[1]);
				if($encoding=='cp1251') $encoding = 'windows-1251';
				if($encoding=='utf8') $encoding = 'utf-8';
				$curPos = ftell($handle);
				$partSize = 262144;
				fseek($handle, 0);
				$contents = fread($handle, $partSize);
				if($filesize > $partSize*2)
				{
					fseek($handle, max(($filesize - $partSize)/2, $partSize));
					$contents .= fread($handle, $partSize);
				}
				if($filesize > $partSize)
				{
					fseek($handle, max($filesize - $partSize, $partSize));
					$contents .= fread($handle, $partSize);
				}
				fseek($handle, $curPos);
				
				try{				
					$contents = preg_replace('/%[A-F0-9]{2}/', '', $contents);
					$fileEncoding = 'utf-8';
					if(!\CUtil::DetectUTF8($contents) && (!function_exists('iconv') || iconv('CP1251', 'CP1251', $contents)==$contents))
					{
						$fileEncoding = 'windows-1251';
					}
					if(in_array($encoding, array('windows-1251', 'utf-8')) && $encoding!=$fileEncoding)
					{
						$buffer = preg_replace('/(<\?xml[^>]*encoding=[\'"])([^\'"]*)([\'"][^>]*\?>)/is', '$1'.$fileEncoding.'$3', $buffer);
						$updateFile = true;
					}
				}catch(Exception $ex){}
			}
			
			if(preg_match('/<\?xml[^>]*version=[\'"]([^\'"]*)[\'"][^>]*\?>/is', $buffer, $m))
			{
				$version = ToLower($m[1]);
				if($version!='1.0')
				{
					$buffer = preg_replace('/(<\?xml[^>]*version=)([\'"][^\'"]*[\'"])([^>]*\?>)/is', '$1"1.0"$3', $buffer);
					$updateFile = true;
				}
			}
			
			if(preg_match('/\s+xmlns\s*=\s*"[^"]*"\s*/is', $buffer, $m))
			{
				$buffer = str_replace($m[0], ' ', $buffer);
				$updateFile = true;
			}
			
			if(preg_match('/^\s+/s', $buffer, $m))
			{
				$buffer = ltrim($buffer);
				$updateFile = true;
			}
			
			if($oProfile->GetParam('AUTO_FIX_XML_ERRORS')=='Y')
			{
				$updateFile = true;
			}
			
			if($updateFile)
			{
				$tmpFile = $arFile['tmp_name'].'.tmp';
				$handle2 = fopen($tmpFile, 'a');
				fwrite($handle2, $buffer);
				if($oProfile->GetParam('AUTO_FIX_XML_ERRORS')=='Y')
				{
					$tags = $oProfile->GetParam('AUTO_FIX_XML_CDATA');
					$arTags = array_diff(array_unique(array_map('trim', explode(',', $tags))), array(''));
					while(!feof($handle)) 
					{
						$buffer2 = fgets($handle);
						$buffer2 = preg_replace('/&(?!(amp;|quot;|#039;|lt;|gt;))/', '&amp;', $buffer2);

						foreach($arTags as $tag)
						{
							$buffer2 = preg_replace('/(<'.$tag.'[^>]*>)\s+(\S|$)/is', '$1$2', $buffer2);
							$buffer2 = preg_replace('/(<'.$tag.'[^>]*>)(?!<\!\[CDATA\[)/Uis', '$1<![CDATA[', $buffer2);
							$buffer2 = preg_replace('/(^|\S)\s+(<\/'.$tag.'>)/is', '$1$2', $buffer2);
							$buffer2 = preg_replace('/(?<!\]\]\>)(<\/'.$tag.'>)/Uis', ']]>$1', $buffer2);
						}

						fwrite($handle2, $buffer2);
					}
				}
				else
				{
					while(!feof($handle)) 
					{
						fwrite($handle2, fgets($handle));
					}
				}
				fclose($handle2);
				fclose($handle);
				
				unlink($arFile['tmp_name']);
				copy($tmpFile, $arFile['tmp_name']);
				unlink($tmpFile);
			}
			else
			{
				fclose($handle);
			}
		}
		/*/Remove bad string*/

		$bExternalStorage = false;
		/*foreach(GetModuleEvents("main", "OnFileSave", true) as $arEvent)
		{
			if(ExecuteModuleEventEx($arEvent, array(&$arFile, $strFileName, $strSavePath, $bForceMD5, $bSkipExt)))
			{
				$bExternalStorage = true;
				break;
			}
		}*/

		if(!$bExternalStorage)
		{
			$upload_dir = \COption::GetOptionString("main", "upload_dir", "upload");
			$io = \CBXVirtualIo::GetInstance();
			if($bForceMD5 != true)
			{
				$dir_add = '';
				$i=0;
				while(true)
				{
					$dir_add = substr(md5(uniqid("", true)), 0, 3);
					if(!$io->FileExists($_SERVER["DOCUMENT_ROOT"]."/".$upload_dir."/".$strSavePath."/".$dir_add."/".$strFileName))
					{
						break;
					}
					if($i >= 25)
					{
						$j=0;
						while(true)
						{
							$dir_add = substr(md5(mt_rand()), 0, 3)."/".substr(md5(mt_rand()), 0, 3);
							if(!$io->FileExists($_SERVER["DOCUMENT_ROOT"]."/".$upload_dir."/".$strSavePath."/".$dir_add."/".$strFileName))
							{
								break;
							}
							if($j >= 25)
							{
								$dir_add = substr(md5(mt_rand()), 0, 3)."/".md5(mt_rand());
								break;
							}
							$j++;
						}
						break;
					}
					$i++;
				}
				if(substr($strSavePath, -1, 1) <> "/")
					$strSavePath .= "/".$dir_add;
				else
					$strSavePath .= $dir_add."/";
			}
			else
			{
				$strFileExt = ($bSkipExt == true || ($ext = GetFileExtension($strFileName)) == ''? '' : ".".$ext);
				while(true)
				{
					if(substr($strSavePath, -1, 1) <> "/")
						$strSavePath .= "/".substr($strFileName, 0, 3);
					else
						$strSavePath .= substr($strFileName, 0, 3)."/";

					if(!$io->FileExists($_SERVER["DOCUMENT_ROOT"]."/".$upload_dir."/".$strSavePath."/".$strFileName))
						break;

					//try the new name
					$strFileName = md5(uniqid("", true)).$strFileExt;
				}
			}

			$arFile["SUBDIR"] = $strSavePath;
			$arFile["FILE_NAME"] = $strFileName;
			$strDirName = $_SERVER["DOCUMENT_ROOT"]."/".$upload_dir."/".$strSavePath."/";
			$strDbFileNameX = $strDirName.$strFileName;
			$strPhysicalFileNameX = $io->GetPhysicalName($strDbFileNameX);

			CheckDirPath($strDirName);

			if(is_set($arFile, "content"))
			{
				$f = fopen($strPhysicalFileNameX, "ab");
				if(!$f)
					return false;
				if(fwrite($f, $arFile["content"]) === false)
					return false;
				fclose($f);
			}
			elseif(
				!copy($arFile["tmp_name"], $strPhysicalFileNameX)
				&& !move_uploaded_file($arFile["tmp_name"], $strPhysicalFileNameX)
			)
			{
				\CFile::DoDelete($arFile["old_file"]);
				return false;
			}

			if(isset($arFile["old_file"]))
				\CFile::DoDelete($arFile["old_file"]);

			@chmod($strPhysicalFileNameX, BX_FILE_PERMISSIONS);

			//flash is not an image
			$flashEnabled = !\CFile::IsImage($arFile["ORIGINAL_NAME"], $arFile["type"]);

			$imgArray = \CFile::GetImageSize($strDbFileNameX, false, $flashEnabled);

			if(is_array($imgArray))
			{
				$arFile["WIDTH"] = $imgArray[0];
				$arFile["HEIGHT"] = $imgArray[1];

				if($imgArray[2] == IMAGETYPE_JPEG)
				{
					$exifData = \CFile::ExtractImageExif($io->GetPhysicalName($strDbFileNameX));
					if ($exifData  && isset($exifData['Orientation']))
					{
						//swap width and height
						if ($exifData['Orientation'] >= 5 && $exifData['Orientation'] <= 8)
						{
							$arFile["WIDTH"] = $imgArray[1];
							$arFile["HEIGHT"] = $imgArray[0];
						}

						$properlyOriented = \CFile::ImageHandleOrientation($exifData['Orientation'], $io->GetPhysicalName($strDbFileNameX));
						if ($properlyOriented)
						{
							$jpgQuality = intval(\COption::GetOptionString('main', 'image_resize_quality', '95'));
							if($jpgQuality <= 0 || $jpgQuality > 100)
								$jpgQuality = 95;
							imagejpeg($properlyOriented, $io->GetPhysicalName($strDbFileNameX), $jpgQuality);
						}
					}
				}
			}
			else
			{
				$arFile["WIDTH"] = 0;
				$arFile["HEIGHT"] = 0;
			}
		}

		if($arFile["WIDTH"] == 0 || $arFile["HEIGHT"] == 0)
		{
			//mock image because we got false from CFile::GetImageSize()
			if(strpos($arFile["type"], "image/") === 0)
			{
				$arFile["type"] = "application/octet-stream";
			}
		}

		if($arFile["type"] == '' || !is_string($arFile["type"]))
		{
			$arFile["type"] = "application/octet-stream";
		}

		/****************************** QUOTA ******************************/
		if (\COption::GetOptionInt("main", "disk_space") > 0)
		{
			\CDiskQuota::updateDiskQuota("file", $arFile["size"], "insert");
		}
		/****************************** QUOTA ******************************/

		$NEW_IMAGE_ID = \CFile::DoInsert(array(
			"HEIGHT" => $arFile["HEIGHT"],
			"WIDTH" => $arFile["WIDTH"],
			"FILE_SIZE" => $arFile["size"],
			"CONTENT_TYPE" => $arFile["type"],
			"SUBDIR" => $arFile["SUBDIR"],
			"FILE_NAME" => $arFile["FILE_NAME"],
			"MODULE_ID" => $arFile["MODULE_ID"],
			"ORIGINAL_NAME" => $arFile["ORIGINAL_NAME"],
			"DESCRIPTION" => isset($arFile["description"])? $arFile["description"]: '',
			"HANDLER_ID" => isset($arFile["HANDLER_ID"])? $arFile["HANDLER_ID"]: '',
			"EXTERNAL_ID" => isset($arFile["external_id"])? $arFile["external_id"]: md5(mt_rand()),
		));

		\CFile::CleanCache($NEW_IMAGE_ID);
		return $NEW_IMAGE_ID;
	}
	
	public static function CopyFile($FILE_ID, $bRegister = true, $newPath = "")
	{
		global $DB;

		$err_mess = "FILE: ".__FILE__."<br>LINE: ";
		$z = \CFile::GetByID($FILE_ID);
		if($zr = $z->Fetch())
		{
			/****************************** QUOTA ******************************/
			if (\COption::GetOptionInt("main", "disk_space") > 0)
			{
				$quota = new \CDiskQuota();
				if (!$quota->checkDiskQuota($zr))
					return false;
			}
			/****************************** QUOTA ******************************/

			$strNewFile = '';
			$bSaved = false;
			$bExternalStorage = false;
			foreach(GetModuleEvents("main", "OnFileCopy", true) as $arEvent)
			{
				if($bSaved = ExecuteModuleEventEx($arEvent, array(&$zr, $newPath)))
				{
					$bExternalStorage = true;
					break;
				}
			}

			$io = \CBXVirtualIo::GetInstance();

			if(!$bExternalStorage)
			{
				$strDirName = $_SERVER["DOCUMENT_ROOT"]."/".(\COption::GetOptionString("main", "upload_dir", "upload"));
				$strDirName = rtrim(str_replace("//","/",$strDirName), "/");

				$zr["SUBDIR"] = trim($zr["SUBDIR"], "/");
				$zr["FILE_NAME"] = ltrim($zr["FILE_NAME"], "/");

				$strOldFile = $strDirName."/".$zr["SUBDIR"]."/".$zr["FILE_NAME"];

				if(strlen($newPath))
					$strNewFile = $strDirName."/".ltrim($newPath, "/");
				else
				{
					$i = 1;
					while(($strNewFile = $strDirName."/".$zr["SUBDIR"]."/".preg_replace('/(\.[^\.]*)$/', '['.$i.']$1', $zr["FILE_NAME"])) && $io->FileExists($strNewFile) && $i<1000)
					{
						$i++;
					}
				}

				$zr["FILE_NAME"] = bx_basename($strNewFile);
				$zr["SUBDIR"] = substr($strNewFile, strlen($strDirName)+1, -(strlen(bx_basename($strNewFile)) + 1));

				if(strlen($newPath))
					CheckDirPath($strNewFile);

				$bSaved = copy($io->GetPhysicalName($strOldFile), $io->GetPhysicalName($strNewFile));
			}

			if($bSaved)
			{
				if($bRegister)
				{
					$arFields = array(
						"TIMESTAMP_X" => $DB->GetNowFunction(),
						"MODULE_ID" => "'".$DB->ForSql($zr["MODULE_ID"], 50)."'",
						"HEIGHT" => intval($zr["HEIGHT"]),
						"WIDTH" => intval($zr["WIDTH"]),
						"FILE_SIZE" => intval($zr["FILE_SIZE"]),
						"ORIGINAL_NAME" => "'".$DB->ForSql($zr["ORIGINAL_NAME"], 255)."'",
						"DESCRIPTION" => "'".$DB->ForSql($zr["DESCRIPTION"], 255)."'",
						"CONTENT_TYPE" => "'".$DB->ForSql($zr["CONTENT_TYPE"], 255)."'",
						"SUBDIR" => "'".$DB->ForSql($zr["SUBDIR"], 255)."'",
						"FILE_NAME" => "'".$DB->ForSql($zr["FILE_NAME"], 255)."'",
						"HANDLER_ID" => $zr["HANDLER_ID"]? intval($zr["HANDLER_ID"]): "null",
						"EXTERNAL_ID" => $zr["EXTERNAL_ID"] != ""? "'".$DB->ForSql($zr["EXTERNAL_ID"], 50)."'": "null",
					);
					$NEW_FILE_ID = $DB->Insert("b_file",$arFields, $err_mess.__LINE__);

					if (\COption::GetOptionInt("main", "disk_space") > 0)
						\CDiskQuota::updateDiskQuota("file", $zr["FILE_SIZE"], "copy");

					\CFile::CleanCache($NEW_FILE_ID);

					return $NEW_FILE_ID;
				}
				else
				{
					if(!$bExternalStorage)
						return substr($strNewFile, strlen(rtrim($_SERVER["DOCUMENT_ROOT"], "/")));
					else
						return $bSaved;
				}
			}
			else
			{
				return false;
			}
		}
		return 0;
	}
	
	protected function transformName($name, $bForceMD5 = false, $bSkipExt = false)
	{
		//safe filename without path
		$fileName = GetFileName($name);

		$originalName = ($bForceMD5 != true);
		if($originalName)
		{
			//transforming original name:

			//transliteration
			if(\COption::GetOptionString("main", "translit_original_file_name", "N") == "Y")
			{
				$fileName = \CUtil::translit($fileName, LANGUAGE_ID, array("max_len"=>1024, "safe_chars"=>".", "replace_space" => '-'));
			}

			//replace invalid characters
			if(\COption::GetOptionString("main", "convert_original_file_name", "Y") == "Y")
			{
				$io = \CBXVirtualIo::GetInstance();
				$fileName = $io->RandomizeInvalidFilename($fileName);
			}
		}

		//.jpe is not image type on many systems
		if($bSkipExt == false && strtolower(GetFileExtension($fileName)) == "jpe")
		{
			$fileName = substr($fileName, 0, -4).".jpg";
		}

		//double extension vulnerability
		$fileName = RemoveScriptExtension($fileName);

		if(!$originalName)
		{
			//name is md5-generated:
			$fileName = md5(uniqid("", true)).($bSkipExt == true || ($ext = GetFileExtension($fileName)) == ''? '' : ".".$ext);
		}

		return $fileName;
	}

	protected function validateFile($strFileName, $arFile)
	{
		if($strFileName == '')
			return Loc::getMessage("FILE_BAD_FILENAME");

		$io = \CBXVirtualIo::GetInstance();
		if(!$io->ValidateFilenameString($strFileName))
			return Loc::getMessage("MAIN_BAD_FILENAME1");

		if(strlen($strFileName) > 255)
			return Loc::getMessage("MAIN_BAD_FILENAME_LEN");

		//check .htaccess etc.
		if(IsFileUnsafe($strFileName))
			return Loc::getMessage("FILE_BAD_TYPE");

		//nginx returns octet-stream for .jpg
		if(GetFileNameWithoutExtension($strFileName) == '')
			return Loc::getMessage("FILE_BAD_FILENAME");

		if (\COption::GetOptionInt("main", "disk_space") > 0)
		{
			$quota = new \CDiskQuota();
			if (!$quota->checkDiskQuota($arFile))
				return Loc::getMessage("FILE_BAD_QUOTA");
		}

		return "";
	}
	
	function GetFilesByExt($path, $arExt=array())
	{
		$arFiles = array();
		$arDirFiles = array_diff(scandir($path), array('.', '..'));
		foreach($arDirFiles as $file)
		{
			if(is_file($path.$file) && (empty($arExt) || preg_match('/\.('.implode('|', $arExt).')$/i', ToLower($file))))
			{
				$arFiles[] = $path.$file;
			}
		}
		foreach($arDirFiles as $file)
		{
			if(is_dir($path.$file))
			{
				$arFiles = array_merge($arFiles, self::GetFilesByExt($path.$file.'/', $arExt));
			}
		}
		return $arFiles;
	}
	
	public static function GetFileSystemEncoding()
	{
		if(!isset(static::$fileSystemEncoding))
		{
			$fileSystemEncoding = strtolower(defined("BX_FILE_SYSTEM_ENCODING") ? BX_FILE_SYSTEM_ENCODING : "");

			if (empty($fileSystemEncoding))
			{
				if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN")
					$fileSystemEncoding =  "windows-1251";
				else
					$fileSystemEncoding = "utf-8";
			}
			static::$fileSystemEncoding = $fileSystemEncoding;
		}
		return static::$fileSystemEncoding;
	}
	
	public static function CorrectEncodingForExtractDir($path)
	{
		$fileSystemEncoding = self::GetFileSystemEncoding();
		$arFiles = array();
		$arDirFiles = array_diff(scandir($path), array('.', '..'));
		foreach($arDirFiles as $file)
		{
			if(preg_match('/[^A-Za-z0-9_\-]/', $file))
			{
				$newfile = \Bitrix\Main\Text\Encoding::convertEncoding($file, $fileSystemEncoding, "cp866");
				$isUtf8 = \CUtil::DetectUTF8($newfile);
				if($isUtf8 && $fileSystemEncoding!='utf-8')
				{
					$newfile = \Bitrix\Main\Text\Encoding::convertEncoding($newfile, 'utf-8', $fileSystemEncoding);
				}
				elseif(!$isUtf8 && $fileSystemEncoding=='utf-8')
				{
					$newfile = \Bitrix\Main\Text\Encoding::convertEncoding($newfile, 'windows-1251', $fileSystemEncoding);
				}
				$res = rename($path.$file, $path.$newfile);
				$file = $newfile;
			}
			if(is_dir($path.$file))
			{
				self::CorrectEncodingForExtractDir($path.$file.'/');
			}
		}
	}
	
	public static function GetDateFormat($m)
	{
		$format = str_replace('_', ' ', $m[1]);
		return ToLower(\CIBlockFormatProperties::DateFormat($format, time()));
	}
	
	public static function MergeCookie(&$arCookies, $arNewCookies)
	{
		if(!is_array($arCookies)) $arCookies = array();
		if(!is_array($arNewCookies)) $arNewCookies = array();
		foreach($arNewCookies as $k=>$v)
		{
			/*if(!isset($arCookies[$k]) || strpos(Tolower($k), 'session')===false)
			{
				$arCookies[$k] = $v;
			}*/
			$arCookies[$k] = $v;
		}
	}
	
	public static function MakeFileArray($path, $maxTime = 0)
	{
		$arExt = array('xml', 'yml', 'json');
		if(is_array($path))
		{
			$arFile = $path;
			$temp_path = \CFile::GetTempName('', \Bitrix\Main\IO\Path::convertLogicalToPhysical($arFile["name"]));
			CheckDirPath($temp_path);
			if(!copy($arFile["tmp_name"], $temp_path)
				&& !move_uploaded_file($arFile["tmp_name"], $temp_path))
			{
				return false;
			}
			$arFile = \CFile::MakeFileArray($temp_path);
		}
		else
		{
			$path = trim($path);
			
			$arCookies = array();
			$arHeaders = array('User-Agent' => 'BitrixSM HttpClient class');
			if(preg_match('/^\{.*\}$/s', $path))
			{
				$arParams = \CUtil::JsObjectToPhp($path);
				if(is_array($arParams['HEADERS'])) $arHeaders = array_merge($arHeaders, $arParams['HEADERS']);
				if(isset($arParams['FILELINK']))
				{
					$path = $arParams['FILELINK'];
					
					if(is_array($arParams['VARS']) && $arParams['PAGEAUTH'])
					{
						$redirectCount = 0;
						$location = $arParams['PAGEAUTH'];
						while(strlen($location)>0 && $redirectCount<=5)
						{
							$client = new \Bitrix\Main\Web\HttpClient(array('disableSslVerification'=>true, 'redirect'=>false));
							$client->setCookies($arCookies);
							foreach($arHeaders as $hk=>$hv) $client->setHeader($hk, $hv);
							$res = $client->get($location);
							static::MergeCookie($arCookies, $client->getCookies()->toArray());
							$arHeaders['Referer'] = $location;
							$location = $client->getHeaders()->get("Location");
							$status = $client->getStatus();
							if($status != 302 && $status != 303) $location = '';
							$redirectCount++;
						}
						foreach($arParams['VARS'] as $k=>$v)
						{
							if(strlen(trim($v))==0 
								&& preg_match('/<input[^>]*name=[\'"]'.addcslashes($k, '-').'[\'"][^>]*>/Uis', $res, $m1)
								&& preg_match('/value=[\'"]([^\'"]*)[\'"]/Uis', $m1[0], $m2))
							{
									$arParams['VARS'][$k] = $m2[1];
							}
						}
						
						$redirectCount = 0;
						$location = ($arParams['POSTPAGEAUTH'] ? $arParams['POSTPAGEAUTH'] : $arParams['PAGEAUTH']);
						while(strlen($location)>0 && $redirectCount<=5)
						{
							$client = new \Bitrix\Main\Web\HttpClient(array('disableSslVerification'=>true, 'redirect'=>false));
							$client->setCookies($arCookies);
							foreach($arHeaders as $hk=>$hv) $client->setHeader($hk, $hv);
							$res = $client->post($location, $arParams['VARS']);
							$status = $client->getStatus();
							if($status==404)
							{
								$client = new \Bitrix\Main\Web\HttpClient(array('disableSslVerification'=>true, 'redirect'=>false));
								$client->setCookies($arCookies);
								foreach($arHeaders as $hk=>$hv) $client->setHeader($hk, $hv);
								$res = $client->get($location);
								$status = $client->getStatus();
							}
							static::MergeCookie($arCookies, $client->getCookies()->toArray());
							$arHeaders['Referer'] = $location;
							$location = $client->getHeaders()->get("Location");
							if($status != 302 && $status != 303) $location = '';
							$redirectCount++;
						}
					}
					
					if(strlen($arParams['HANDLER_FOR_LINK_BASE64']) > 0) $handler = base64_decode(trim($arParams['HANDLER_FOR_LINK_BASE64']));
					else $handler = trim($arParams['HANDLER_FOR_LINK']);
					if(strlen($handler) > 0)
					{
						$val = '';
						if($path)
						{
							$client = new \Bitrix\Main\Web\HttpClient(array('disableSslVerification'=>true));
							$client->setCookies($arCookies);
							foreach($arHeaders as $hk=>$hv) $client->setHeader($hk, $hv);
							$val = $client->get($path);
						}
						$path = self::ExecuteFilterExpression($val, $handler, '');
					}
				}
			}
			
			$path = preg_replace_callback('/\{DATE_(\S*)\}/', array('\Bitrix\EsolImportxml\Utils', 'GetDateFormat'), $path);
			if(!$maxTime) $maxTime = min(intval(ini_get('max_execution_time')) - 5, 300);
			if($maxTime<=0) $maxTime = 50;
			$cloud = new \Bitrix\EsolImportxml\Cloud();
			if($service = $cloud->GetService($path))
			{
				$arFile = $cloud->MakeFileArray($service, $path);
			}
			elseif(($maxTime > 15 || !empty($arCookies)) && preg_match("#^(http[s]?)://#", $path) && class_exists('\Bitrix\Main\Web\HttpClient'))
			{
				$path = rawurldecode($path);
				$arUrl = parse_url($path);
				//Cyrillic domain
				if(preg_match('/[^A-Za-z0-9\-\.]/', $arUrl['host']))
				{
					if(!class_exists('idna_convert')) require_once(dirname(__FILE__).'/idna_convert.class.php');
					if(class_exists('idna_convert'))
					{
						$idn = new \idna_convert();
						$oldHost = $arUrl['host'];
						if(!\CUtil::DetectUTF8($oldHost)) $oldHost = \Bitrix\EsolImportxml\Utils::Win1251Utf8($oldHost);
						$path = str_replace($arUrl['host'], $idn->encode($oldHost), $path);
					}
				}

				$temp_path = '';
				$bExternalStorage = false;
				/*foreach(GetModuleEvents("main", "OnMakeFileArray", true) as $arEvent)
				{
					if(ExecuteModuleEventEx($arEvent, array($path, &$temp_path)))
					{
						$bExternalStorage = true;
						break;
					}
				}*/
				
				if(!$bExternalStorage)
				{
					$urlComponents = parse_url($path);
					if ($urlComponents && strlen($urlComponents["path"]) > 0) $baseName = bx_basename($urlComponents["path"]);
					else $baseName = bx_basename($path);
					$temp_path2 = \CFile::GetTempName('', $baseName);
					$temp_path = \Bitrix\Main\IO\Path::convertLogicalToPhysical($temp_path2);
					
					if(!\CUtil::DetectUTF8($path)) $path = self::Win1251Utf8($path);
					$path = preg_replace_callback('/[^:\/?=&#]+/', create_function('$m', 'return rawurlencode($m[0]);'), $path);

					$ob = new \Bitrix\Main\Web\HttpClient(array('socketTimeout'=>$maxTime, 'streamTimeout'=>$maxTime, 'disableSslVerification'=>true));
					$ob->setCookies($arCookies);
					foreach($arHeaders as $hk=>$hv) $ob->setHeader($hk, $hv);
					if($ob->download($path, $temp_path2))
					{
						if($ob->getStatus()!=200)
						{
							$ob = new \Bitrix\Main\Web\HttpClient(array('socketTimeout'=>$maxTime, 'streamTimeout'=>$maxTime, 'disableSslVerification'=>true, 'redirect'=>false));
							foreach($arHeaders as $hk=>$hv) $ob->setHeader($hk, $hv);
							$ob->get($path);
							if(in_array($ob->getStatus(), array(301, 302)))
							{
								$arCookies = $ob->getCookies()->toArray();
								$ob = new \Bitrix\Main\Web\HttpClient(array('socketTimeout'=>10, 'streamTimeout'=>10, 'disableSslVerification'=>true));
								foreach($arHeaders as $hk=>$hv) $ob->setHeader($hk, $hv);
								$ob->setCookies($arCookies);
								$ob->download($path, $temp_path2);
							}
						}
						
						$hcd = $ob->getHeaders()->get('content-disposition');
						$hct = $ob->getHeaders()->get('content-type');
						if($hcd && stripos($hcd, 'filename='))
						{
							$hcdParts = preg_grep('/filename=/i', array_map('trim', explode(';', $hcd)));
							if(count($hcdParts) > 0)
							{
								$hcdParts = explode('=', current($hcdParts));
								$fn = end(explode('/', trim(end($hcdParts), '"\' ')));
								if(strlen($fn) > 0 && strpos($temp_path, $fn)===false)
								{
									$old_temp_path = $temp_path;
									$temp_path = preg_replace('/\/[^\/]+$/', '/'.$fn, $old_temp_path);
									rename($old_temp_path, $temp_path);
								}
							}
						}
						elseif((ToLower(substr($temp_path, -4))=='.php' && strpos(ToLower($path), 'xml')!==false)
							|| (stripos($hct, 'text/xml')!==false) || (stripos($hct, 'application/xml')!==false))
						{
							$old_temp_path = $temp_path;
							$temp_path = substr($temp_path, 0, -4).'.xml';
							rename($old_temp_path, $temp_path);
						}
						$arFile = \CFile::MakeFileArray($temp_path);
					}
				}
				elseif($temp_path)
				{
					$arFile = \CFile::MakeFileArray($temp_path);
				}
				
				if(strlen($arFile["type"])<=0)
					$arFile["type"] = "unknown";
			}
			elseif(preg_match('/ftp(s)?:\/\//', $path))
			{
				$sftp = new \Bitrix\EsolImportxml\Sftp();
				$arFile = $sftp->MakeFileArray($path);
			}
			else
			{
				$arFile = \CFile::MakeFileArray($path);
			}
		}
		
		$ext = ToLower(GetFileExtension($arFile['tmp_name']));
		if($arFile['type']=='application/zip' && !in_array($ext, $arExt))
		{
			$tmpsubdir = dirname($arFile['tmp_name']).'/zip/';
			CheckDirPath($tmpsubdir);
			$zipObj = \CBXArchive::GetArchive($arFile['tmp_name'], 'ZIP');
			$zipObj->Unpack($tmpsubdir);
			self::CorrectEncodingForExtractDir($tmpsubdir);
			$arFile = array();
			$urlComponents = (is_string($path) ? parse_url($path) : array());
			if(isset($urlComponents['fragment']) && strlen($urlComponents['fragment']) > 0)
			{
				$fn = $tmpsubdir.ltrim($urlComponents['fragment'], '/');
				$arFiles = array($fn);
			}
			else
			{
				$arFiles = self::GetFilesByExt($tmpsubdir, $arExt);
			}
			if(count($arFiles) > 0)
			{
				$tmpfile = current($arFiles);
				$temp_path = \CFile::GetTempName('', bx_basename($tmpfile));
				$dir = \Bitrix\Main\IO\Path::getDirectory($temp_path);
				\Bitrix\Main\IO\Directory::createDirectory($dir);
				copy($tmpfile, $temp_path);
				$arFile = \CFile::MakeFileArray($temp_path);
			}
			DeleteDirFilesEx(substr($tmpsubdir, strlen($_SERVER['DOCUMENT_ROOT'])));
		}
		
		self::CheckJsonFile($arFile);
		return $arFile;
	}
	
	public static function CheckJsonFile(&$arFile)
	{
		$ext = ToLower(self::GetFileExtension($arFile['tmp_name']));
		if($ext=='json')
		{
			$tempPath = \CFile::GetTempName('', \Bitrix\Main\IO\Path::convertLogicalToPhysical($arFile['name']).'.xml');
			$dir = \Bitrix\Main\IO\Path::getDirectory($tempPath);
			\Bitrix\Main\IO\Directory::createDirectory($dir);
			$j2x = new \Bitrix\EsolImportxml\Json2Xml();
			$j2x->Convert($arFile['tmp_name'], $tempPath);
			$arFile = \CFile::MakeFileArray($tempPath);
		}
	}
	
	public static function GetFileExtension($filename)
	{
		$filename = end(explode('/', $filename));
		$arParts = explode('.', $filename);
		if(count($arParts) > 1) return end($arParts);
		else return '';
	}
	
	public static function GetShowFileBySettings($SETTINGS_DEFAULT)
	{
		$path = $link = '';
		if($SETTINGS_DEFAULT["EXT_DATA_FILE"])
		{
			if(preg_match('/^\{.*\}$/s', $SETTINGS_DEFAULT["EXT_DATA_FILE"]))
			{
				$arParams = \CUtil::JsObjectToPhp($SETTINGS_DEFAULT["EXT_DATA_FILE"]);
				if(isset($arParams['FILELINK']))
				{
					$path = $arParams['FILELINK'];
				}
			}
			else
			{
				$path = $SETTINGS_DEFAULT["EXT_DATA_FILE"];
			}
			if($path) $link = $path;
		}
		elseif($SETTINGS_DEFAULT["EMAIL_DATA_FILE"])
		{
			$arParams = \CUtil::JsObjectToPhp($SETTINGS_DEFAULT["EMAIL_DATA_FILE"]);
			if(isset($arParams['EMAIL']))
			{
				$path = $arParams['EMAIL'];
			}
		}
		return array('link'=>$link, 'path'=>$path);
	}
	
	public static function AddFileInputActions()
	{
		AddEventHandler("main", "OnEndBufferContent", Array("\Bitrix\EsolImportxml\Utils", "AddFileInputActionsHandler"));
	}
	
	public static function AddFileInputActionsHandler(&$content)
	{
		//if(!function_exists('imap_open')) return;
		
		$comment = 'ESOL_IX_CHOOSE_FILE';
		$commentBegin = '<!--'.$comment.'-->';
		$commentEnd = '<!--/'.$comment.'-->';
		$pos1 = strpos($content, $commentBegin);
		$pos2 = strpos($content, $commentEnd);
		if($pos1!==false && $pos2!==false)
		{
			$partContent = substr($content, $pos1, $pos2 + strlen($commentEnd) - $pos1);
			if(preg_match('/BX\.file_input\((\{.*\})\);/Us', $partContent, $m))
			{
				$json = $m[1];
				$arConfig = \CUtil::JsObjectToPhp($json);
				array_walk_recursive($arConfig, create_function('&$n, $k', 'if($n=="true"){$n=true;}elseif($n=="false"){$n=false;}'));
				$arConfigEmail = array(
					'TEXT' => Loc::getMessage("ESOL_IX_FILE_SOURCE_EMAIL"),
					'GLOBAL_ICON' => 'adm-menu-upload-email',
					'ONCLICK' => 'EProfile.ShowEmailForm();'
				);
				$arConfig['menuNew'][] = $arConfigEmail;
				$arConfig['menuExist'][] = $arConfigEmail;
				$arConfigLinkAuth = array(
					'TEXT' => Loc::getMessage("ESOL_IX_FILE_SOURCE_LINKAUTH"),
					'GLOBAL_ICON' => 'adm-menu-upload-linkauth',
					'ONCLICK' => 'EProfile.ShowFileAuthForm();'
				);
				$arConfig['menuNew'][] = $arConfigLinkAuth;
				$arConfig['menuExist'][] = $arConfigLinkAuth;
				$newJson = \CUtil::PHPToJSObject($arConfig);
				$newPartContent = str_replace($json, $newJson, $partContent);
				$content = str_replace($partContent, $newPartContent, $content);
			}
		}
	}
	
	public static function ExecuteFilterExpression($val, $expression, $altReturn = true)
	{
		$expression = trim($expression);
		try{				
			if(stripos($expression, 'return')===0)
			{
				return eval($expression.';');
			}
			elseif(preg_match('/\$val\s*=/', $expression))
			{
				eval($expression.';');
				return $val;
			}
			else
			{
				return eval('return '.$expression.';');
			}
		}catch(Exception $ex){
			return $altReturn;
		}
	}
	
	public static function RemoveTmpFiles($maxTime = 5)
	{
		$timeBegin = time();
		$docRoot = $_SERVER["DOCUMENT_ROOT"];
		$tmpDir = $docRoot.'/upload/tmp/'.static::$moduleId.'/';
		$arOldDirs = array();
		$arActDirs = array();
		if(file_exists($tmpDir) && ($dh = opendir($tmpDir))) 
		{
			while(($file = readdir($dh)) !== false) 
			{
				if(in_array($file, array('.', '..'))) continue;
				if(is_dir($tmpDir.$file))
				{
					if(!in_array($file, $arActDirs) && (time() - filemtime($tmpDir.$file) > 24*60*60))
					{
						$arOldDirs[] = $file;
					}
				}
				elseif(substr($file, -4)=='.txt')
				{
					$arParams = \CUtil::JsObjectToPhp(file_get_contents($tmpDir.$file));
					if(is_array($arParams) && isset($arParams['tmpdir']))
					{
						$actDir = preg_replace('/^.*\/([^\/]+)$/', '$1', trim($arParams['tmpdir'], '/'));
						$arActDirs[] = $actDir;
					}
				}
			}
			$arOldDirs = array_diff($arOldDirs, $arActDirs);
			foreach($arOldDirs as $subdir)
			{
				$oldDir = substr($tmpDir, strlen($docRoot)).$subdir;
				DeleteDirFilesEx($oldDir);
				if(($maxTime > 0) && (time() - $timeBegin >= $maxTime)) return;
			}
			closedir($dh);
		}
		
		$tmpDir = $docRoot.'/upload/tmp/';
		if(file_exists($tmpDir) && ($dh = opendir($tmpDir))) 
		{
			while(($file = readdir($dh)) !== false) 
			{
				if(!preg_match('/^[0-9a-f]{3}$/', $file)) continue;
				$subdir = $tmpDir.$file;
				if(is_dir($subdir))
				{
					$subdir .= '/';
					if(time() - filemtime($subdir) > 24*60*60)
					{
						if($dh2 = opendir($subdir))
						{
							$emptyDir = true;
							while(($file2 = readdir($dh2)) !== false)
							{
								if(in_array($file2, array('.', '..'))) continue;
								if(time() - filemtime($subdir) > 24*60*60)
								{
									if(is_dir($subdir.$file2))
									{
										$oldDir = substr($subdir.$file2, strlen($docRoot));
										DeleteDirFilesEx($oldDir);
									}
									else
									{
										unlink($subdir.$file2);
									}
								}
								else
								{
									$emptyDir = false;
								}
							}
							closedir($dh2);
							if($emptyDir)
							{
								unlink($subdir);
							}
						}
						
						if(($maxTime > 0) && (time() - $timeBegin >= $maxTime)) return;
					}
				}
			}
			closedir($dh);
		}
	}
	
	public static function GetXmlEncoding($fn)
	{
		$encoding = 'utf-8';
		$handle = fopen($fn, "r");
		while(!($str = trim(fgets($handle, 4096))) && (!feof($handle))) {}
		if(preg_match('/<\?xml[^>]*encoding\s*=\s*[\'"]([^\'"]*)[\'"]/Uis', $str, $m))
		{
			$encoding = ToLower($m[1]);
		}
		else
		{
			fseek($handle, 0);
			$contents = fread($handle, 262144);
			if(!\CUtil::DetectUTF8($contents) && (!function_exists('iconv') || iconv('CP1251', 'CP1251', $contents)==$contents))
			{
				$encoding = 'windows-1251';
			}
		}
		fclose($handle);
		if($encoding=='cp1251') $encoding = 'windows-1251';
		//if($encoding=='utf8') $encoding = 'utf-8';
		if($encoding != 'windows-1251') $encoding = 'utf-8';
		return $encoding;
	}
	
	public static function ConvertDataEncoding($val, $fileEncoding, $siteEncoding)
	{
		if($siteEncoding==$fileEncoding) return $val;
		$val = \Bitrix\EsolImportxml\Utils::ReplaceCpSpecChars($val, $siteEncoding);
		$val = \Bitrix\Main\Text\Encoding::convertEncodingArray($val, $fileEncoding, $siteEncoding);
		return $val;
	}
	
	public static function ReplaceCpSpecChars($val, $toEncoding)
	{
		if(!in_array($toEncoding, array('windows-1251', 'cp1251'))) return $val;
		$specChars = array('Ø'=>'&#216;', '™'=>'&#153;', '®'=>'&#174;', '©'=>'&#169;', 'Ö'=>'&#214;');
		if(!isset(static::$cpSpecCharLetters))
		{
			$cpSpecCharLetters = array();
			foreach($specChars as $char=>$code)
			{
				$letter = false;
				$pos = 0;
				for($i=192; $i<255; $i++)
				{
					$tmpLetter = \Bitrix\Main\Text\Encoding::convertEncoding(chr($i), 'CP1251', 'UTF-8');
					$tmpPos = strpos($tmpLetter, $char);
					if($tmpPos!==false)
					{
						$letter = $tmpLetter;
						$pos = $tmpPos;
					}
				}
				$cpSpecCharLetters[$char] = array('letter'=>$letter, 'pos'=>$pos);
			}
			static::$cpSpecCharLetters = $cpSpecCharLetters;
		}
		
		foreach($specChars as $char=>$code)
		{
			if(strpos($val, $char)===false) continue;
			$letter = static::$cpSpecCharLetters[$char]['letter'];
			$pos = static::$cpSpecCharLetters[$char]['pos'];

			if($letter!==false)
			{
				if($pos==0) $val = preg_replace('/'.substr($letter, 0, 1).'(?!'.substr($letter, 1, 1).')/', $code, $val);
				elseif($pos==1) $val = preg_replace('/(?<!'.substr($letter, 0, 1).')'.substr($letter, 1, 1).'/', $code, $val);
			}
			else
			{
				$val = str_replace($char, $code, $val);
			}
		}
		return $val;
	}
	
	public static function getSiteEncoding()
	{
		if(!isset(static::$siteEncoding))
		{
			if (defined('BX_UTF'))
				$logicalEncoding = "utf-8";
			elseif (defined("SITE_CHARSET") && (strlen(SITE_CHARSET) > 0))
				$logicalEncoding = SITE_CHARSET;
			elseif (defined("LANG_CHARSET") && (strlen(LANG_CHARSET) > 0))
				$logicalEncoding = LANG_CHARSET;
			elseif (defined("BX_DEFAULT_CHARSET"))
				$logicalEncoding = BX_DEFAULT_CHARSET;
			else
				$logicalEncoding = "windows-1251";

			static::$siteEncoding = strtolower($logicalEncoding);
		}
		return static::$siteEncoding;
	}
}
?>