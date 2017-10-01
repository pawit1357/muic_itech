<div class="module-head">Reset Password</div>
<div>
	<?php 
	if(isset($_SESSION['OPERATION_RESULT'])) {
		$result = $_SESSION['OPERATION_RESULT'];
		echo '<div class="'.$result['class'].'">'.$result['message'].'</div>';
		unset($_SESSION['OPERATION_RESULT']);
	}
	?>
	<?php if($status == '') {?>
	<div style="margin-top: 10px;">
		<div>Well come <b><?php echo $userLogin->user_information->first_name?></b> to reset password system.</div>
		<div>Please input your new password below.</div>
	</div>
	<div style="margin-top: 10px;">
		<form method="post">
			<table>
				<tr>
					<td><b>Your New Password </b></td>
					<td><input type="password" name="password"></td>					
				</tr>
				<tr>
					<td><b>Re - Password </b></td>
					<td><input type="password" name="re-password"></td>					
				</tr>
				<tr>
					<td></td>
					<td><input
				type="submit" value="Submit" name="submit"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php } else {?>
	<div style="margin-top: 10px;">
		<div>Please remember your password and keep it into the secret.</div>
	</div>
	<?php }?>
</div>

