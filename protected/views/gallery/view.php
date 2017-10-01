<div class="module-head">Gallery</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Name</td>
		<td class="column-right"><?php echo $model->name ?></td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<?php if($model->file_path != '') {?>
	<tr>
		<td class="column-left" valign="top">Picture</td>
		<td class="column-right"><img src="<?php echo Yii::app()->request->baseUrl.'/'.$model->file_path?>" width="200" /></td>
	</tr>
	<?php }?>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('Gallery/')).' | '; echo
		CHtml::link('Edit',array('Gallery/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

