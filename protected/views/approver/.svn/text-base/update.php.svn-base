<div class="module-head">
	<span>Update Approver</span>
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
			<td class="column-left">Email</td>
			<td class="column-right"><?php echo $form->textField(EmailForApprove::model(), 'email', array('size' => 20, 'maxlength' => 255,'value'=>$model->email)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /> <?php echo CHtml::link('Cancel',array('Approver/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




