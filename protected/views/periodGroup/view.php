<div class="module-head">Period Group</div>
<table class="simple-form">
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
		echo CHtml::link('Back',array('PeriodGroup/')).' | '; echo
		CHtml::link('Edit',array('PeriodGroup/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

