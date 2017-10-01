<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/prepare.css"
	media="screen, projection" />
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/borrow/prepare.js"></script>

<span class="module-head">Request Borrow Prepare Item</span>
<input type="hidden" id="base_url"
	value="<?php echo Yii::app()->getBaseUrl()?>">

<?php
$status = Status::model ()->findAll ( array (
		'condition' => "status_group_id ='REQUEST_BORROW_STATUS_NEW'" 
) );
?>

<input id=countAddedItem type="hidden" value="">

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
		<td class="column-left">Other Device & Notes</td>
		<td class="column-right"><?php echo $data->otherDevice?>
		</td>
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
							?>
						<input id=totalEquipItem type="hidden"
							value="<?php echo count($requestBorrowEquipmentTypes)?>">
					<?php
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
								
								?>
						<div
							class="eq-detail-p <?php echo count($requestBorrowEquipmentTypeItems) == $requestBorrowEquipmentType->quantity ? 'complete' : 'incomplete'?>"
							id="eq-detail-head-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>">
							<div class="item-detail-left">
								<?php echo CommonUtil::getEquipmentTypeName($requestBorrowEquipmentType->equipment_type_list->equipment_type_id) .' >> '.$requestBorrowEquipmentType->equipment_type_list->name?>
							</div>
							<div
								id="eq-qt-<?php echo $requestBorrowEquipmentType->equipment_type_list->id?>"
								class="item-detail-right"> 
								<?php echo (count($requestBorrowEquipmentTypeItems)>0)? count($requestBorrowEquipmentTypeItems) :  $requestBorrowEquipmentType->quantity?>
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
									<div class="left"><?php echo "Barcode number: ".$requestBorrowEquipmentTypeItem->equipment->barcode;?>
									

									</div>
									<input type="hidden"
										id="eq_item_req_<?php echo $requestBorrowEquipmentTypeItem->equipment->id?>"
										name="eq_item[<?php echo $requestBorrowEquipmentTypeItem->equipment->id?>]"
										value="<?php echo $requestBorrowEquipmentTypeItem->equipment->equipment_type_list_id?>">


									<div class="manage">
										<a class="removeBtn"
											href="javascript:remove('<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>', '<?php echo $requestBorrowEquipmentTypeItem->equipment->equipment_type_list_id?>')"></a>
										<input type="hidden"
											id="eq_item_req_<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>"
											name="eq_item[<?php echo $requestBorrowEquipmentTypeItem->equipment_id?>]"
											value="<?php echo $requestBorrowEquipmentTypeItem->equipment->equipment_type_list_id?>" />
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
				<div>
					<table>
						<tr>
							<td class="column-left">Status</td>
							<td class="column-right"><select id="search_status"
								name="search_status">
									<option value="">--Select--</option>
					<?php foreach($status as $status) {?>
					<option value="<?php echo $status->status_code?>"
										<?php echo $status->status_code == $data->status_code ? 'selected="selected"' : ''?>>
					<?php echo $status->name?>
				</option>
					<?php }?>
			</select></td>
						</tr>
					</table>
				</div>
				<div align="center">
					<input type="submit" name="save_request" id="save_request" value="Save" />
				</div>
			</form></td>
	</tr>
</table>
