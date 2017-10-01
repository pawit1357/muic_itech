<div class="module-head">
	<span>Manage Staff</span>
</div>
<div>
	<?php 
	$roomStaffs = RoomStaff::model()->findAll(array('condition'=>"room_id='".$model->id."'"));
	$rs = array();
	foreach($roomStaffs as $roomStaff){
		$rs[count($rs)] = $roomStaff->staff_id;
	}
	$staffs = UserLogin::model()->findAll(array('condition'=>"role_id='2'"));
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Room</td>
			<td class="column-right"><?php echo $model->room_code ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" valign="top">Staff</td>
			<td class="column-right"><?php 
			foreach($staffs as $staff){
				?>
						<div><input type="checkbox" name="staff[<?php echo $staff->id?>]" value="<?php echo $staff->id?>" <?php echo in_array($staff->id, $rs) ? 'checked="checked"' : ''?>> <?php echo $staff->username?>
				</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Role/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




