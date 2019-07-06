<div class="module-head">
	<span>Manage Rooms</span>
</div>
<div>
	<?php 
	$rooms = Room::model()->findAll();
	

	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	echo '<div><span style="font-size:16px"><b>Staff :</b></span> '.$data->user_information->first_name.' '.$data->user_information->last_name.' ('.$data->username.')</div>';
	$roomStaffs = RoomStaff::model()->findAll(array('condition'=>"staff_id='".$data->id."'"));
	$roomIds = array();
	foreach($roomStaffs as $roomStaff){
		$roomIds[count($roomIds)] = $roomStaff->room_id;
	}
	foreach($rooms as $room) {
		echo '<div style="float:left; width: 200px;"><input type="checkbox" name="rooms[]" value="'.$room->id.'" '.(in_array($room->id, $roomIds) ? 'checked="checked"' : '').'>'.$room->name.'</div>';
	}
	?>
	<div class="clear"></div><br>
	<input type="submit" name="submit" value="Save"> 
	<?php $this->endWidget(); ?>
</div>




