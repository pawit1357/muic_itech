<div class="menu">
	<div class="head">Menu</div>
	<?php
	$controllerId = strtolower(Yii::app()->controller->id);
	$actionId = strtolower(Yii::app()->controller->action->id);
	//echo Yii::app()->controller->id;
	$this->widget('zii.widgets.CMenu', array(
			'items'=> array(
			array(	'label'=>'i-Booking',
					'url'=>'javascript:void(0)',
					'active'=>	$actionId == 'requestbookingstatisticreport' ||
					$actionId == 'requestbookingusingstatisticreport' ||
					$actionId == 'requestbookingproblemstatisticreport',
					'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
					'items'=>array(
							array(	'label'=>'Request Statistic',
									'url'=>array('Report/RequestBookingStatisticReport'),
									'active'=>$actionId == 'requestbookingstatisticreport',
									'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
							),
							array(	'label'=>'Using Equipment Statistic',
									'url'=>array('Report/RequestBookingUsingStatisticReport'),
									'active'=>$actionId == 'requestbookingusingstatisticreport',
									'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
							),
						),
				),
				array(	'label'=>'i-Borrow',
				'url'=>'javascript:void(0)',
				'active'=>	$actionId == 'requestborrowstatisticreport' ||
				$actionId == 'requestborrowusingstatisticreport' ||
				$actionId == 'requestborrowproblemstatisticreport',
				'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
				'items'=>array(
						array(	'label'=>'Request Statistic',
						'url'=>array('Report/RequestBorrowStatisticReport'),
						'active'=>$actionId == 'requestborrowstatisticreport',
						'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),
						array(	'label'=>'Using Equipment Statistic',
						'url'=>array('Report/RequestBorrowUsingStatisticReport'),
						'active'=>$actionId == 'requestborrowusingstatisticreport',
						'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),
					),
				),
				array(	'label'=>'i-Service',
				'url'=>'javascript:void(0)',
				'active'=> 	$actionId == 'requestserviceusingstatisticreport' ||
				$actionId == 'requestservicestatisticreport' ||
				$actionId == 'requestserviceproblemstatisticreport',
				'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
				'items'=>array(
						array(	'label'=>'Request Statistic',
						'url'=>array('Report/RequestServiceStatisticReport'),
						'active'=>$actionId == 'requestservicestatisticreport',
						'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),
						array(	'label'=>'Using Service Statistic',
						'url'=>array('Report/RequestServiceUsingStatisticReport'),
						'active'=>$actionId == 'requestserviceusingstatisticreport',
						'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),
					),
				),
// 				array(	'label'=>'i-Solution',
// 				'url'=>'javascript:void(0)',
// 				'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
// 				'active'=>	($actionId == 'solutionproblemstatisticreport') ||
// 				($actionId == 'solutionusingstatisticreport'),
// 				'items'=>array(
// 						array(	'label'=>'Using Equipment Statistic',
// 						'url'=>array('Report/SolutionUsingStatisticReport'),
// 						'active'=>$actionId == 'solutionusingstatisticreport',
// 						'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
// 						),
// 					),
// 				),
				array(	'label'=>'Other Statistic',
				'url'=>'javascript:void(0)',
				'active'=>$actionId == 'menuclickstatisticreport' || $actionId == 'equipmentcrackstatisticreport',
				'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
				'items'=>array(
						array(	'label'=>'Equipment Cracked Statistic',
							'url'=>array('Report/EquipmentCrackStatisticReport'),
							'active'=>$actionId == 'equipmentcrackstatisticreport',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),			
						array(	'label'=>'User Statistic',
							'url'=>array('Report/UserStatisticReport'),
							'active'=>$actionId == 'userstatisticreport',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),			
						array(	'label'=>'Using Sheet',
							'url'=>array('Report/UsingSheet'),
							'active'=>$actionId == 'usingsheet',
							'visible'=>UserLoginUtil::hasPermission(array("FULL_ADMIN")),
						),			
				),
				),
				array(	'label'=>'Login',
				'url'=>array('management/Login'),
				'visible'=>!UserLoginUtil::isLogin(),
				),
	)));

	?>
</div>
