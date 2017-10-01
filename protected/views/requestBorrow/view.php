<span class="module-head">Request Borrow Details</span>
<table class="simple-form">
	<tr>
		<td class="column-left"></td>
		<td class="column-right">
			<table>
				<tr>
					<td align="center" width="30%"><b>Equipment</b></td>
					<td align="center"><b>Unit</b></td>
				</tr>
				<?php 
				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id = '".$data->id."'"));
				if(count($requestBorrowEquipmentTypes) > 0) {
					foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType){
						echo '<tr><td>'.$requestBorrowEquipmentType->equipment_type->name.'</td><td align="center">'.$requestBorrowEquipmentType->quantity.'</td>';
					}
				} else {
					echo '<tr><td colspan="2">-</td></tr>';
				}

				?>
			</table>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="25%">From Date</td>
		<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->from_date, "dd MM yyyy")?>
		</td>
	</tr>
	<tr>
		<td class="column-left">To Date</td>
		<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy")?>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Location Type</td>
		<td class="column-right"><?php echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC <br>approve by '.$data->approve_by?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Executive / Chef Email</td>
		<td class="column-right"><?php echo $data->chef_email?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type of event</td>
		<td class="column-right"><?php echo $data->event_type->name?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Important Notes</td>
		<td class="column-right"><?php echo $data->description?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Status</td>
		<td class="column-right"><?php echo $data->status->name?></td>
	</tr>
	<?php 
	$optionMenu = '<a href="'.Yii::app()->createUrl("RequestBorrow/").'" class="button_link">Back</a> ';
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))) {
		$optionMenu = $optionMenu.'<a href="'.Yii::app()->createUrl("RequestBorrow/Update/id/".$data->id).'" class="button_link">Change Status</a> ';
	}
// 	if($data->status->status_code == 'REQUEST_BORROW_CREATED' && UserLoginUtil::getUserLoginId() == $data->user_login_id) {
// 		$optionMenu = '<a href="'.Yii::app()->createUrl("RequestBorrow/Confirm/id/".$data->id).'" class="button_link">Confirm</a> ';
// 	}
// 	if($data->status->status_code == 'REQUEST_BORROW_CONFIRMED' && UserLoginUtil::getUserLoginId() == $data->user_login_id) {
// 		$optionMenu = '<a href="'.Yii::app()->createUrl("RequestBorrow/Cancel/id/".$data->id).'" class="button_link">Cancel</a> ';
// 	}
// 	if($data->status->status_code == 'REQUEST_BORROW_CONFIRMED' && UserLoginUtil::hasPermission(array("FULL_ADMIN", "APPROVE_DENY_REQUEST_BORROW"))) {
// 		$optionMenu = $optionMenu.'<a href="'.Yii::app()->createUrl("RequestBorrow/Update/Status/Approve/id/".$data->id).'" class="button_link">Approve</a> ';
// 		$optionMenu = $optionMenu.'<a href="'.Yii::app()->createUrl("RequestBorrow/Update/Status/Deny/id/".$data->id).'" class="button_link">Deny</a> ';
// 	}
// 	if(($data->status->status_code == 'REQUEST_BORROW_APPROVED' || $data->status->status_code == 'REQUEST_BORROW_DENIED' || $data->status->status_code == 'REQUEST_BORROW_CANCELLED') && UserLoginUtil::hasPermission(array("FULL_ADMIN", "REVERT_STATUS_REQUEST_BORROW_TO_CONFIRMED"))) {
// 		$optionMenu = $optionMenu.'<a href="'.Yii::app()->createUrl("RequestBorrow/Update/Status/RevertConfirm/id/".$data->id).'" class="button_link">Revert Status to Confirmed</a> ';
// 	}
// 	if($data->status->status_code == 'REQUEST_BORROW_APPROVED' && UserLoginUtil::hasPermission(array("FULL_ADMIN", "MARK_REQUEST_BORROW_RETURNED"))) {
// 		$optionMenu = $optionMenu.'<br><a href="'.Yii::app()->createUrl("RequestBorrow/Update/Status/Return/id/".$data->id).'" class="button_link">Complete this request. (All equipment has been returned.)</a> ';
// 	}
	?>
	<?php if($optionMenu != '') {?>
	<tr>
		<td></td>
		<td><?php echo $optionMenu?></td>
	</tr>
	<?php }?>
</table>
