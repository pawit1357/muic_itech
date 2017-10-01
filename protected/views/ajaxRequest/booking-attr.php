<?php 
if(UserLoginUtil::isLogin()) {
	if($roomId != '') {
		$_SESSION['request_room'] = $roomId;
	}
	if($periodStart != '') {
		$_SESSION['request_time_start'] = $periodStart;
	}
	if($periodEnd != '') {
		$_SESSION['request_time_end'] = $periodEnd;
	}
	if($requestDate != '') {
		$_SESSION['request_date'] = $requestDate;
	}
	if($type != '') {
		$_SESSION['request_type'] = $type;
	}
}
?>