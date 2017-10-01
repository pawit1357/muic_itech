<?php 
if(UserLoginUtil::isLogin()) {
	$periods = Period::model()->findAll(array('condition'=>"status_code='PERIOD_ACTIVE'"));
	$condition = "room_id='".$roomId."' and MONTH(request_date) = '".$month."' AND YEAR(request_date) = '".$year."'";
	$requestBookings = RequestBooking::model()->findAll(array('condition'=>$condition));
	$requestGroupByDate = array();
	foreach($requestBookings as $requestBooking) {
		if(isset($requestGroupByDate[$requestBooking->request_date])){
			$requestsInDate = $requestGroupByDate[$requestBooking->request_date];
			$requestsInDate[count($requestInDate)] = $requestBooking;
		} else {
			$requestsInDate = array();
			$requestsInDate[0] = $requestBooking;
			$requestGroupByDate[$requestBooking->request_date] = $requestsInDate;
		}
	}
	$monthNames = array();
	$monthNames['1'] = 'January';
	$monthNames['2'] = 'February';
	$monthNames['3'] = 'March';
	$monthNames['4'] = 'April';
	$monthNames['5'] = 'May';
	$monthNames['6'] = 'June';
	$monthNames['7'] = 'July';
	$monthNames['8'] = 'August';
	$monthNames['9'] = 'September';
	$monthNames['10'] = 'October';
	$monthNames['11'] = 'November';
	$monthNames['12'] = 'December';
	$startDayOfMonth = 1;
	$endDatOfMonth = date('t', strtotime($monthNames[$month].'1, '.$year));
	echo $monthNames[$month].', '.$year;
	?>
<table class="room-schedule">
	<tr>
		<th align="left"><div class="date">Day</div></th>
		<?php foreach($periods as $period) {?>
		<th align="left"><div style="">
				<?php echo DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min)?>
			</div>
		</th>
		<?php }?>
	</tr>
	<?php 
	for($day = $startDayOfMonth; $day <= $endDatOfMonth; $day++) {
		
	?>
	<tr>
		<td><div class="date">
				<?php echo $day?>
			</div></td>
		<?php 
		$requestsInDate = $requestGroupByDate[$year."-".DateTimeUtil::numberToString($month).'-'.DateTimeUtil::numberToString($day)];
		$requestInThisDay = array();
		if($requestsInDate != null) {
			foreach($requestsInDate as $requestInDate) {
				$periodStart = $requestInDate->period_start;
				$periodEnd = $requestInDate->period_end;
				for($i = $periodStart; $i <= $periodEnd; $i++){
					$requestInThisDay[''.$i] = $requestInDate;
				}
			}
		}
		$currentRequest;
		$countPeriod = 0;
		$content = '';
		foreach($periods as $period) {
			$requestThisPeriod = $requestInThisDay[''.$period->id];
			if(isset($requestThisPeriod)){
				if(isset($currentRequest) && $currentRequest->id != $requestThisPeriod->id) {
					$content = '<div class="request">'.$currentRequest->user_login->user_information->first_name.'</div>';
					echo '<td';
					if($countPeriod > 1) {
						echo ' colspan="'.$countPeriod.'"';
					}
					echo '>'.$content.'</td>';
					$currentRequest = $requestThisPeriod;
					$countPeriod = 1;
					$content = '';
				} else {
					$currentRequest = $requestThisPeriod;
					$countPeriod = $countPeriod + 1;
					$content = '';
				}
			} else {
				if(isset($currentRequest)) {
					$content = '<div class="request">'.$currentRequest->user_login->user_information->first_name.'</div>';
					echo '<td';
					if($countPeriod > 1) {
						echo ' colspan="'.$countPeriod.'"';
					}
					echo '>'.$content.'</td>';
					$content = '';
					unset($currentRequest);
					$countPeriod = 0;
				} else {
					$content = ' ';
				}
			}

			if($content != '') {
				echo '<td';
				if($countPeriod > 1) {
					echo ' colspan="'.$countPeriod.'"';
				}
				echo '>'.$content.'</td>';
			}
		}
		?>

	</tr>
	<?php }?>
</table>
<?php
}
?>