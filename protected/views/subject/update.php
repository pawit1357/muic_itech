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
			<td class="column-right"><?php echo $form->textField(Subject::model(), 'subj_code', array('size' => 20, 'maxlength' => 255, 'value'=>$model->subj_code)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Subject::model(), 'sbj_name', array('value'=>$model->sbj_name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Subject Owner</td>
			<td class="column-right"><select name="Subject[teacher_user_id]">
					<option value="">--Select--</option>
					<?php 
					$users = UserLogin::model()->findAll();
					foreach ($users as $user) {
					?>
					<option value="<?php echo $user->id?>"
					<?php echo $model->teacher_user_id == $user->id ? 'selected="selected"' : ''?>><?php echo $user->username?></option>
					<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /> <?php echo CHtml::link('Cancel',array('Subject/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




