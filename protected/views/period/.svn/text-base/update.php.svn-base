<div class="module-head">
	<span>Update Period</span>
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
			<td class="column-left" width="15%">Period Group</td>
			<td class="column-right">
				<?php 
				$periodGroups = PeriodGroup::model()->findAll();
				?>
				<select name="Period[period_group_id]">
					<option value="">-Select-</option>
					<?php foreach($periodGroups as $periodGroup) {?>
						<option value="<?php echo $periodGroup->id?>" <?php echo $periodGroup->id == $model->period_group_id ? 'selected="selected"' : ''?>><?php echo $periodGroup->name?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(Period::model(), 'name', array('size' => 20, 'maxlength' => 255,'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Period::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /> <?php echo CHtml::link('Cancel',array('Period/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




