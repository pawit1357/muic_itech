<span class="module-head">View Request Service</span>
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
		<td class="column-left">Due Date</td>
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
		<td class="column-right"><?php echo $data->status->name?></td>
	</tr>
	<?php if($data->file_path != '') {?>
	<tr>
		<td class="column-left">File</td>
		<td class="column-right"><a href="<?php echo Yii::app()->request->baseUrl.'/'.$data->file_path?>">Download</a>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('RequestService/'));
		if(UserLoginUtil::hasPermission(array("FULL_ADMIN"))){
		 echo ' | '.CHtml::link('Change Status',array('RequestService/update','id'=>$data->id)); 
		 
}?>
		</td>
	</tr>
</table>
