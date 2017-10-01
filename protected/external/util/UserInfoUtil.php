<?php
class UserInfoUtil {

	public static function getGenderName($gender) {
		switch ($gender) {
			case 'M':
				return 'Male';
			case 'F':
				return 'Female';
			default:
				return '-';
		}
	}
}
?>