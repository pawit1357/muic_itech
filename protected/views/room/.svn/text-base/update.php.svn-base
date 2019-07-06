<div class="module-head">
	<span>Update Room</span>
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
			<td class="column-right"><?php echo $form->textField(Room::model(), 'room_code', array('size' => 20, 'maxlength' => 255,'value'=>$model->room_code)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Room Type</td>
			<td class="column-right">
				<?php 
				$roomGroups = RoomGroup::model()->findAll();
				?>
				<select name="Room[room_group_id]">
					<option value="">-Select-</option>
					<?php foreach($roomGroups as $roomGroup) {?>
						<option value="<?php echo $roomGroup->id?>" <?php echo $roomGroup->id == $model->room_group_id ? 'selected="selected"' : ''?>><?php echo $roomGroup->name?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(Room::model(), 'name', array('size' => 20, 'maxlength' => 255,'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Room::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /> <?php echo CHtml::link('Cancel',array('Room/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




