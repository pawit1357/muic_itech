<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class ManagementController extends CController {
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
		// Render
		$model = new RequestBooking ();
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	
	/**
	 * Login Page
	 */
	public function actionLogin() {
		
		// if login redirect to index
		if (UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( '' ) );
		}
		// if post parameters username and password submitted
		if (isset ( $_POST ['UserLogin'] ['username'] ) && isset ( $_POST ['UserLogin'] ['password'] )) {
			$username = addslashes ( $_POST ['UserLogin'] ['username'] );
			$password = addslashes ( $_POST ['UserLogin'] ['password'] );
// 			$role_id = addslashes ( $_POST ['UserLogin'] ['role_id'] );
			// Authen
			
			if (UserLoginUtil::authen ( $username, $password )) {
				
				if (UserLoginUtil::hasPermission ( array (
						"FULL_ADMIN" 
				) )) {
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/AllBooking' ) );
				} else {
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/' ) );
				}
			} else {
				$this->redirect ( Yii::app ()->createUrl ( 'RequestBooking/' ) );
			}
		}
		$this->render ( 'login' );
	}
	public function actionRegister() {
		// if post parameters username and password submitted
		if (isset ( $_POST ['add_user'] )) {
			$userLogin = new UserLogin ();
			$userLogin->attributes = $_POST ['UserLogin'];
			$userLogin->password = md5 ( $userLogin->password );
			$userLogin->role_id = '3';
			$validate = true;
			
			try {
				if ($userLogin->save ()) {
					// Create User Information
					$userInfo = new UserInformation ();
					$userInfo->id = $userLogin->getPrimaryKey ();
					$userInfo->attributes = $_POST ['UserInformation'];
					if ($userInfo->save ()) {
						$_SESSION ['OPERATION_RESULT'] = array (
								'class' => 'success',
								'message' => 'The registeration was successful.' 
						);
						$this->redirect ( Yii::app ()->createUrl ( 'Management/Register' ) );
					} else {
						$this->render ( 'register' );
					}
				}
			} catch ( CDbException $e ) {
				// Return error result
				$message = $e->getMessage ();
				if (strpos ( $message, 'Duplicate' ) && strpos ( $message, 'key 1' )) {
					$message = 'Username is already exists.';
				} else if (strpos ( $message, 'Duplicate' ) && strpos ( $message, 'key 2' )) {
					$message = 'Personal ID Card is already exists.';
				} else if (strpos ( $message, 'Duplicate' ) && strpos ( $message, 'key 3' )) {
					$message = 'Email is already exists.';
				}
				$_SESSION ['OPERATION_RESULT'] = array (
						'class' => 'error',
						'message' => $message 
				);
				$this->render ( 'register' );
			}
		} else {
			$this->render ( 'register' );
		}
	}
	public function actionCheckAlertToSocialMedia() {
		$next30MinTime = time () + (30 * 60);
		$currentDateTime = date ( "Y-m-d H:i:s" );
		$next30MinDateTime = date ( "Y-m-d H:i:s", $next30MinTime );
		// find non semester
		$conditionNonSemester = "CAST(CONCAT(t.request_date,' ', period_start.start_hour, ':',period_start.start_min,':00' ) AS DATETIME) BETWEEN '" . $currentDateTime . "' AND '" . $next30MinDateTime . "' AND t.request_booking_type_id != 2";
		
		// find semester
		$dayOfWeek = (date ( 'w' ) + 1);
		$conditionSemester = "CAST(CONCAT('" . date ( "Y-m-d" ) . "',' ', period_start.start_hour, ':',period_start.start_min,':00' ) AS DATETIME) BETWEEN '" . $currentDateTime . "' AND '" . $next30MinDateTime . "' AND '" . date ( "Y-m-d" ) . "' BETWEEN semester.start_date AND semester.end_date AND " . $dayOfWeek . " = t.request_day_in_week AND t.request_booking_type_id = 2";
		echo 'Date Now : ' . date ( "Y-m-d H:i:s" ) . '<br>';
		echo 'Next 30 min : ' . $next30MinDateTime . "<br>";
		$condition = "(" . $conditionNonSemester . ") OR (" . $conditionSemester . ")";
		
		$oDBC = new CDbCriteria ();
		$oDBC->select = '*';
		$oDBC->join = 'LEFT OUTER JOIN semester semester ON t.semester_id = semester.id INNER JOIN period period_start ON t.period_start = period_start.id';
		$oDBC->condition = $condition;
		
		$requestBookings = RequestBooking::model ()->findAll ( $oDBC );
		$newRequestBookings = array ();
		if (isset ( $requestBookings ) && count ( $requestBookings ) > 0) {
			foreach ( $requestBookings as $requestBooking ) {
				$requestLogs = RequestBookingAlertLog::model ()->findAll ( array (
						'condition' => "request_booking_id='" . $requestBooking->id . "' and alert_date = '" . date ( "Y-m-d" ) . "'" 
				) );
				if (isset ( $requestLogs ) && count ( $requestLogs ) > 0) {
				} else {
					$newRequestBookings [count ( $newRequestBookings )] = $requestBooking;
				}
			}
		}
		
		if (isset ( $newRequestBookings ) && count ( $newRequestBookings ) > 0) {
			$requestBookings = $newRequestBookings;
			foreach ( $requestBookings as $requestBooking ) {
				$rooms = $room . $requestBooking->room->room_code . ', ';
			}
			if (strlen ( $rooms ) > 2) {
				$rooms = substr ( $rooms, 0, strlen ( $rooms ) - 2 );
			}
			$message = "You have room to setup device. " . $rooms;
			echo $message;
			
			// Alert To phone
			
			$url = 'ed.muic.mahidol.ac.th/itech/index.php/WebService/SendNotification/message/' . $message;
			$curl = curl_init ();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array ( $curl, array (
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => $url,
					CURLOPT_USERAGENT => 'Codular Sample cURL Request' 
			) );
			$result = curl_exec ( $curl );
			echo $result;
			curl_close ( $curl );
			
			// Alert To FaceBook
			// SocialMediaUtil::postToFacebook($message);
			
			// Turn On
			foreach ( $requestBookings as $requestBooking ) {
				
				$roomId = $requestBooking->room->room_code;
				$equipments = Equipment::model ()->findAll ( array (
						'condition' => "room_id='" . $roomId . "'" 
				) );
				foreach ( $equipments as $equipment ) {
					if ($equipment->equipment_type->equipment_type_code == '1009') {
						HardwareUtil::turnOnComputer ( $equipment->ip_address );
					} else {
						HardwareUtil::turnOn ( $equipment->ip_address );
					}
				}
				$requestLogs = new RequestBookingAlertLog ();
				$requestLogs->request_booking_id = $requestBooking->id;
				$requestLogs->alert_date = date ( "Y-m-d" );
				$requestLogs->save ();
			}
		} else {
			
			echo '---No item need to open.';
		}
	}
	
	// public function actionCheckRoomNeedToAlert()
	// {
	// $next30MinTime = time() + (30 * 60);
	// $currentDateTime = date("Y-m-d H:i:s");
	// $next30MinDateTime = date("Y-m-d H:i:s", $next30MinTime);
	// // find non semester
	// $conditionNonSemester = "CAST(CONCAT(t.request_date,' ', period_start.start_hour, ':',period_start.start_min,':00' ) AS DATETIME) BETWEEN '".$currentDateTime."' AND '".$next30MinDateTime."' AND t.request_booking_type_id != 2";
	
	// // find semester
	// $dayOfWeek = (date('w') + 1);
	// $conditionSemester = "CAST(CONCAT('".date("Y-m-d")."',' ', period_start.start_hour, ':',period_start.start_min,':00' ) AS DATETIME) BETWEEN '".$currentDateTime."' AND '".$next30MinDateTime."' AND '".date("Y-m-d")."' BETWEEN semester.start_date AND semester.end_date AND ".$dayOfWeek." = t.request_day_in_week AND t.request_booking_type_id = 2";
	// echo 'Date Now : '.date("Y-m-d H:i:s").'<br>';
	// echo 'Next 30 min : '.$next30MinDateTime."<br>";
	// $condition = "(".$conditionNonSemester.") OR (".$conditionSemester.")";
	
	// $oDBC = new CDbCriteria();
	// $oDBC->select = '*';
	// $oDBC->join = 'LEFT OUTER JOIN semester semester ON t.semester_id = semester.id INNER JOIN period period_start ON t.period_start = period_start.id';
	// $oDBC->condition = $condition;
	
	// $requestBookings = RequestBooking::model()->findAll($oDBC);
	
	// if(isset($requestBookings) && count($requestBookings) > 0) {
	// foreach($requestBookings as $requestBooking) {
	// $rooms = $room.$requestBooking->room->room_code.', ';
	// }
	// if(strlen($rooms) > 2){
	// $rooms = substr($rooms, 0, strlen($rooms) - 2);
	// }
	// $message = "You have room to open.".$rooms;
	// echo $message;
	// } else {
	
	// echo '---No item need to open.';
	// }
	// }
	public function actionCheckAlertToTurnItemBack() {
		$nextDay = time () + (60 * 60 * 24);
		$nextDate = date ( "Y-m-d", $nextDay );
		// find non semester
		
		$requestBorrows = RequestBorrow::model ()->findAll ( array (
				'condition' => "thru_date = '" . $nextDate . "' AND status_code = 'REQUEST_BORROW_APPROVED'" 
		) );
		$newRequestBorrows = array ();
		foreach ( $requestBorrows as $requestBorrow ) {
			$requestLogs = RequestBorrowAlertLog::model ()->findAll ( array (
					'condition' => "request_borrow_id='" . $requestBorrow->id . "' and alert_date = '" . date ( "Y-m-d" ) . "'" 
			) );
			if (isset ( $requestLogs ) && count ( $requestLogs ) > 0) {
			} else {
				$newRequestBorrows [count ( $newRequestBorrows )] = $requestBorrow;
			}
		}
		$requestBorrows = $newRequestBorrows;
		if (isset ( $requestBorrows ) && count ( $requestBorrows ) > 0) {
			foreach ( $requestBorrows as $requestBorrow ) {
				
				$content = "Hi, you have item need to return tomorrow.";
				if ($requestBorrow->user_login->email != '') {
					MailUtil::sendMail ( $requestBorrow->user_login->email, 'You have item need to return tomorrow.', $content );
				}
				echo $requestBorrow->user_login_id . ' Need to return Item.<br />';
				$requestLogs = new RequestBorrowAlertLog ();
				$requestLogs->request_borrow_id = $requestBorrow->id;
				$requestLogs->alert_date = date ( "Y-m-d" );
				$requestLogs->save ();
			}
			
			// SocialMediaUtil::postToFacebook($message);
		} else {
			
			echo '---No item need to return.';
		}
	}
	
	/**
	 * Logout
	 */
	public function actionLogout() {
		UserLoginUtil::logout ();
		$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
	}
	public function actionChangePassword() {
		if (! UserLoginUtil::isLogin ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['submit'] )) {
			$newPassword = $_POST ['new-password'];
			$reNewPassword = $_POST ['re-new-password'];
			$oldPassword = $_POST ['password'];
			$validated = true;
			if ($newPassword == '') {
				$validated = false;
				$operationResultClass = 'error';
				$operationResultMessage = 'Please Enter New Password';
			} else if ($newPassword != $reNewPassword) {
				$validated = false;
				$operationResultClass = 'error';
				$operationResultMessage = 'New password must be the same.';
			} else if (md5 ( $oldPassword ) != UserLoginUtil::getUserLogin ()->password) {
				$validated = false;
				$operationResultClass = 'error';
				$operationResultMessage = 'Current password not correct.';
			}
			if ($validated) {
				$userLogin = UserLoginUtil::getUserLogin ();
				$userLogin->password = md5 ( $newPassword );
				if ($userLogin->update ()) {
					$operationResultClass = 'success';
					$operationResultMessage = 'Password has been changed.';
				} else {
					$operationResultClass = 'error';
					$operationResultMessage = 'Change password fail.';
				}
			}
			$_SESSION ['OPERATION_RESULT'] = array (
					'class' => $operationResultClass,
					'message' => $operationResultMessage 
			);
			$this->redirect ( Yii::app ()->createUrl ( 'Management/ChangePassword' ) );
		}
		
		$this->render ( 'changePassword' );
	}
	public function actionEditProfile() {
		if (! UserLoginUtil::isLogin ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		if (isset ( $_POST ['edit_user'] )) {
			$userLogin = UserLoginUtil::getUserLogin ();
			$userLogin->attributes = $_POST ['UserLogin'];
			$validate = true;
			if ($userLogin->update ()) {
				$userInfo = UserInformation::model ()->findByPk ( $userLogin->id );
				$userInfo->attributes = $_POST ['UserInformation'];
				
				if ($userInfo->update ()) {
					$operationResultClass = 'success';
					$operationResultMessage = 'Profile has been changed.';
				} else {
					$operationResultClass = 'error';
					$operationResultMessage = 'Change user information failed.';
				}
			} else {
				$operationResultClass = 'error';
				$operationResultMessage = 'Change email failed.';
			}
			$_SESSION ['OPERATION_RESULT'] = array (
					'class' => $operationResultClass,
					'message' => $operationResultMessage 
			);
			$this->redirect ( Yii::app ()->createUrl ( 'Management/EditProfile' ) );
		}
		$model = UserLoginUtil::getUserLogin ();
		$this->render ( 'editProfile', array (
				'model' => $model 
		) );
	}
	public function actionWakeOnLan() {
		if (! UserLoginUtil::isLogin ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$result = WakeOnLAN::Wol ( $_GET ["wake_ip"], $_GET ["wake_machine"], 9 );
		if (strpos ( $result, 'successful' ) == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function actionPing() {
		if (! UserLoginUtil::isLogin ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		$host = $_GET ['ip'];
		$result = exec ( "ping " . $host );
		if (strpos ( $result, 'Average' ) == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function actionShutdown() {
		if (! UserLoginUtil::isLogin ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$ip = $_GET ["ip"];
		$user = $_GET ["user"];
		$pass = $_GET ["pass"];
		
		$url = 'ed.muic.mahidol.ac.th/itech/shutdown.php?ip_address=' . $ip . '&client_user=' . $user . '&client_pass=' . $pass;
		$curl = curl_init ();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array ( $curl, array (
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request' 
		) );
		$result = curl_exec ( $curl );
		// echo $result;
		curl_close ( $curl );
		
		// Windows
		// $result = exec('C:\\Windows\\System32\\psshutdown.exe -s -f -c -t 2 -u '.$user.' -p '.$pass.' \\'.$ip.'');
		// Linux
		// $result = exec('net rpc shutdown -I '.$ip.' -U '.$user.'%'.$pass);
		
		if (strpos ( $result, "succeeded" ) == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function actionForgetPassword() {
		if (isset ( $_POST ['email'] )) {
			// Verify email exists
			$email = addslashes ( $_POST ['email'] );
			$userLogins = UserLogin::model ()->findAll ( array (
					'condition' => "email='" . $email . "'" 
			) );
			if (isset ( $userLogins ) && count ( $userLogins ) > 0) {
				$userLogin = $userLogins [0];
				
				// Random key
				$num1 = rand ( 1, 1000000 );
				$num2 = rand ( 1, 1000000 );
				$num3 = rand ( 1, 1000000 );
				$num4 = rand ( 1, 1000000 );
				$key = md5 ( $num1 ) . md5 ( $num2 ) . md5 ( $num3 ) . md5 ( $num4 );
				
				// Save key and send email to reset password by key
				$userForgetPasswordRequest = new UserForgetPasswordRequest ();
				$userForgetPasswordRequest->user_login_id = $userLogin->id;
				$userForgetPasswordRequest->key = $key;
				$userForgetPasswordRequest->request_date = date ( "Y-m-d H:i:s" );
				$operationResultClass = 'error';
				if ($userForgetPasswordRequest->save ()) {
					$mailContent = "Hi " . $userLogin->user_information->first_name . ' ' . $userLogin->user_information->last_name . '<br />' . 'You have requested to reset your password. Please follow the link below here.<br />' . '<a href="' . ConfigUtil::getSiteName () . '/index.php/Management/ResetPassword/key/' . $key . '/u/' . $userLogin->id . '">>>Click Here to Reset Password<<</a><br />' . 'This Link will be expire within 30 minutes.';
					if (MailUtil::sendMail ( $email, "Support AV-Online, Reset your password", $mailContent )) {
						$operationResultClass = 'success';
						$operationResultMessage = 'Email has been sent. Please check your email, it will expire within 30 minutes.';
					} else {
						$operationResultMessage = 'Cannot send email';
					}
				} else {
					$operationResultMessage = "Cannot save information.";
				}
				$_SESSION ['OPERATION_RESULT'] = array (
						'class' => $operationResultClass,
						'message' => $operationResultMessage 
				);
				$this->redirect ( Yii::app ()->createUrl ( 'Management/ForgetPassword' ) );
			} else {
				$_SESSION ['OPERATION_RESULT'] = array (
						'class' => 'error',
						'message' => 'Email not found.' 
				);
				$this->redirect ( Yii::app ()->createUrl ( 'Management/ForgetPassword' ) );
			}
		}
		$this->render ( 'forgetPassword' );
	}
	public function actionResetPassword() {
		if (isset ( $_GET ['key'] ) && isset ( $_GET ['u'] )) {
			// Get Key and User id
			$key = addslashes ( $_GET ['key'] );
			$userLoginId = addslashes ( $_GET ['u'] );
			
			// Find key
			$compareExpireTime = date ( "Y-m-d H:i:s", (time () - 1800) );
			$condition = "request_date > '" . $compareExpireTime . "' AND user_login_id = " . $userLoginId . " AND `key` = '" . $key . "'";
			$userForgetPasswordRequests = UserForgetPasswordRequest::model ()->findAll ( array (
					'condition' => $condition,
					'order' => 'id DESC' 
			) );
			$userForgetPasswordRequest = $userForgetPasswordRequests [0];
			if (isset ( $userForgetPasswordRequest )) {
				// If key exists.
				if (isset ( $_POST ['password'] ) && isset ( $_POST ['re-password'] )) {
					$password = addslashes ( $_POST ['password'] );
					$rePassword = addslashes ( $_POST ['re-password'] );
					if ($password != $rePassword) {
						$operationResultClass = 'error';
						$operationResultMessage = 'Password not same.';
						$_SESSION ['OPERATION_RESULT'] = array (
								'class' => $operationResultClass,
								'message' => $operationResultMessage 
						);
						$userLogin = $userForgetPasswordRequest->user_login;
						$this->render ( 'resetPassword', array (
								'userLogin' => $userLogin,
								'status' => $userForgetPasswordRequest->status 
						) );
					} else {
						$userLogin = $userForgetPasswordRequest->user_login;
						$userLogin->password = md5 ( $password );
						if ($userLogin->update ()) {
							// Update new password
							$operationResultClass = 'success';
							$operationResultMessage = 'Your password has been changed.';
							$_SESSION ['OPERATION_RESULT'] = array (
									'class' => $operationResultClass,
									'message' => $operationResultMessage 
							);
							$userForgetPasswordRequest->delete ();
							$this->render ( 'resetPassword', array (
									'status' => 'success' 
							) );
						} else {
							$operationResultClass = 'error';
							$operationResultMessage = 'Can not update.';
							$_SESSION ['OPERATION_RESULT'] = array (
									'class' => $operationResultClass,
									'message' => $operationResultMessage 
							);
							$this->render ( 'resetPassword', array (
									'userLogin' => $userLogin,
									'status' => $userForgetPasswordRequest->status 
							) );
						}
					}
				} else {
					$userLogin = $userForgetPasswordRequest->user_login;
					$this->render ( 'resetPassword', array (
							'userLogin' => $userLogin,
							'status' => $userForgetPasswordRequest->status 
					) );
				}
			} else {
				throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
						'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
				) ) );
			}
		} else {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
	}
}