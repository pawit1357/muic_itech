<span class="module-head">Request Borrow Details</span>
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
		<td class="column-right"><?php 
// 		if(UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV))) {
// 			echo date('d M Y',strtotime($data->thru_date));//
// 		}else{
			echo date('d M Y',strtotime('0 day', strtotime($data->thru_date)));
// 		}
		?>
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
		<td class="column-left">Purpose of borrow</td>
		<td class="column-right"><?php echo $data->description?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Phone Number</td>
		<td class="column-right"><?php echo $data->mobile_phone?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Status</td>


		<td class="column-right"><?php 
		switch ($data->status_code)
		{
			case 'R_B_NEW_WAIT_APPROVE_1' :
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver1)->user_information->first_name  : 'Without MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver1)->user_information->first_name;
				break;
			case 'R_B_NEW_WAIT_APPROVE_2' :
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver2)->user_information->first_name : 'Without MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver2)->user_information->first_name;
				break;
			default:
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC';
				break;
		}
		?>
		</td>
	</tr>
	<?php if($data->remark !=''){?>
	<tr>
		<td class="column-left"><font color="red">*Disapprove Reason</font></td>
		<td class="column-right"><textarea id="disapprove-reason"
				name="disapprove-reason"><?php echo $data->remark?></textarea></td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Equipment List</legend>
				<div id="equipmentList">
					<?php
					$returnPriceList = array ();
					$brokenList = array ();
					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
							'condition' => "request_borrow_id = '" . $data->id . "'"
					) );
					if (count ( $requestBorrowEquipmentTypes ) > 0) {
						foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

							$criteria = new CDbCriteria ();
							$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
							$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
							?>
					<div class="eq-detail">
						<div class="item-detail-left">
							<?php echo CommonUtil::getEquipmentTypeName($requestBorrowEquipmentType->equipment_type_list->equipment_type_id) .' >> '.$requestBorrowEquipmentType->equipment_type_list->name?>
						</div>
						<!-- 						<div id="qt-'+ eq+ '" class="item-detail-right"> -->
						<?php echo (count($requestBorrowEquipmentTypeItems)>0)? count($requestBorrowEquipmentTypeItems): $requestBorrowEquipmentType->quantity;?>
						<!-- 						</div> -->
						<div class="clear"></div>
						<div
							id="eq-detail-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>">
							<?php

							if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
								foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
									if ($requestBorrowEquipmentTypeItem->return_price > 0) {
										$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
									}
									if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
										$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
									}
									?>
							<div class="eq-item"
								id="eq-item-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>">
								<div class="left">
									<?php echo 'Barcode number: '. $requestBorrowEquipmentTypeItem->equipment->barcode?>
									<?php echo $requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : ''?>
								</div>
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
	<?php if(count($returnPriceList) > 0) {?>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Return Late List</legend>
				<div class="simple-grid">
					<table class="items">
						<tr>
							<th width="60%">Equipment</th>
							<th>Price</th>
						</tr>
						<?php
						$counter = 1;
						$sum = 0;
						foreach ( $returnPriceList as $returnPrice ) {
							$sum = $sum + $returnPrice->return_price;
							?>
						<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
							<td align="left"><?php echo $returnPrice->equipment->barcode?>
							</td>
							<td align="right"><?php echo '';//number_format($returnPrice->return_price)?>
							</td>
						</tr>
						<?php }?>
						<tr>
							<td align="right">Total</td>
							<td align="right"><?php echo '500'; //number_format($sum)?>
							</td>
						</tr>
					</table>
				</div>
			</fieldset>
		</td>
	</tr>
	<?php }?>
	<?php if(count($brokenList) > 0) {?>
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>Broken List</legend>
				<div class="simple-grid">
					<table class="items">
						<tr>
							<th width="60%">Equipment</th>
							<th>Price</th>
						</tr>
						<?php
						$counter = 1;
						$sum = 0;
						foreach ( $brokenList as $broken ) {
							$sum = $sum + $broken->broken_price;
							?>
						<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
							<td align="left"><?php echo $broken->equipment->barcode?>
							</td>
							<td align="right"><?php echo number_format($broken->broken_price)?>
							</td>
						</tr>
						<?php }?>
						<tr>
							<td align="right">Total</td>
							<td align="right"><?php echo number_format($sum)?>
							</td>
						</tr>
					</table>
				</div>
			</fieldset>
		</td>
	</tr>
	<?php }?>
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
		<td></td>
		<td><?php echo $optionMenu;?> <?php if( $data->status_code !='R_B_NEW_WAIT_APPROVE_1' && $data->status_code !='R_B_NEW_WAIT_APPROVE_2' && $data->status_code !='R_B_NEW_DISAPPROVE' ){ ?>
			<a
			href="<?php echo Yii::app()->createUrl("RequestBorrowNew/Print/id/".$data->id)?>"
			class="button_link">Print </a> <?php }?>
		</td>
	</tr>
	<?php }?>
</table>
