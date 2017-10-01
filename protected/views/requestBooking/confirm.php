<span class="module-head">Confirm Booking</span>
<form action="<?php echo Yii::app()->CreateUrl('RequestBooking/Confirm/id/'.addslashes($_GET['id'])); ?>" method="post" onsubmit="return  confirm('Are you sure?')">
<table class="simple-form">
	<tr>
		<td class="column-left" width="20%">Request Type</td>
		<td class="column-right"><?php echo $data->request_booking_type->name?>
		</td>
	</tr>
	<?php if($data->request_date != "0000-00-00" && $data->request_date != ''){?>
	<tr>
		<td class="column-left">Request Date</td>
		<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->request_date, "dd MM yyyy")?>
		</td>
	</tr>
	<?php }?>
	<?php if(isset($data->semester)){?>
	<tr>
		<td class="column-left">Semester</td>
		<td class="column-right"><?php echo $data->semester->name?>
		</td>
	</tr>
	<?php }?>
	<?php 
	if(isset($data->semester)){
	if(isset($data->request_day_in_week)){?>
	<tr>
		<td class="column-left">Request Day</td>
		<td class="column-right"><?php echo $data->day_in_week->name?>
		</td>
	</tr>
	<?php } else {
		?>
		<tr>
		<td class="column-left">Request Day</td>
		<td class="column-right">-
		</td>
	</tr>
		<?php 
	}
	}
	?>
	<tr>
		<td class="column-left">Time Period</td>
		<td class="column-right"><?php echo DateTimeUtil::getTimeFormat($data->period_s->start_hour, $data->period_s->start_min)." - ".
				DateTimeUtil::getTimeFormat($data->period_e->end_hour, $data->period_e->end_min)?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Requested By</td>
		<td class="column-right"><?php echo $data->user_login->username?></td>
	</tr>
	<tr>
		<td class="column-left">Room Code</td>
		<td class="column-right"><?php echo $data->room->room_code?></td>
	</tr>
	<?php 
	if($data->request_booking_type_id == '3') {
		$requestBookingActivityDetail = RequestBookingActivityDetail::model()->findByPk($data->id);
		$requestBookingActivityPresentTypes = RequestBookingActivityPresentType::model()->findAll("request_booking_activity_id = '".$data->id."'");
		?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right">
			<table>
				<tr>
					<td align="center" width="30%"><b>Equipment</b></td>
					<td align="center"><b>Unit</b></td>
				</tr>
				<?php 
				$requestBookingEquipmentTypes = RequestBookingEquipmentType::model()->findAll(array('condition'=>"request_booking_id = '".$data->id."'"));
				if(count($requestBookingEquipmentTypes) > 0) {
					foreach($requestBookingEquipmentTypes as $requestBookingEquipmentType){
						echo '<tr><td>'.$requestBookingEquipmentType->equipment_type->name.'</td><td align="center">'.$requestBookingEquipmentType->quantity.'</td>';
					}
				} else {
					echo '<tr><td colspan="2">-</td></tr>';
				}

				?>
			</table>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of event</td>
		<td class="column-right"><?php echo $requestBookingActivityDetail->event_type->name?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of room / area</td>
		<td class="column-right"><?php echo $requestBookingActivityDetail->room_type->name?>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Type of present</td>
		<td class="column-right"><?php 
		foreach ($requestBookingActivityPresentTypes as $requestBookingActivityPresentType){
			echo '<div>'.$requestBookingActivityPresentType->present_type->name.'</div>';
		}
		?>
		</td>
	</tr>
	<?php if($requestBookingActivityDetail->file_path != '') {?>
	<tr>
		<td class="column-left">File</td>
		<td class="column-right"><a href="<?php echo Yii::app()->request->baseUrl.'/'.$requestBookingActivityDetail->file_path?>">Download</a>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left">Important Notes</td>
		<td class="column-right"><?php echo $requestBookingActivityDetail->description?>
		</td>
	</tr>
	<?php } else {?>
	<tr>
		<td class="column-left" valign="top">Equipments</td>
		<td class="column-right"><?php 
		$requestBookingEquipmentTypes = RequestBookingEquipmentType::model()->findAll(array('condition'=>"request_booking_id = '".$data->id."'"));
		if(count($requestBookingEquipmentTypes) > 0) {
			foreach($requestBookingEquipmentTypes as $requestBookingEquipmentType){
				echo '<div>'.$requestBookingEquipmentType->equipment_type->name.'</div>';
			}
		} else {
			echo '-';
		}
		?>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"><input type="submit" name="confirm"
			value="Confirm"></td>
		<td class="column-right"> <input type="submit" name="confirm" value="Cancel">

		</td>
	</tr>
</table>
</form>
