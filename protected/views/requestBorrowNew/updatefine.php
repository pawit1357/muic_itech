<div class="module-head">
	<span>Adjust</span>
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
			<td class="column-left" width="15%">Return Price:</td>
			<td class="column-right"><?php echo $form->textField(RequestBorrowEquipmentTypeItem::model(), 'return_price', array('size' => 20, 'maxlength' => 255, 'value'=>$model->return_price)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Broken Price:</td>
			<td class="column-right"><?php echo $form->textField(RequestBorrowEquipmentTypeItem::model(), 'broken_price', array('value'=>$model->broken_price)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('RequestBorrowNew/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




