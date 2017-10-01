<div class="module-head">
	<span>Update SocialMedia</span>
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
			<td class="column-right"><?php echo $form->textField(SocialMedia::model(), 'name', array('size' => 20, 'maxlength' => 255, 'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(SocialMedia::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Url</td>
			<td class="column-right"><?php echo $form->textField(SocialMedia::model(), 'url', array('size' => 50, 'maxlength' => 255, 'value'=>$model->url)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('SocialMedia/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




