<script type="text/javascript">

$(document).ready(function() {
	var which;

	$("input").click(function () {
	    which = $(this).attr("id");
	});
	
	$('#frm1').submit(function(){

		if (which == "submit_disapprove") {
			return (validateForm());
		}else{
			return true;
		}
		    
		
	});

	function validateForm(){


		 
		
		var remark = $('#disapprove-reason').val();
		if( remark == "" ){
			alert("Please enter dis approve reson.");
			$('#disapprove-reason').focus();
			return false;
		}

	}
}
);
</script>
<span class="module-head">Request Borrow Details [Approve]</span>
<form action="" method="post" id="frm1" name="frm1">
	<table class="simple-form">
	<tr>
		<td class="column-left" width="150">Borrower</td>
		<td class="column-right"><?php echo $data->user_login->username.' ('.$data->user_login->user_information->first_name.')'?>
		</td>
	</tr>
		<tr>
			<td class="column-left" width="150">Receive Date</td>
			<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->from_date, "dd MM yyyy")?>
		</td>
		</tr>
		<tr>
			<td class="column-left">Return Date</td>
			<td class="column-right">
			<?php 
			if(UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV))) {
			echo date('d M Y',strtotime($data->thru_date));// 
							}else{
				echo date('d M Y',strtotime('0 day', strtotime($data->thru_date)));
			}
			?>
			<?//php echo DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy")?>
		</td>
		</tr>
		<tr>
			<td class="column-left" valign="top">Location Type</td>
			<td class="column-right"><?php echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC <br>approve by '.$data->approve_by?>
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
		<tr>
			<td class="column-left"><font color="red">*Disapprove Reason</font></td>
			<td class="column-right"><textarea id="disapprove-reason"
					name="disapprove-reason"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend>Equipment List</legend>
					<div id="equipmentList">
					<?php
					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
							'condition' => "request_borrow_id = '" . $data->id . "'" 
					) );
					if (count ( $requestBorrowEquipmentTypes ) > 0) {
						foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {
							?>
					<div class="eq-detail">
							<div class="item-detail-left">
							<?php echo CommonUtil::getEquipmentTypeName($requestBorrowEquipmentType->equipment_type_list->equipment_type_id) .' >> '.$requestBorrowEquipmentType->equipment_type_list->name?>
						</div>

							<div id="qt-'+ eq+ '" class="item-detail-right">
							<?php echo $requestBorrowEquipmentType->quantity?>
						</div>
							<div class="clear"></div>
							<div
								id="eq-detail-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>">
								<?php
							$criteria = new CDbCriteria ();
							$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
							$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
							if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
								foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
									?>
								<div class="eq-item"
									id="eq-item-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>">
									<div class="left"><?php echo $requestBorrowEquipmentTypeItem->equipment->barcode?></div>
									<input type="hidden"
										id="eq_item_req_<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>"
										name="eq_item[<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>]"
										value="<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>">
									<div class="clear"></div>
								</div>
								<?php
								}
							}
							?>
							</div>
						</div>

					<?php
						}
					} else {
						echo '<i>- no item found -</i>';
					}
					
					?>
				</div>
					<div class="eq-detail-p" id="eq-other-device">
						<div class="item-detail-left">Other Device</div>
						<div id="eq-qt-other-device" class="item-detail-right"></div>
						<div class="clear" />
						<div id="eq-detail-other-device">
							<div class="eq-item" id="eq-item-other-device">
								<textarea id="other-device" name="other-device"
									style="width: 100%"><?php echo $data->otherDevice?></textarea>
							</div>
						</div>
					</div>
				</fieldset>
			</td>
		</tr>
	<?php
	$optionMenu = '<a href="' . Yii::app ()->createUrl ( "RequestBorrowNew/" ) . '" class="button_link">Back</a> ';
	if (UserLoginUtil::hasPermission ( array (
			"FULL_ADMIN",
			"UPDATE_REQUEST_BORROW" 
	) )) {
		// $optionMenu = $optionMenu.'<a href="'.Yii::app()->createUrl("RequestBorrow/Update/id/".$data->id).'" class="button_link">Change Status</a> ';
	}
	?>
	<?php if($optionMenu != '') {?>
	<tr>
			<td align="right"></td>
			<td><input type="submit" name="submit" id="submit_approve"
				value="Approve"> <input type="submit" name="submit"
				id="submit_disapprove" value="Disapprove">
					<?php echo $optionMenu?>
		</td>
		</tr>
	<?php }?>
</table>
</form>
