<script type="text/javascript">
	$(function(){
		$('html').click(function(e){
		      if(e.target.id == 'dd' || 
				      e.target.parentNode.id == 'dd') {
		        if($('#menupanel').css("visibility") == "hidden") {
		        	$('#menupanel').css({visibility: "visible"});
		        } else {
		        	$('#menupanel').css({visibility: "hidden"});
		        }
		      } else {
				if(e.target.id != 'menupanel' && e.target.parentNode.id != 'menupanel' && e.target.id != 'menupanel-inner' && e.target.parentNode.id != 'menupanel-inner') {
					$('#menupanel').css({visibility: "hidden"});
			      }
		      }
		    });
	});
</script>
<div class="left">
	<span class="home-icon"> <a
		href="<?php echo Yii::app()->createUrl('')?>">&nbsp;</a>
	</span> <span class="facebook-icon"> <a href="#">&nbsp;</a>
	</span> <span class="twitter-icon"> <a href="#">&nbsp;</a>
	</span>
</div>
<div class="right">
	<?php
	if (UserLoginUtil::isLogin ()) {
		$userLogin = UserLoginUtil::getUserLogin ();
		?>
	<form action="<?php echo Yii::app()->createUrl('Management/Logout')?>"
		method="post">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td><span><a
						href="<?php echo Yii::app()->createUrl('RequestBooking/')?>"
						style="color: white; font-weight: blod;"><?php echo $userLogin->username.' '.$userLogin->user_information->last_name?>
					(<?php echo UserLoginUtil::getUserRoleName();?>)</a>
						<?php if($userLogin->latest_login != '') {?> | Lastest login is
						<?php echo DateTimeUtil::getDateFormat($userLogin->latest_login, "dd MM yyyy")?>
						<?php }?>
				</span></td>
				<td>&nbsp</td>
				<td><div id="panel" class="panel">
						<a id='dd' href="javascript:void(0)"><img
							src="<?php echo Yii::app()->request->baseUrl;?>/images/config.png"
							width="20" border="0"> </a>
					</div>
					<div id="menupanel" class="menupanel">
						<div id="menupanel-inner">
							<div class="arrow"></div>
							<a href="<?php echo Yii::app()->createUrl('RequestBooking/')?>">Management</a>
							<a
								href="<?php echo Yii::app()->createUrl('Management/EditProfile')?>">Edit
								Profile</a> <a
								href="<?php echo Yii::app()->createUrl('Management/ChangePassword')?>">Change
								Password</a> <a
								href="<?php echo Yii::app()->createUrl('Management/Logout')?>">Logout</a>
						</div>
					</div></td>
			</tr>
		</table>



	</form>

	<?php
	} else {
		$form = $this->beginWidget ( 'CActiveForm', array (
				'id' => 'users-form',
				'action' => Yii::app ()->createUrl ( 'management/login' ),
				'enableAjaxValidation' => true 
		) );
		?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td><div class="username">
					Username
					<?php echo $form->textField(UserLogin::model(), 'username', array('size' => 20, 'autocomplete' => 'off', 'maxlength' => 20)); ?>
				</div>
				<div class="password">
					Password
					<?php echo $form->passwordField(UserLogin::model(), 'password', array('size' => 20, 'autocomplete' => 'off', 'maxlength' => 20)); ?>
				</div></td>
			<td>
				<div class="login">
					<input type="submit" name="login" value="Login">
				</div>
			</td>
			<td><div id="panel" class="panel">
					<a id='dd' href="javascript:void(0)"><img
						src="<?php echo Yii::app()->request->baseUrl;?>/images/config.png"
						width="20" border="0"> </a>
				</div>
				<div id="menupanel" class="menupanel">
					<div id="menupanel-inner">
						<div class="arrow"></div>
						<a
							href="<?php echo Yii::app()->createUrl('Management/Register')?>">Register</a>
						<a
							href="<?php echo Yii::app()->createUrl('Management/ForgetPassword')?>">Forget
							Password</a>
					</div>
				</div></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
	<?php }?>

</div>
