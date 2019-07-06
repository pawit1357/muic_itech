<div class="module-head">
	<span>Create New Position</span>
</div>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Code</td>
			<td class="column-right"><?php echo $form->textField(Position::model(), 'position_code', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(Position::model(), 'name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Position::model(), 'description', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Position/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




