<span class="module-head">View Borrow</span>
<?php 
$form = $this->beginWidget('CActiveForm', array(
		'id' => 'users-form',
		'enableAjaxValidation' => true
));
?>
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
		<td class="column-right"><select name="status_code">
				<?php 
				$statuses = Status::model()->findAll(array('condition'=>"status_group_id='REQUEST_BORROW_STATUS' AND active='Y'"));
				foreach($statuses as $status){
			echo '<option value="'.$status->status_code.'" '.($data->status->status_code == $status->status_code ? 'selected="selected"' : '').'>'.$status->name.'</option>';

		}
		if($data->status->status_code == 'REQUEST_BORROW_APPROVE_1') {
			echo '<option value="REQUEST_BORROW_APPROVE_1" selected="selected">Approve 1</option>';
		}
		
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><input type="submit" name="change_status"
			value="Submit"><?php echo CHtml::link('Cancel',array('RequestBooking/'), array('class' => 'button_cancel'))?>
		</td>
	</tr>
</table>
<?php $this->endWidget(); ?>
