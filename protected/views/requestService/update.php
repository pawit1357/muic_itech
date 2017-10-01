<span class="module-head">Change Request Service Status</span>
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
					<td align="center" width="30%"><b>Type</b></td>
					<td align="center"><b>Detail</b></td>
				</tr>
				<?php 
				$requestServiceDetails = RequestServiceDetail::model()->findAll(array('condition'=>"request_service_id = '".$data->id."'"));
				if(count($requestServiceDetails) > 0) {
					foreach($requestServiceDetails as $requestServiceDetail){
						echo '<tr><td>'.$requestServiceDetail->request_service_type_detail->request_service_type->name.'</td><td align="center">'.$requestServiceDetail->request_service_type_detail->name.'</td>';
					}
				} else {
					echo '<tr><td colspan="2">-</td></tr>';
				}

				?>
			</table>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="30%">Due Date</td>
		<td class="column-right"><?php echo DateTimeUtil::getDateFormat($data->due_date, "dd MM yyyy")?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Time</td>
		<td class="column-right"><?php echo $data->time->name?>
		</td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Unit</td>
		<td class="column-right"><?php echo $data->quantity?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Important Note</td>
		<td class="column-right"><?php echo $data->description?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Status</td>
		<td class="column-right"><select name="status_code">
				<?php 
				$statuses = Status::model()->findAll(array('condition'=>"status_group_id='REQUEST_ISERVICE_STATUS'"));
				foreach($statuses as $status){
			echo '<option value="'.$status->status_code.'" '.($data->status->status_code == $status->status_code ? 'selected="selected"' : '').'>'.$status->name.'</option>';

		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><input type="submit" name="change_status"
			value="Submit">
			
			<?php echo CHtml::link('Cancel',array('RequestService/'), array('class' => 'button_cancel'))?>
		</td>
	</tr>
</table>
<?php $this->endWidget(); ?>
