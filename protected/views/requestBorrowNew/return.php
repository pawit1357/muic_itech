﻿<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/prepare.css"
	media="screen, projection" />
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/borrow/return.js"></script>
<span class="module-head">Request Borrow Return Item</span>
<input
	type="hidden" id="base_url"
	value="<?php echo Yii::app()->getBaseUrl()?>">
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
		<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy")?>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Location Type</td>
		<td class="column-right"><?php 
		switch ($data->status_code)
		{
			case 'R_B_NEW_WAIT_APPROVE_1' :
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver1)->user_information->first_name;
				break;
			case 'R_B_NEW_WAIT_APPROVE_2' :
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC <br>approve by '.UserLoginUtil::getUserById($data->approver2)->user_information->first_name;
				break;
			default:
				echo $data->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC';
				break;
		}
		?>
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
		<td class="column-left">Other Device & Notes</td>
		<td class="column-right"><?php echo $data->otherDevice?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Status</td>
		<td class="column-right"><?php echo $data->status->name?></td>
	</tr>

	<tr>
		<td colspan="2"><br>
			<div class="barcode-area">
				<div id="barcode-status-area" class="barcode-status ready">
					<b>Barcode Status</b>
					<div class="text" id="barcode-status-text">Ready</div>
				</div>
				<div class="barcode-panel">
					<div class="barcode-input">
						<input id="barcode" type="text">
					</div>
					<div id="last-scan-result" class=""></div>
				</div>
				<div class="clear"></div>
			</div> <br>
			<form action="" method="post">
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
						<input type="hidden"
							name="eqids[<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>]"
							value="<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>">
						<input type="hidden"
							id="eqs-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>"
							value="<?php echo $requestBorrowEquipmentType->quantity?>">

						<?php

						$criteria = new CDbCriteria ();
						$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
						$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
						$isReturnAll = true;
						foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
							if ($requestBorrowEquipmentTypeItem->return_date == '') {
								$isReturnAll = false;
							}
						}
						?>
						<div
							class="eq-detail-p <?php echo $isReturnAll ? 'complete' : 'incomplete'?>"
							id="eq-detail-head-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>">
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

								if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
									foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
										?>
								<div class="eq-item"
									id="eq-item-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>">
									<div class="left"
										id="eq-item-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>-left">
										<?php echo 'Barcode number: '.$requestBorrowEquipmentTypeItem->equipment->barcode?>
										<?php if($requestBorrowEquipmentTypeItem->broken_price != 0) {?>
										<div
											id="eq-item-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>-fine">
											Broken Price :
											<?php echo number_format($requestBorrowEquipmentTypeItem->broken_price, 2, '.', '')?>
										</div>
										<input
											id="eq-val-broken-<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>"
											type="hidden"
											name="brokenPrice[<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>]"
											value="<?php echo $requestBorrowEquipmentTypeItem->broken_price?>">
										<?php }?>
									</div>
									<div class="manage">
										<input type="checkbox"
											onchange="returnCheckChange(<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>)"
											id="eq_item_req_<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>"
											name="eq_items[<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>]"
											value="<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>"
											<?php echo $requestBorrowEquipmentTypeItem->return_date != '' ? ' checked="checked"' : ''?>>

									</div>
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
				<br>
				<div align="center">
					<input type="submit" name="save_request" value="Save" />
				</div>
			</td>
	</tr>
</table>
</form>
<div id="dialog-form" title="Broken Price" align="center">
	<div>
		กรอก<b>ค่าปรับกรณีอุปกรณ์ชำรุดเสียหาย</b>
	</div>
	<div>กรณีอุปกรณ์ไม่ชำรุด ให้กรอก 0</div>
	<br>

	<table class="simple-form">
		<tr>
			<td class="column-left" width="60px">Remark :</td>
			<td class="column-right"><textarea rows="4" cols="50"
					style="width: 100% !important;" id="broken-remark">
				</textarea></td>
		</tr>
		<tr>
			<td class="column-left" width="60px">Price :</td>
			<td class="column-right"><input type="text" id="broken-price"
				value="0"
				style="text-align: center; padding: 5px 10px 5px 10px; height: 25px; font-size: 24px" />
			</td>
		</tr>
	</table>
	<div align="center">
		<input type="submit" id="broken-save" value="Save" />
	</div>
</div>
