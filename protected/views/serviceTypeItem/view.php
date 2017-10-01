<div class="module-head">Service Type Item</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Service Type</td>
		<td class="column-right"><?php echo $model->request_service_type->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="15%">Name</td>
		<td class="column-right"><?php echo $model->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('ServiceTypeItem/')).' | '; echo
		CHtml::link('Edit',array('ServiceTypeItem/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

