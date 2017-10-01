<div class="module-head">
	Gallery - <span>Update</span>
</div>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true,
			'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Name</td>
			<td class="column-right"><?php echo $form->textField(Gallery::model(), 'name', array('size' => 20, 'maxlength' => 255, 'value' => $model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Gallery::model(), 'description', array('size' => 20, 'maxlength' => 255, 'value' => $model->description)); ?>
			</td>
		</tr>
		<?php if($model->file_path != '') {?>
		<tr>
			<td class="column-left" valign="top"></td>
			<td class="column-right"><img src="<?php echo Yii::app()->request->baseUrl.'/'.$model->file_path?>" width="200" /></td>
		</tr>
		<?php }?>
		<tr>
			<td class="column-left">Picture</td>
			<td class="column-right"><input type="file" name="file_path" /></td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Gallery/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




