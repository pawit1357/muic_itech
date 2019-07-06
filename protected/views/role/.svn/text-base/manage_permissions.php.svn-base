<div class="module-head">
	<span>Manage Permission</span>
</div>
<div>
	<?php 
	$rolePermissions = RolePermission::model()->findAllByAttributes(array('role_id'=>$model->id));
	$rps = array();
	foreach($rolePermissions as $rolePermission){
		$rps[count($rps)] = $rolePermission->permission_code;
	}
	$permissionGroups = PermissionGroup::model()->findAll();
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Role</td>
			<td class="column-right"><?php echo $model->name ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" valign="top">Permissions</td>
			<td class="column-right"><?php 
			foreach($permissionGroups as $permissionGroup){
				?>
				<div class="checkbox-group">
					<div class="group-name">
						<?php echo $permissionGroup->name; ?>
					</div>
					<?php 
					$permissions = Permission::model()->findAllByAttributes(array('permission_group_id'=>$permissionGroup->id));
					foreach($permissions as $permission){
					?>
					<div>
						<input type="checkbox" name="permissions[<?php echo $permission->permission_code?>]" value="<?php echo $permission->permission_code?>" <?php echo in_array($permission->permission_code, $rps) ? 'checked="checked"' : ''?>> <?php echo $permission->name?>
					</div>
					<?php }?>
				</div> <?php }?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Role/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




