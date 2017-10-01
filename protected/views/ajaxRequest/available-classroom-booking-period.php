
<?php 
if(UserLoginUtil::isLogin()) {

	if(($date == '' || $start == '' || $end == '') && ($day == '' || $semester == '' ||  $start == '' || $end == '')){
		echo 'Some require field is missing.';
	} else {
		/** To Do - Available Room ***/
		if($date != ''){
			list($dd, $mm, $yy) = explode('-', $date);
			$date = $yy.'-'.$mm.'-'.$dd;
			//$requests = RequestBooking::model()->findAll(array('condition'=>"request_date='".$date."' and (".$start." between period_start and period_end or ".$end." between period_start and period_end)"));
		}
		$roomIds = RequestUtil::getUnavailableSpecifyRoom($date, $start, $end, $day, $semester);

		$strIn = '(0,';
		if(count($roomIds) > 0){
			foreach ($roomIds as $roomId){
				$strIn = $strIn.$roomId.',';
			}
		}
		$strIn = substr($strIn, 0, strlen($strIn) - 1);
		$strIn = $strIn.')';
		$rooms = Room::model()->findAll(array('condition' => 'id not in '.$strIn));
		$eventTypes = EventType::model()->findAll();
		$roomTypes = RoomType::model()->findAll(array('condition' => 'id not in (3)'));//->findAll();
		$presentTypes = PresentType::model()->findAll();
		?>
		

<table class="simple-form">
	<tr>
		<td width="20%"></td>
		<td><?php if($date != '') {?> <input type="hidden"
			name="RequestBooking[request_date]" value="<?php echo $date?>"> <?php }?>
			<?php if($requestType != '') {?> <input type="hidden"
			name="RequestBooking[request_booking_type_id]"
			value="<?php echo $requestType?>"> <?php }?> <?php if($day != '') {?>
			<input type="hidden" name="RequestBooking[request_day_in_week]"
			value="<?php echo $day?>"> <?php }?> <?php if($semester != '') {?> <input
			type="hidden" name="RequestBooking[semester_id]"
			value="<?php echo $semester?>"> <?php }?> <input type="hidden"
			name="RequestBooking[period_start]" value="<?php echo $start?>"> <input
			type="hidden" name="RequestBooking[period_end]"
			value="<?php echo $end?>"></td>
	</tr>
	<?php if($requestType == '3'){?>

	<tr>
		<td class="column-left">Room</td>
		<td class="column-right"><select id="room_id"
			name="RequestBooking[room_id]"
			   onchange="ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentInRoom/room")?>/' + this.value +'/request_date/'+$('#datepicker').val()+'/Start/' + $('#time-start').val() + '/End/' + $('#time-end').val(), 'equipment-area','loadSpinner(); loadAjaxUpload();')" > 
				<option value="">--Room--</option>
				<?php 	
				$rooms = Room::model()->findAll(array('condition'=>"room_group_id='2'"));
				foreach($rooms as $room){
					?>
				<option value="<?php echo $room->id?>"
				<?php echo $_SESSION['request_room'] == $room->id ? 'selected="selected"' : ''?>>
					<?php echo $room->name?> -
					<?php echo $room->room_group->name?>
				</option>
				<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Equipment</td>
		<td class="column-right">
			<div id="equipment-area">Please select room.</div>
		</td>
	</tr>


	<tr>
		<td class="column-left">Type of event</td>
		<td class="column-right"><select
			name="RequestBookingActivityDetail[event_type_id]" id="event_type">
				<option value="">--Select--</option>
				<?php foreach($eventTypes as $eventType) {?>
				<option value="<?php echo $eventType->id?>">
					<?php echo $eventType->name?>
				</option>
				<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of room / area</td>
		<td class="column-right"><select
			name="RequestBookingActivityDetail[room_type_id]" id="room_type">
				<option value="">--Select--</option>
				<?php foreach($roomTypes as $roomType) {?>
				<option value="<?php echo $roomType->id?>">
					<?php echo $roomType->name?>
				</option>
				<?php }?>

		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of present</td>
		<td class="column-right"><?php foreach($presentTypes as $presentType) {?>

			<div>
				<input type="checkbox" name="present_type[]"
					value="<?php echo $presentType->id?>">
				<?php echo $presentType->name?>
			</div> <?php }?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Upload<br> <span style="font-size: 10px">
				(File for Presentation)</span>
		</td>
		<td class="column-right"><span> <input id="fileupload" type="file"
				name="files[]">
		</span> <br> <br> <!-- The global progress bar -->
			<div id="progress" class="progress progress-success progress-striped">
				<div class="bar"></div>
			</div> <!-- The container for the uploaded files -->
			<div id="files"></div> <input type="hidden" id="f_path"
			name="RequestBookingActivityDetail[file_path]" value="">
		</td>
	</tr>
	<tr>
		<td class="column-left">Important Notes</td>
		<td class="column-right"><textarea
				name="RequestBookingActivityDetail[description]"></textarea>
		</td>
	</tr>

	<?php } else {?>
	<tr>
		<td class="column-left">Class Room</td>
		<td class="column-right"><select id="room_id"
			name="RequestBooking[room_id]"
			onchange="ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentInRoom/room")?>/' + this.value, 'equipment-area')">
				<option value="">--Room--</option>
				<?php 	
				$rooms = Room::model()->findAll(array('condition'=>"room_group_id='1'"));
				foreach($rooms as $room){
					?>
				<option value="<?php echo $room->id?>"
				<?php echo $_SESSION['request_room'] == $room->id ? 'selected="selected"' : ''?>>
					<?php echo $room->name?> -
					<?php echo $room->room_group->name?>
				</option>
				<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Equipment</td>
		<td class="column-right">
			<div id="equipment-area">Please select room.</div>
		</td>
	</tr>
	<tr>
		<td class="column-left">Course</td>
		<td class="column-right"><input id="course_name" type="text"
			name="RequestBooking[course_name]">
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><input type="submit" value="Submit"
			name="add_request" /> <input type="button" value="Reset"
			onclick="resetForm()" />
		</td>
	</tr>

</table>
<?php 
	}
}
?>
