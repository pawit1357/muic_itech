<div class="module-head">
	User - <span>Create New User</span>
</div>

<script type="text/javascript">
$(function(){	
	$('#post').submit(function(){
		return (validateForm() && confirm('Confirm ?'));
	});

	function validateForm(){

		var validPid = $('#UserInformation_personal_card_id').val();
		var validEmail = $('#UserLogin_email').val();
		var validUserName = $('#UserLogin_username').val();

		if( validUserName == "" ){
			alert('Please enter username.');
			$('#UserLogin_username').focus()
			return false;
		}
		
		if( validEmail == "" ){
			alert('Please enter email.');
			$('#UserLogin_email').focus()
			return false;
		}
		
		if( validPid == "" ){
			alert('Please enter personal_card_id.');
			$('#UserInformation_personal_card_id').focus()
			return false;
		}
	}
});
</script>

<div>
	<?php
	$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'users-form',
			'enableAjaxValidation' => true 
	) );
	?>
	<table class="simple-form">
		<tr class="seperate">
			<td colspan="2"><div>Login Information</div></td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Username</td>
			<td class="column-right"><?php echo $form->textField(UserLogin::model(), 'username', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Under</td>
			<td class="column-right"><select name="UserLogin[parent]">
					<option value="">--Select--</option>
					<?php
					$users = UserLogin::model ()->findAll ();
					foreach ( $users as $user ) {
						?>
					<option value="<?php echo $user->id?>"
						<?php echo $model->parent == $user->id ? 'selected="selected"' : ''?>><?php echo $user->username?></option>
					<?php }?>
			</select></td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Password</td>
			<td class="column-right"><?php echo $form->passwordField(UserLogin::model(), 'password', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Re - Password</td>
			<td class="column-right"><input type="password" name="re-password"
				maxlength="20" size="20"></td>
		</tr>
		<tr>
			<td class="column-left">Email</td>
			<td class="column-right"><?php echo $form->textField(UserLogin::model(), 'email', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Role</td>
			<td class="column-right"><select name="UserLogin[role_id]">
					<option value="">--Select--</option>
					<?php
					$roles = Role::model ()->findAll ( array (
							'condition' => 'status != :status',
							'params' => array (
									':status' => 'HIDDEN' 
							) 
					) );
					foreach ( $roles as $role ) {
						?>
					<option value="<?php echo $role->id?>"
						<?php echo $model->role_id == $role->id ? 'selected="selected"' : ''?>><?php echo $role->name?></option>
					<?php }?>
			</select></td>
		</tr>
		<tr>
			<td class="column-left" width="20%">Approver</td>
			<td class="column-right"><input type="checkbox"
				name="UserLogin[isApprover_1]" value="1"
				<?php echo $model->isApprover_1 == "1" ? 'checked' : ''?>> Approver
				1(Role 3)<br> <input type="checkbox" name="UserLogin[isApprover_2]"
				value="1" <?php echo $model->isApprover_1 == "1" ? 'checked' : ''?>>
				Approver 2(Role 4)<br></td>
		</tr>
		<tr>
			<td class="column-left" width="20%">For Approver</td>
			<td class="column-right"><input type="radio"
				name="UserLogin[ApproverType]" value="0"
				<?php echo $model->ApproverType == "0" ? 'checked' : ''?>> Student<br>
				<input type="radio" name="UserLogin[ApproverType]" value="1"
				<?php echo $model->ApproverType == "1" ? 'checked' : ''?>>
				Staff/Lecturer<br></td>
		</tr>
		<tr>
			<td class="column-left" width="20%">LDAP</td>
			<td class="column-right">
                <input type="radio" name="UserLogin[bypass_ldap]" value="0" <?php echo $model->bypass_ldap == "0" ? 'checked' : ''?>>ไม่ตรวจสอบ LDAP<br>
                <input type="radio" name="UserLogin[bypass_ldap]" value="1" <?php echo $model->bypass_ldap == "1" ? 'checked' : ''?>>ตรวจสอบ LDAP
            <br>
            </td>
		</tr>
		<tr class="seperate">
			<td colspan="2"><div>Personal Information</div></td>
		</tr>
		<tr>
			<td class="column-left">Personal Title</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'personal_title', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">First Name</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'first_name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Last Name</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'last_name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Gender</td>
			<td class="column-right"><select name="UserInformation[gender]">
					<option value="">--Select--</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
			</select></td>
		</tr>
		<tr class="seperate">
			<td colspan="2"><div>Contact Information</div></td>
		</tr>
		<tr>
			<td class="column-left">Address Line 1</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'address1', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Address Line 2</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'address2', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Sub-District</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'sub_district', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">District</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'district', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Province</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'province', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Postal Code</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'postal_code', array('size' => 20, 'maxlength' => 5)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Phone</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'phone', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Mobile</td>
			<td class="column-right"><?php echo $form->textField(UserInformation::model(), 'mobile', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" name="add_user"
				value="Submit" /> <?php echo CHtml::link('Cancel',array('User/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




