<div class="module-head">ED - Tech News</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Name</td>
		<td class="column-right"><?php echo $model->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Short Description</td>
		<td class="column-right"><?php echo $model->short_description ?></td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<?php if($model->pic != '') {?>
	<tr>
		<td class="column-left">Picture</td>
		<td class="column-right"><img
			src="<?php echo Yii::app()->request->baseUrl.'/'.$model->pic ?>"
			width="90" /></td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('News/'), array('class' => 'button_cancel')).' | '; echo
		CHtml::link('Edit',array('News/update','id'=>$model->id), array('class' => 'button_cancel')); ?>
		</td>
	</tr>
</table>

