<div class="menu">
	<div class="head">Menu</div>
	<?php
	// echo Yii::app()->controller->id;
	$this->widget ( 'zii.widgets.CMenu', array (
			'items' => array (
					array (
							'label' => 'Check Status',
							'url' => array (
									'RequestBorrowNew/' 
							),
							'active' => strtolower ( Yii::app ()->controller->action->id ) == 'index' && strtolower ( Yii::app ()->controller->id ) == 'requestborrownew',
							'visible' => UserLoginUtil::hasPermission ( array (
									"FULL_ADMIN",
									"VIEW_REQUEST_BORROW",
									"CREATE_REQUEST_BORROW",
									"UPDATE_REQUEST_BORROW",
									"DELETE_REQUEST_BORROW" 
							) ) 
					),
					array (
							'label' => 'Borrow',
							'url' => array (
									'RequestBorrowNew/Borrow' 
							),
							'active' => strtolower ( Yii::app ()->controller->action->id ) == 'borrow' && strtolower ( Yii::app ()->controller->id ) == 'requestborrownew',
							'visible' => UserLoginUtil::hasPermission ( array (
									"FULL_ADMIN",
									"CREATE_REQUEST_BORROW" 
							) ) && (! UserLoginUtil::isBlackList ( UserLoginUtil::getUserLoginId () )) 
					),
					array (
							'label' => 'Approver',
							'url' => array (
									'RequestBorrowNew/ListApprove' 
							),
							'active' => strtolower ( Yii::app ()->controller->action->id ) == 'listapprove' && strtolower ( Yii::app ()->controller->id ) == 'requestborrownew',
							'visible' => UserLoginUtil::hasPermission ( array (
									"FULL_ADMIN",
									"APPROVE_BORROW" 
							) ) && ( UserLoginUtil::isApprover ( UserLoginUtil::getUserLoginId () )) 
					),
// 					array (
// 							'label' => 'Equipment',
// 							'url' => array (
// 									'RequestBorrowNew/EquipmentList' 
// 							),
// 							'active' => strtolower ( Yii::app ()->controller->action->id ) == 'equipmentList' && strtolower ( Yii::app ()->controller->id ) == 'requestborrownew',
// 							'visible' => UserLoginUtil::hasPermission ( array (
// 									"FULL_ADMIN",
// 									"VIEW_REQUEST_BORROW" 
// 							) ) 
// 					),
					array (
							'label' => 'Equipment Remain',
							'url' => array (
									'RequestBorrowNew/EquipmentTypeList'
							),
							'active' => strtolower ( Yii::app ()->controller->action->id ) == 'equipmentList' && strtolower ( Yii::app ()->controller->id ) == 'requestborrownew',
							'visible' => UserLoginUtil::hasPermission ( array (
									"FULL_ADMIN",
									"VIEW_REQUEST_BORROW"
							) )
					),
					array (
							'label' => 'Login',
							'url' => array (
									'management/Login' 
							),
							'visible' => ! UserLoginUtil::isLogin () 
					) 
			) 
	) );
	
	?>
</div>
