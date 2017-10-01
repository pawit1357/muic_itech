<div class="module-head">Change Password</div>
<div>
	<?php 
	if(isset($_SESSION['OPERATION_RESULT'])) {
		$result = $_SESSION['OPERATION_RESULT'];
		echo '<div class="'.$result['class'].'">'.$result['message'].'</div>';
		unset($_SESSION['OPERATION_RESULT']);
	}
	?>

	<div style="margin-top: 10px;">
		<form method="post">
			<table>
				<tr>
					<td colspan="2"><div style="margin-top: 10px;">
							<div>Please enter your new password twice.</div>
						</div></td>
				</tr>
				<tr>
					<td align="right"><b>New Password : </b></td>
					<td><input type="password" name="new-password"></td>
				</tr>
				<tr>
					<td align="right"><b>Confirm New Password : </b></td>
					<td><input type="password" name="re-new-password"></td>
				</tr>
				<tr>
					<td colspan="2"><div style="margin-top: 10px;">
							<div>Please enter your current password.</div>
						</div></td>
				</tr>
				<tr>
					<td align="right"><b>Password : </b></td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td align="right"></td>
					<td><input type="submit" name="submit" value="Submit" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>

