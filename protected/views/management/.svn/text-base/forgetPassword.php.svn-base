<div class="module-head">Forget Password</div>
<div>
	<?php 
	if(isset($_SESSION['OPERATION_RESULT'])) {
		$result = $_SESSION['OPERATION_RESULT'];
		echo '<div class="'.$result['class'].'">'.$result['message'].'</div>';
		unset($_SESSION['OPERATION_RESULT']);
	}
	?>
	<div style="margin-top: 10px;">
		<div>1. Please enter your registered email address into the form.</div>
		<div>2. The system will send the url for reset your password to your
			email.</div>
		<div>3. Open email and follow the link.</div>
		<div>
			4. Set up your new password within <b>30 minutes</b> before the url
			expire.
		</div>
	</div>
	<div style="margin-top: 10px;">
		<form method="post">
			<table>
				<tr>
					<td><b>Your Email Address : </b></td>
					<td><input type="text" name="email"></td>
					<td><input
				type="submit" value="Submit" name="submit"></td>
				</tr>
			</table>
		</form>
	</div>
</div>

