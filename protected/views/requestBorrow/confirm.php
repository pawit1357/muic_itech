<span class="module-head">Confirm Borrow</span>
<form
	action="<?php echo Yii::app()->CreateUrl('RequestBorrow/Confirm/id/'.addslashes($_GET['id'])); ?>"
	method="post" onsubmit="return  confirm('Are you sure?')">
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
			<td class="column-left">From Date</td>
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
		<tr>
			<td class="column-left"><input type="submit" name="confirm"
				value="Confirm"></td>
			<td class="column-right"><input type="submit" name="confirm"
				value="Cancel">
			</td>
		</tr>
	</table>
</form>
