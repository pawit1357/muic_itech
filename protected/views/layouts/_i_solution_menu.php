<div class="menu">
	<div class="head">Menu</div>
	<?php
	$controllerId = strtolower(Yii::app()->controller->id);
	$actionId = strtolower(Yii::app()->controller->action->id);
	//echo Yii::app()->controller->id;
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
					array(	'label'=>'Show Status',
							'url'=>array('Solution/'),
							'active'=>strtolower(Yii::app()->controller->action->id) == 'index' && strtolower(Yii::app()->controller->id) == 'solution',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST")),
					),
			array(	'label'=>'Login',
			'url'=>array('management/Login'),
			'visible'=>!UserLoginUtil::isLogin(),
			),
			),
	));

	?>
</div>
