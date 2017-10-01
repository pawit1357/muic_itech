<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class RequestBookingController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BOOKING",
				"VIEW_ALL_REQUEST_BOOKING",
				"CREATE_REQUEST_BOOKING",
				"UPDATE_REQUEST_BOOKING",
				"DELETE_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestBooking ();
		
		if (isset ( $_GET ['date_filter'] )) {
			$model->date_filter = addslashes ( $_GET ['date_filter'] );
		}
		if (isset ( $_GET ['status_filter'] )) {
			$model->status_filter = addslashes ( $_GET ['status_filter'] );
		}
		if (isset ( $_GET ['room_filter'] )) {
			$model->room_filter = addslashes ( $_GET ['room_filter'] );
		}
		
		if ($model->date_filter == '') {
			$model->hiddenPass = true;
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionAllBooking() {
		// $now = new DateTime();
		// echo $now->format('Y-m-d H:i:s'); // MySQL datetime format
		
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BOOKING",
				"VIEW_ALL_REQUEST_BOOKING",
				"CREATE_REQUEST_BOOKING",
				"UPDATE_REQUEST_BOOKING",
				"DELETE_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestBooking ();
		
		if (isset ( $_GET ['date_filter'] )) {
			$model->date_filter = addslashes ( $_GET ['date_filter'] );
		}
		if (isset ( $_GET ['status_filter'] )) {
			$model->status_filter = addslashes ( $_GET ['status_filter'] );
		}
		if (isset ( $_GET ['room_filter'] )) {
			$model->room_filter = addslashes ( $_GET ['room_filter'] );
		}
		
		if ($model->date_filter == '') {
			$model->hiddenPass = true;
		}
		
		$this->render ( 'mainall', array (
				'data' => $model 
		) );
	}
	public function actionApprove() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"EDIT_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestBooking ();
		// $model->clearDateFilter();
		// $model->view_all_request = true;
		$model->status_filter = 'REQUEST_WAIT_APPROVE';
		$this->render ( 'approve', array (
				'data' => $model 
		) );
	}
	public function actionApproveRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"EDIT_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_GET ['id'] )) {
			try {
				$id = addslashes ( $_GET ['id'] );
				$model = RequestBooking::model ()->findByPk ( $id );
				if (isset ( $model )) {
					$model->status_code = 'REQUEST_APPROVE';
					if ($model->update ()) {
						// เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name . ', You have requested to use a room and A.V. equipment .<br />' . 'Here is your booking details.<br />' . 'Booking Type : ' . $model->request_booking_type->name . '<br />' . 'Room Number : ' . $model->room->name . '<br />' . 'Course Name : ' . $model->course_name . '<br />' . 'Use Date : ' . ($model->request_date == null ? $model->day_in_week->name : DateTimeUtil::getDateFormat ( $model->request_date, "dd MM yyyy" )) . '<br />' . 'Use Time : ' . DateTimeUtil::getTimeFormat ( $model->period_s->start_hour, $model->period_s->start_min ) . " - " . DateTimeUtil::getTimeFormat ( $model->period_e->end_hour, $model->period_e->end_min ) . '<br />' . 'A.V. setup will be arranged 30 minutes before using time.<br />' . 'Best Regards.';
						if (isset ( $model->user_login->email )) {
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
						}
					}
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/Approve' ) );
	}
	public function actionDisapproveRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"EDIT_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_GET ['id'] )) {
			try {
				$id = addslashes ( $_GET ['id'] );
				$model = RequestBooking::model ()->findByPk ( $id );
				if (isset ( $model )) {
					$model->status_code = 'REQUEST_CANCEL';
					if ($model->update ()) {
						// เธชเน�เธ�เน€เธกเธฅ
					}
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/Approve' ) );
	}
	public function actionCheckStatus() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (isset ( $_SESSION ['date_filter'] )) {
			$_GET ['date_filter'] = $_SESSION ['date_filter'];
		}
		if (isset ( $_SESSION ['equipment_type_id'] )) {
			$_GET ['equipment_type_id'] = $_SESSION ['equipment_type_id'];
		}
		if (isset ( $_SESSION ['start_period'] )) {
			$_GET ['start_period'] = $_SESSION ['start_period'];
		}
		
		$this->render ( 'basic-views' );
	}
	public function actionCheckStatusMeeting() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		$this->render ( 'check_status_meeting' );
	}
	public function actionRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'user-registration-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		
		if (isset ( $_GET ['room'] )) {
			$_SESSION ['request_room'] = addslashes ( $_GET ['room'] );
			// $_SESSION['request_type'] = '1';
		} else {
			unset ( $_SESSION ['request_room'] );
		}
		
		if (isset ( $_POST ['add_request'] )) {
			try {
				$addSuccess = true;
				$transaction = Yii::app ()->db->beginTransaction ();
				$equipments = $_POST ['equipments'];
				
				$requestBooking = new RequestBooking ();
				$requestBooking->attributes = $_POST ['RequestBooking'];
				$requestBooking->user_login_id = UserLoginUtil::getUserLoginId ();
				
				if ($requestBooking->request_booking_type_id == 1 || $requestBooking->request_booking_type_id == 2) {
					$requestBooking->status_code = "REQUEST_APPROVE";
				} else {
					$requestBooking->status_code = "REQUEST_WAIT_APPROVE";
				}
				$requestBooking->create_date = date ( "Y-m-d H:i:s" );
				if ($requestBooking->semester_id == 'undefined') {
					$requestBooking->semester_id = null;
				}
				if ($requestBooking->request_date == 'undefined') {
					$requestBooking->request_date = null;
				}
				if ($requestBooking->request_day_in_week == 'undefined') {
					$requestBooking->request_day_in_week = null;
				}
				
				if ($requestBooking->request_booking_type_id == '2') {
					
					$condition = "('" . Date ( "Y-m-d" ) . "' between t.start_date and t.end_date )";
					$sem = Semester::model ()->findAll ( array (
							'condition' => $condition 
					) );
					if (isset ( $sem ) && count ( $sem ) > 0) {
						
						for($i = strtotime ( $sem [0]->start_date ); $i <= strtotime ( $sem [0]->end_date ); $i = strtotime ( '+1 day', $i )) {
							if (date ( 'N', $i ) == ($requestBooking->request_day_in_week - 1)) { // Monday == 1
								$requestBooking_tmp = new RequestBooking ();
								
								// id
								$requestBooking_tmp->user_login_id = $requestBooking->user_login_id;
								$requestBooking_tmp->request_booking_type_id = $requestBooking->request_booking_type_id;
								$requestBooking_tmp->room_id = $requestBooking->room_id;
								$requestBooking_tmp->semester_id = $requestBooking->semester_id;
								$requestBooking_tmp->request_date = date ( 'Y-m-d', $i );
								$requestBooking_tmp->request_day_in_week = $requestBooking->request_day_in_week;
								$requestBooking_tmp->period_start = $requestBooking->period_start;
								$requestBooking_tmp->period_end = $requestBooking->period_end;
								$requestBooking_tmp->description = $requestBooking->description;
								$requestBooking_tmp->status_code = $requestBooking->status_code;
								$requestBooking_tmp->create_date = $requestBooking->create_date;
								$requestBooking_tmp->course_name = $requestBooking->course_name;
								$requestBooking_tmp->request_sky_id = $requestBooking->request_sky_id;
								$requestBooking_tmp->request_sky_noti_id = $requestBooking->request_sky_noti_id;
								// request_sky_id
								// request_sky_noti_id
								
								if ($requestBooking_tmp->save ()) {
									
									if (isset ( $equipments )) {
										foreach ( $equipments as $equipment ) {
											
											$equipmentTypeId = addslashes ( $equipment );
											$requestBookingEquipmentType = new RequestBookingEquipmentType ();
											$requestBookingEquipmentType->request_booking_id = $requestBooking_tmp->getPrimaryKey ();
											$requestBookingEquipmentType->equipment_type_id = $equipmentTypeId;
											if (isset ( $_POST ['EquipmentType'] [$equipmentTypeId] )) {
												$requestBookingEquipmentType->quantity = addslashes ( $_POST ['EquipmentType'] [$equipmentTypeId] );
											}
											if (! $requestBookingEquipmentType->save ()) {
												$addSuccess = false;
												break;
											}
										}
									}
								} else {
									$addSuccess = false;
									break;
								}
								// echo date('Y-m-d', $i).'<br>'; //prints the date only if it's a Monday
							}
						}
					} else {
						$addSuccess = false;
					}
				} else {
					
					if ($requestBooking->save ()) {
						$qtys = $_POST ['qtys'];
						
						if (isset ( $equipments )) {
							
							foreach ( $equipments as $equipment ) {
								
								$equipmentTypeId = addslashes ( $equipment );
								
								$requestBookingEquipmentType = new RequestBookingEquipmentType ();
								$requestBookingEquipmentType->request_booking_id = $requestBooking->getPrimaryKey ();
								$requestBookingEquipmentType->equipment_type_id = $equipmentTypeId;
								
								$requestBookingEquipmentType->quantity = $qtys [$equipmentTypeId];
								
								if (! $requestBookingEquipmentType->save ()) {
									$addSuccess = false;
									break;
								}
							}
						}
						
						if ($requestBooking->request_booking_type_id == '3') {
							$requestBookingActivityDetail = new RequestBookingActivityDetail ();
							$requestBookingActivityDetail->attributes = $_POST ['RequestBookingActivityDetail'];
							$requestBookingActivityDetail->id = $requestBooking->getPrimaryKey ();
							if ($requestBookingActivityDetail->save ()) {
								$presentTypes = $_POST ['present_type'];
								
								foreach ( $presentTypes as $presentType ) {
									$presentTypeId = addslashes ( $presentType );
									$requestBookingActivityPresentType = new RequestBookingActivityPresentType ();
									$requestBookingActivityPresentType->request_booking_activity_id = $requestBookingActivityDetail->getPrimaryKey ();
									$requestBookingActivityPresentType->present_type_id = $presentTypeId;
									
									if (! $requestBookingActivityPresentType->save ()) {
										$addSuccess = false;
										break;
									}
								}
							}
						}
					} else {
						$addSuccess = false;
					}
				}
				
				
				if ($addSuccess) {
					
					$transaction->commit ();
					
					// Send Email
					$model = $requestBooking;
					$content = 'Hi ' . $model->user_login->user_information->first_name . ', You have booked the room.<br />' . 'Here is your booking details.<br />' . 'Booking Type : ' . $model->request_booking_type->name . '<br />' . 'Room Number : ' . $model->room->name . '<br />' . 'Course Name : ' . $model->course_name . '<br />' . 'Use Date : ' . ($model->request_date == null ? $model->day_in_week->name : DateTimeUtil::getDateFormat ( $model->request_date, "dd MM yyyy" )) . '<br />' . 'Use Time : ' . DateTimeUtil::getTimeFormat ( $model->period_s->start_hour, $model->period_s->start_min ) . " - " . DateTimeUtil::getTimeFormat ( $model->period_e->end_hour, $model->period_e->end_min ) . '<br />' . 'The room will prepare for you 30 minutes before useing time.<br />' . 'Best Regards.';
					
					if (isset ( $model->user_login->email )) {
// 						echo 'Send Email Result:' . MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
					}
					
					if ($requestBooking->request_booking_type_id == '2') {
						$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking' ) );
					} else {
						$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/View/id/' . $requestBooking->getPrimaryKey () ) );
					}
				} else {
					$transaction->rollback ();
				}
				
				echo $requestBooking->period_start.','.$requestBooking->period_end;
				
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			// Render
			$model = new RequestBooking ();
			$this->render ( 'request', array (
					'data' => $model 
			) );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BOOKING",
				"VIEW_ALL_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = $this->loadModel ();
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_ALL_REQUEST_BOOKING" 
		) ) && $model->user_login_id != UserLoginUtil::getUserLoginId ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		$this->render ( 'view', array (
				'data' => $model 
		) );
	}
	public function actionConfirm() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = $this->loadModel ();
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_ALL_REQUEST_BOOKING" 
		) ) && $model->user_login_id != UserLoginUtil::getUserLoginId ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['confirm'] )) {
			if ($_POST ['confirm'] == 'Confirm') {
				if ($model->request_booking_type_id == 1 || $model->request_booking_type_id == 2) {
					$model->status_code = "REQUEST_APPROVE";
				} else {
					$model->status_code = "REQUEST_WAIT_APPROVE";
				}
				if ($model->update ()) {
					$content = 'Hi ' . $model->user_login->user_information->first_name . ', You have booked the room.<br />' . 'Here is your booking details.<br />' . 'Booking Type : ' . $model->request_booking_type->name . '<br />' . 'Room Number : ' . $model->room->name . '<br />' . 'Course Name : ' . $model->course_name . '<br />' . 'Use Date : ' . ($model->request_date == null ? $model->day_in_week->name : DateTimeUtil::getDateFormat ( $model->request_date, "dd MM yyyy" )) . '<br />' . 'Use Time : ' . DateTimeUtil::getTimeFormat ( $model->period_s->start_hour, $model->period_s->start_min ) . " - " . DateTimeUtil::getTimeFormat ( $model->period_e->end_hour, $model->period_e->end_min ) . '<br />' . 'The room will prepare for you 30 minutes before useing time.<br />' . 'Best Regards.';
					if (isset ( $model->user_login->email )) {
						MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
					}
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/View/id/' . $model->id ) );
				}
				// Mail
			} else if ($_POST ['confirm'] == 'Cancel') {
				if ($model->delete ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/' ) );
				}
			}
		}
		
		$this->render ( 'confirm', array (
				'data' => $model 
		) );
	}
	public function actionUpdate() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"EDIT_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		$model = $this->loadModel ();
		if (isset ( $_POST ['change_status'] )) {
			try {
				$status = addslashes ( $_POST ['status_code'] );
				$oldStatus = $model->status_code;
				$oldStatusName = $model->status->name;
				$model->status_code = $status;
				if ($model->update ()) {
					$model = RequestBooking::model ()->findByPk ( $model->id );
					if ($oldStatus != $status) {
						$content = 'Hi ' . $model->user_login->user_information->first_name . ', Your request booking with information below.<br />' . 'Booking details.<br />' . 'Booking Type : ' . $model->request_booking_type->name . '<br />' . 'Room Number : ' . $model->room->name . '<br />' . 'Course Name : ' . $model->course_name . '<br />' . 'Use Date : ' . ($model->request_date == null ? $model->day_in_week->name : DateTimeUtil::getDateFormat ( $model->request_date, "dd MM yyyy" )) . '<br />' . 'Use Time : ' . DateTimeUtil::getTimeFormat ( $model->period_s->start_hour, $model->period_s->start_min ) . " - " . DateTimeUtil::getTimeFormat ( $model->period_e->end_hour, $model->period_e->end_min ) . '<br />' . 'Has been change status from "' . $oldStatusName . '" to "' . $model->status->name . '".<br />' . 'Best Regards.';
						if (isset ( $model->user_login->email )) {
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Change Info', $content );
						}
					}
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/' ) );
				} else {
					$this->render ( 'update', array (
							'data' => $model 
					) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			// Render
			$this->render ( 'update', array (
					'data' => $model 
			) );
		}
	}
	public function actionCancel() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_REQUEST_BOOKING" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		$model = $this->loadModel ();
		$time = strtotime ( $model->request_date . ' ' . $model->period_s->start_hour . ':' . $model->period_s->start_min . ':00' );
		if (($time - time ()) > (30 * 60)) {
			$model->status_code = "REQUEST_CANCEL";
			if ($model->update ()) {
				$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/View/id/' . $model->id ) );
			}
		}
		// Render
		$this->render ( 'view', array (
				'data' => $model 
		) );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = RequestBooking::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}