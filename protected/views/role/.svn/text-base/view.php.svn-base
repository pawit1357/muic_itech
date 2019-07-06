<div class="module-head">Equipment</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Role</td>
		<td class="column-right"><?php echo $data->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $data->description ?></td>
	</tr>
	<tr>
		<td class="column-left" valign="top">Permissions</td>
		<td class="column-right"><?php 
		$permissions = $data->role_permission;
		foreach($permissions as $permission) {
			echo $permission->permission->name.', ';
		}
		?>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('role/')).' | ';
		echo CHtml::link('Edit',array('role/update','id'=>$data->id)).' | ';
		echo CHtml::link('Permissions',array('role/permissions','id'=>$data->id));

		?>
		</td>
	</tr>
</table>

