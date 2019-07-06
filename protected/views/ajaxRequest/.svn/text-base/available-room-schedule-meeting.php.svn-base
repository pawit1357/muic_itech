<?php 
if(UserLoginUtil::isLogin()) {
	?>
<table class="check-status-schedule2" cellpadding="0" cellspacing="0">
	<tr>
		<th class="room2">Room</th>
		<?php
		$periods = Period::model()->findAll(array('condition'=>"period_group_id='2' and status_code='PERIOD_ACTIVE'"));
		foreach($periods as $period) {
		?>
		<th><div class="time-period2">
				<?php echo DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min)?>
			</div></th>
		<?php }?>
		<th><div class="time-period2">
				<?php echo DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min)?>
			</div></th>
		<th></th>
	</tr>
	<?php 
	$count = 1;
	if($data != null && count($data) > 0) {
	foreach($data as $room) {
		$count++;
		$requests = RequestUtil::getRequestBookingByDateAndRoom($date, $room->id);
		$requestInDay = array();
		if(isset($requests)) {
			foreach($requests as $request) {
				$requestInDay[''.$request->period_start] = $request;
			}
		}
		?>
	<tr class="row<?php echo $count%2?>2">
		<td><?php echo $room->id?></td>
		<?php 
		$periods = Period::model()->findAll(array('condition'=>"period_group_id='2' and status_code='PERIOD_ACTIVE'"));
		$countCol = 0;
		$request = null;
		foreach($periods as $period) {

			if(isset($requestInDay[''.$period->id])) {
				if($countCol == 0) {
					$countCol = 1;
				}
				$currentRequest = $requestInDay[''.$period->id];
				if($request != null && $request->id != $currentRequest->id) {
					$daysInWeek = array('Sunday','Monday','Teusday','Wednesday','Thursday','Friday','Saturday');
					if($request->request_day_in_week != '') {
						$requestDate = $daysInWeek[$request->request_day_in_week - 1];
					} else {
						$requestDate = DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");
					}

					$description = "Request By : ".$request->user_login->user_information->first_name.' '.$request->user_login->user_information->last_name.'<br>';
					$description = $description."Request Date : ".$requestDate.', '.DateTimeUtil::getTimeFormat($request->period_s->start_hour, $request->period_s->start_min).' - '.DateTimeUtil::getTimeFormat($request->period_e->end_hour, $request->period_e->end_min).'<br>';
					$description = $description."Course : ".$request->course_name.'<br>';
					$description = $description."Request Type : ".$request->request_booking_type->name;
					echo '<td class="booking2" colspan="'.$countCol.'"><div title="'.$description.'" class="description2">&nbsp;</div></td>';
					$countCol = 1;
					$request = $currentRequest;
					if($request->period_end == $period->id) {
						echo '<td class="booking2" colspan="'.$countCol.'"><div title="'.$description.'" class="description2">&nbsp;</div></td>';
						$countCol = 0;
						$request = null;
					}
				} else {
					$request = $requestInDay[''.$period->id];
					if($request->period_end == $period->id) {
						$daysInWeek = array('Sunday','Monday','Teusday','Wednesday','Thursday','Friday','Saturday');
						if($request->request_day_in_week != '') {
							$requestDate = $daysInWeek[$request->request_day_in_week - 1];
						} else {
							$requestDate = DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");
						}
						$description = "Request By : ".$request->user_login->user_information->first_name.' '.$request->user_login->user_information->last_name.'<br>';
						$description = $description."Request Date : ".$requestDate.', '.DateTimeUtil::getTimeFormat($request->period_s->start_hour, $request->period_s->start_min).' - '.DateTimeUtil::getTimeFormat($request->period_e->end_hour, $request->period_e->end_min).'<br>';
						$description = $description."Course : ".$request->course_name.'<br>';
						$description = $description."Request Type : ".$request->request_booking_type->name;
						echo '<td class="booking2" colspan="'.$countCol.'"><div title="'.$description.'" class="description2">&nbsp;</div></td>';
						$countCol = 0;
						$request = null;
					}
				}

			} else {
				if($request == null){
				?>
		<td class="period2">
		<!--
		<input type="checkbox"
			onchange="chkPeriodChange(this)"
			value="<?php echo $room->id.'**'.$period->id?>"
			id="<?php echo $room->id.'**'.$period->id?>">
			-->
			</td>
		<?php
				} else {
					$countCol++;
					if($request->period_end == $period->id) {
						$daysInWeek = array('Sunday','Monday','Teusday','Wednesday','Thursday','Friday','Saturday');
						if($request->request_day_in_week != '') {
							$requestDate = $daysInWeek[$request->request_day_in_week - 1];
						} else {
							$requestDate = DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");
						}
						$description = "Request By : ".$request->user_login->user_information->first_name.' '.$request->user_login->user_information->last_name.'<br>';
						$description = $description."Request Date : ".$requestDate.', '.DateTimeUtil::getTimeFormat($request->period_s->start_hour, $request->period_s->start_min).' - '.DateTimeUtil::getTimeFormat($request->period_e->end_hour, $request->period_e->end_min).'<br>';
						$description = $description."Course : ".$request->course_name.'<br>';
						$description = $description."Request Type : ".$request->request_booking_type->name;
						echo '<td class="booking2" colspan="'.$countCol.'"><div title="'.$description.'" class="description2">&nbsp;</div></td>';
						$countCol = 0;
						$request = null;
					}
				}
			}
			?>
		<?php }?>
		<td class="period2"></td>
		

	</tr>
	<?php }
	} else {
		echo '<tr><td colspan="20"><i>- No room available -</i></td></tr>';
	}?>
</table>
<?php }?>
