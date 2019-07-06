<?php 
if(UserLoginUtil::isLogin()) {
	if($requestType == ''){
		echo 'Please select request type.';
	} else {
		if($requestType == '1'){
			dailyRequest();
		} else if ($requestType == '2'){
			semesterRequest();
		} else if ($requestType == '3'){
			activityRequest();
		}
	}
}

function dailyRequest(){
	$periods = Period::model()->findAll(array('condition'=>"period_group_id = '1'"));
	?>
<form>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="20%">Date</td>
			<td class="column-right"><input type="text" id="datepicker"
				name="date" onchange="checkRequestBookingDate()"
				value="<?php echo $_SESSION['request_date']?>">
			</td>
		</tr>
		
		
		
		<tr>
			<td class="column-left">Time Period</td>
			<td class="column-right">
			<select id="time-start"
					onchange="checkRequestBookingDate()">
						<option value="">--Start Time--</option>
						<?php 
						foreach ($periods as $period){
						echo '<option value="'.$period->id.'"'.($_SESSION['request_time_start'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
					}
					?>
				</select> - <select id="time-end"
					onchange="checkRequestBookingDate()">
						<option value="">--End Time--</option>
						<?php 
						foreach ($periods as $period){
						echo '<option value="'.$period->id.'"'.($_SESSION['request_time_end'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min).'</option>';
					}
					?>
				</select>
			
			
			
			</td>
		</tr>
	</table>
</form>
<div id="available-request-room"></div>
<?php
}

function semesterRequest(){
					$semesters = Semester::model()->findAll(array('condition'=>"end_date > '".date("Y-m-d")."'"));
					$daysInWeek = Enumeration::model()->findAll(array('condition'=>"enumeration_type_code = 'DAY_IN_WEEK'"));
					$periods = Period::model()->findAll(array('condition'=>"period_group_id = '1'"));
					?>
<table class="simple-form">
	<tr>
		<td class="column-left" width="20%">Semester</td>
		<td class="column-right"><?php 
		$semesters = Semester::model()->findAll(array('condition'=>"'".date("Y-m-d")."' BETWEEN start_date AND end_date"));
		$semester = $semesters[0];
		?> <input type="hidden" name="RequestBooking[semester_id]"
			id="semester" value="<?php echo $semester->id?>"> <?php echo $semester->name?>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="20%">Day</td>
		<td class="column-right"><select id="day-in-week"
			onchange="checkRequestBookingSemesterDate()">
				<option value="">--Select--</option>
				<?php 
				$day = date('N', (strtotime($_SESSION['request_date']) + (60 * 60 * 24)));
				foreach($daysInWeek as $dayInWeek) {?>
				<option value="<?php echo $dayInWeek->id?>" <?php echo $day == $dayInWeek->id ? 'selected="selected"' : ''?>>
					<?php echo $dayInWeek->name?>
				</option>
				<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left">Time Period</td>
		<td class="column-right">
		<select id="time-start"
				onchange="checkRequestBookingSemesterDate()">
					<option value="">--Start Time--</option>
					<?php 
					foreach ($periods as $period){
					echo '<option value="'.$period->id.'"'.($_SESSION['request_time_start'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
				}
				?>
			</select> - <select id="time-end"
				onchange="checkRequestBookingSemesterDate()">
					<option value="">--End Time--</option>
					<?php 
					foreach ($periods as $period){
					echo '<option value="'.$period->id.'"'.($_SESSION['request_time_end'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min).'</option>';
				}
				?>
			</select>
		
		
		
		</td>
	</tr>
</table>
<div id="available-request-room"></div>
<?php 
}


function activityRequest(){
	$periods = Period::model()->findAll(array('condition'=>"period_group_id = '2' AND status_code = 'PERIOD_ACTIVE'"));
	?>
<form>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="20%">Date</td>
			<td class="column-right"><input
				onchange="checkRequestBookingActivityDate()" type="text"
				id="datepicker" name="date"
				<?php echo ($_SESSION['request_date'] != '' ? 'value="'.$_SESSION['request_date'].'"' : '')?>>
			</td>
		</tr>
		<tr>
			<td class="column-left">Time Period</td>
			<td class="column-right"><select id="time-start"
				onchange="checkRequestBookingActivityDate()">
					<option value="">--Start Time--</option>
					<?php 
					foreach ($periods as $period){
					echo '<option value="'.$period->id.'"'.($_SESSION['request_time_start'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
				}
				?>
			</select> - <select id="time-end"
				onchange="checkRequestBookingActivityDate()">
					<option value="">--End Time--</option>
					<?php 
					foreach ($periods as $period){
					echo '<option value="'.$period->id.'"'.($_SESSION['request_time_end'] == $period->id ? 'selected="selected"' : '').'>'.DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min).'</option>';
				}
				?>
			</select></td>
		</tr>
	</table>
</form>
<div id="available-request-room"></div>
<?php }?>