<div class="module-head">
	<span>Create New Semester</span>
</div>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
$(function() {
	loadDatePicker('start_date');
	loadDatePicker('end_date');
  });

</script>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Number</td>
			<td class="column-right"><?php echo $form->textField(Semester::model(), 'semester_number', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Academic Year</td>
			<td class="column-right"><?php echo $form->textField(Semester::model(), 'academic_year', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Start Date</td>
			<td class="column-right"><input type="text"
				name="Semester[start_date]" id="start_date">
			</td>
		</tr>
		<tr>
			<td class="column-left">End Date</td>
			<td class="column-right"><input type="text"
				name="Semester[end_date]" id="end_date">
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(Semester::model(), 'name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Semester::model(), 'description', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Semester/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




