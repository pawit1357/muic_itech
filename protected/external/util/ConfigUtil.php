<?php
class ConfigUtil {
 	private static $siteName = 'https://ed.muic.mahidol.ac.th/itech';
	private static $PushSiteName = 'http://www.prdapp.net/itechservice/';
// 	private static $siteName = 'http://prdapp.net/itech';
	private static $defaultPageSize = 15;
	private static $returnLatePricePerDay = 500;
	
	public static function getDbName() {
		$str = Yii::app()->db->connectionString;
		list($host, $db) = explode(';', $str);
		list($xx, $dbName) = explode('=', $db);
		return $dbName;
	}
	public static function getHostName() {
		$str = Yii::app()->db->connectionString;
		list($host, $db) = explode(';', $str);
		list($xx, $hostName) = explode('=', $host);
		return $hostName;
	}
	public static function getUsername() {
		return Yii::app()->db->username;
	}
	
	public static function getReturnLatePricePerDay() {
		return $this->returnLatePricePerDay;
	}
	public static function getPassword() {
		return Yii::app()->db->password;
	}
	public static function getSiteName() {
		return self::$siteName;
	}
	public static function getPushSiteName() {
		return self::$PushSiteName;
	}
	public static function getDefaultPageSize() {
		return self::$defaultPageSize;
	}
}
?>