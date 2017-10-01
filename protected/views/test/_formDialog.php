<div class="form" id="jobDialogForm">
 
<div class="module-head">Gallery</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Code</td>
		<td class="column-right"><?php echo $model->room_code ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Name</td>
		<td class="column-right"><?php echo $model->name ?></td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('room/')).' | '; echo
		CHtml::link('Edit',array('room/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>
 
</div>