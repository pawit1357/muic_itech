<div class="menu">
	<div class="head">Menu</div>
	<?php
	//echo Yii::app()->controller->id;
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
					array(	'label'=>'Show Request',
							'url'=>array('RequestService/'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'index' && strtolower(Yii::app()->controller->id) == 'requestservice',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_SERVICE", "VIEW_ALL_REQUEST_SERVICE", "CREATE_REQUEST_SERVICE", "UPDATE_REQUEST_SERVICE", "DELETE_REQUEST_SERVICE")),
					),
					array(	'label'=>'Request',
							'url'=>array('RequestService/Request'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'request' && strtolower(Yii::app()->controller->id) == 'requestservice',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_SERVICE")),
					),
					array(	'label'=>'Approve',
							'url'=>array('RequestService/Approve'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'approve' && strtolower(Yii::app()->controller->id) == 'requestservice',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_SERVICE",)),
					),
					array(	'label'=>'Login',
							'url'=>array('management/Login'),
							'visible'=>!UserLoginUtil::isLogin(),
					),
			),
	));

	?>
</div>
