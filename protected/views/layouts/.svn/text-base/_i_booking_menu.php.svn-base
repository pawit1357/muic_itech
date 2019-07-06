<div class="menu">
	<div class="head">Menu</div>
	<?php
	//echo Yii::app()->controller->id;
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
// 					array(	'label'=>'Show Request',
// 							'url'=>array('RequestBooking/'),
// 							'active'=>strtolower(Yii::app()->controller->action->id) == 'index' && strtolower(Yii::app()->controller->id) == 'requestbooking',
// 							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BOOKING", "VIEW_ALL_REQUEST_BOOKING", "EDIT_REQUEST_BOOKING",)),
// 					),
					array(	'label'=>'My Booking',
							'url'=>array('RequestBooking/'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'myBooking' && strtolower(Yii::app()->controller->id) == 'requestbooking',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_ALL_REQUEST_BOOKING")),
					),					
					array(	'label'=>'Check Status',
							'url'=>array('RequestBooking/CheckStatus'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'checkstatus' && strtolower(Yii::app()->controller->id) == 'requestbooking',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "CHECK_STATUS_REQUEST_BOOKING",)),
					),
					array(	'label'=>'Request',
							'url'=>array('RequestBooking/Request'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'request' && strtolower(Yii::app()->controller->id) == 'requestbooking',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BOOKING",)),
					),
				
					array(	'label'=>'Approve',
							'url'=>array('RequestBooking/Approve'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'approve' && strtolower(Yii::app()->controller->id) == 'requestbooking',
							'visible'=>UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV)),
							//'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "EDIT_REQUEST_BOOKING",)),
					),
					array(	'label'=>'Login',
							'url'=>array('management/Login'),
							'visible'=>!UserLoginUtil::isLogin(),
					),
			),
	));

	?>
</div>
