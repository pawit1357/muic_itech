<div class="module-head">
	<span>Create</span> ED - Tech News
</div>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true,
			'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Name</td>
			<td class="column-right"><?php echo $form->textField(News::model(), 'name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Short Description</td>
			<td class="column-right"><?php echo $form->textArea(News::model(), 'short_description', array('size' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(News::model(), 'description', array('size' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Icon Picture</td>
			<td class="column-right"><input type="file" name="pic"/>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('News/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




