<div class="module-head">User Login</div>
<div>
	<?php 
	// Start create form
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
        'enableAjaxValidation' => false      )); ?>
	<table class="simple-form">
		<tr class="fail-message">
			<td class="column-left" width="15%"></td>
			<td class="column-right"><?php 
			if(isset($_SESSION['FAIL_MESSAGE'])){
				echo $_SESSION['FAIL_MESSAGE'];
				unset($_SESSION['FAIL_MESSAGE']);
			}
			?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Username</td>
			<td class="column-right"><?php echo $form->textField(UserLogin::model(), 'username', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Password</td>
			<td class="column-right"><?php echo $form->passwordField(UserLogin::model(), 'password', array('size' => 20, 'maxlength' => 20)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Login"><input type="reset" value="Cancel" /></td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><a href="<?php echo Yii::app()->createUrl('Management/Register')?>">Register</a></td>
		</tr>
		</table>
	<?php $this->endWidget(); ?>
</div>

