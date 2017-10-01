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
		$roomTypes = RoomType::model()->findAll();
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
		<td class="column-left"></td>
		<td class="column-right">
			<table>
				<tr>
					<td></td>
					<td align="center" width="30%"><b>Equipment</b></td>
					<td align="center"><b>Unit</b></td>
				</tr>
				<?php 
				$equipmentTypes = EquipmentType::model()->findAll(array('condition'=>"id in(1,2,3,4,5,6,7,8,9,10,11,12,13) "));
				foreach ($equipmentTypes as $equipmentType){

					echo '<tr><td>dfadfa<input type="checkbox" id="CEquipmentType'.$equipmentType->id.'" name="equipments[]" value="'.$equipmentType->id.'" '.($_GET['id'] == $equipmentType->id ? 'checked="checked"' : '').'></td><td>'.$equipmentType->name.'</td><td><input type="text" onchange="qtyChange(this)" id="EquipmentType'.$equipmentType->id.'" name="EquipmentType['.$equipmentType->id.']" '.($_GET['id'] == $equipmentType->id ? 'value="1"' : '').' /></td></tr>';
 		}?>
			</table>
		</td>
	</tr>
	<tr>
		<td class="column-left">Room</td>
		<td class="column-right"><select  id="room_id" name="RequestBooking[room_id]">
				<option value="">--Select--</option>
				<?php
				foreach($rooms as $room){
			?>
				<option value="<?php echo $room->id?>"
				<?php echo $_SESSION['request_room'] == $room->id ? 'selected="selected"' : ''?>>
					<?php echo $room->room_code?>
					-
					<?php echo $room->name?>
				</option>
				<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of event</td>
		<td class="column-right"><select
			name="RequestBookingActivityDetail[event_type_id]">
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
			name="RequestBookingActivityDetail[room_type_id]">
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
		<td class="column-right"><input type="file"
			name="file_path">
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
		<td class="column-right"><select id="room_id" name="RequestBooking[room_id]"
			onchange="ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentInRoom/room")?>/' + this.value, 'equipment-area')">
				<option value="">--Room--</option>
				<?php 				
				foreach($rooms as $room){
					?>
				<option value="<?php echo $room->id?>"
				<?php echo $_SESSION['request_room'] == $room->id ? 'selected="selected"' : ''?>>
					<?php echo $room->room_code?>
					-
					<?php echo $room->name?>
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
		<td class="column-right"><input type="text"
			name="RequestBooking[course_name]">
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><input type="submit" value="Submit"
			name="add_request" />
			
			</td>
	</tr>

</table>
<?php 
	}
}
?>
