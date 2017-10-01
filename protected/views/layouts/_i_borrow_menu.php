<div class="menu">
	<div class="head">Menu</div>
	<?php
	//echo Yii::app()->controller->id;
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
					array(	'label'=>'Show Request',
							'url'=>array('RequestBorrow/'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'index' && strtolower(Yii::app()->controller->id) == 'requestborrow',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BORROW", "VIEW_ALL_REQUEST_BORROW", "CREATE_REQUEST_BORROW", "UPDATE_REQUEST_BORROW", "DELETE_REQUEST_BORROW")),
					),
					array(	'label'=>'Check Status',
							'url'=>array('RequestBorrow/CheckStatus'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'checkstatus' && strtolower(Yii::app()->controller->id) == 'requestborrow',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "CHECK_STATUS_REQUEST_BORROW")),
					),
					array(	'label'=>'Request',
							'url'=>array('RequestBorrow/Request'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'request' && strtolower(Yii::app()->controller->id) == 'requestborrow',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BORROW")),
			),
			array(	'label'=>'Approve',
			'url'=>array('RequestBorrow/ListApprove'),
			'active'=>strtolower(Yii::app()->controller->action->id) == 'listapprove' && strtolower(Yii::app()->controller->id) == 'requestborrow',
			'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW",)),
			),
			array(	'label'=>'Login',
			'url'=>array('management/Login'),
			'visible'=>!UserLoginUtil::isLogin(),
			),
			),
	));

	?>
</div>
