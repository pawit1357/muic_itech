<div class="module-head">
	<span>Update Period Group</span>
</div>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Name</td>
			<td class="column-right"><?php echo $form->textField(PeriodGroup::model(), 'name', array('size' => 20, 'maxlength' => 255, 'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(PeriodGroup::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('PeriodGroup/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




