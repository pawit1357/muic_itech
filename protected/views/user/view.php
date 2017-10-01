<div class="module-head">User</div>
<table class="simple-form">
	<tr class="seperate">
		<td colspan="2"><div>Login Information</div></td>
	</tr>
	<tr>
		<td class="column-left" width="20%">Username</td>
		<td class="column-right"><?php echo $model->username ?>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="20%">Password</td>
		<td class="column-right">******</td>
	</tr>
	<tr>
		<td class="column-left">Email</td>
		<td class="column-right"><?php echo $model->email ?>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="20%">Role</td>
		<td class="column-right"><?php echo $model->role->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left" width="20%">Status</td>
		<td class="column-right"><?php echo $model->user_status->name ?>
		</td>
	</tr>
	<tr class="seperate">
		<td colspan="2"><div>Personal Information</div></td>
	</tr>
	<tr>
		<td class="column-left">Personal Title</td>
		<td class="column-right"><?php echo $model->user_information->personal_title ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">First Name</td>
		<td class="column-right"><?php echo $model->user_information->first_name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Last Name</td>
		<td class="column-right"><?php echo $model->user_information->last_name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Gender</td>
		<td class="column-right"><?php echo UserInfoUtil::getGenderName($model->user_information->gender) ?>
		</td>
	</tr>
	<tr class="seperate">
		<td colspan="2"><div>Contact Information</div></td>
	</tr>
	<tr>
		<td class="column-left">Address Line 1</td>
		<td class="column-right"><?php echo $model->user_information->address1 ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Address Line 2</td>
		<td class="column-right"><?php echo $model->user_information->address2 ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Sub-District</td>
		<td class="column-right"><?php echo $model->user_information->sub_district ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">District</td>
		<td class="column-right"><?php echo $model->user_information->district ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Province</td>
		<td class="column-right"><?php echo $model->user_information->province ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Phone</td>
		<td class="column-right"><?php echo $model->user_information->phone ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Mobile</td>
		<td class="column-right"><?php echo $model->user_information->mobile ?>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('user/')).' | '; echo
		CHtml::link('Edit',array('user/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>


