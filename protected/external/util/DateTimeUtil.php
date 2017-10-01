<?php
class DateTimeUtil {
	private $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

	public static function getDateFormat($date, $format) {
		list($d, $t) = explode(' ', $date);
		list($year, $month, $day) = explode('-', $d);
		list($hour, $min, $sec) = explode(':', $t);
		$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$format = str_replace('yyyy', $year, $format);
		$format = str_replace('MM', $months[($month-1)], $format);
		$format = str_replace('mm', $month, $format);
		$format = str_replace('dd', $day, $format);

		return $format;
	}
	public static function getDateFormatDay_1($date, $format) {
		list($d, $t) = explode(' ', $date);
		list($year, $month, $day) = explode('-', $d);
		list($hour, $min, $sec) = explode(':', $t);
		$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$format = str_replace('yyyy', $year, $format);
		$format = str_replace('MM', $months[($month-1)], $format);
		$format = str_replace('mm', $month, $format);
		$format = str_replace('dd', $day-1, $format);
	
		return $format;
	}
	public static function convertDateFormat($date, $format) {
		list($day, $month, $year) = explode('-', $date);
		$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$format = str_replace('yyyy', $year, $format);
		$format = str_replace('MM', $months[($month-1)], $format);
		$format = str_replace('mm', $month, $format);
		$format = str_replace('dd', $day, $format);

		return $format;
	}

	public static function getTimeFormat($hour, $min) {
		if(strlen($hour) == 1) {
			$hour = '0'.$hour;
		}
		if(strlen($min) == 1) {
			$min = '0'.$min;
		}

		return $hour.'.'.$min;
	}
	public static function getTimeFormatSplitBySemi($hour, $min) {
		if(strlen($hour) == 1) {
			$hour = '0'.$hour;
		}
		if(strlen($min) == 1) {
			$min = '0'.$min;
		}
	
		return $hour.':'.$min;
	}
	public static function getMonthName($month) {
		return $format;
	}
	public static function numberToString($number) {
		if(strlen($number) == 1){
			return '0'.$number;
		} else {
			return $number;
		}
	}
	public static function getDayRemain($start, $end) {
		$timeStart = strtotime($start);
		$timeEnd = strtotime($end);
		$timeDiff = $timeEnd - $timeStart;
		$day = round($timeDiff / 60 / 60 /24);
		return $day;
	}
}

?>