<div class="module-head">
	<span>Create New Equipment Type</span>
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
			<td class="column-left" width="15%">Code</td>
			<td class="column-right"><?php echo $form->textField(EquipmentType::model(), 'equipment_type_code', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(EquipmentType::model(), 'name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
				<tr>
			<td class="column-left" valign="top">Description</td>
			<td class="column-right"><?php echo $form->textArea(EquipmentType::model(), 'description', array()); ?>
			</td>
		</tr>
				<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('EquipmentType/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




