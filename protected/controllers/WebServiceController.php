<?php
class WebServiceController extends CController {
	public $layout = 'ajax';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
	}
	public function actionGetRequestType() {
		$datas = array ();
		$childs = array ();
		$requestServiceTypes = RequestServiceType::model ()->findAll ();
		if ($requestServiceTypes != null) {
			foreach ( $requestServiceTypes as $requestServiceType ) {
				$datas [count ( $datas )] ['id'] = $requestServiceType->id;
				$datas [count ( $datas )] ['name'] = $requestServiceType->id;
				$datas [count ( $datas )] ['description'] = $requestServiceType->id;
				$requestServiceTypeDetails = RequestServiceTypeDetail::model ()->findAll ( array (
						'condition' => "request_service_type_id = '" . $requestServiceType->id . "'" 
				) );
				if ($requestServiceTypeDetails != null) {
					foreach ( $requestServiceTypeDetails as $requestServiceTypeDetail ) {
						$childs [count ( $childs )] ['id'] = $requestServiceTypeDetail->id;
						$childs [count ( $childs )] ['name'] = $requestServiceTypeDetail->name;
						$childs [count ( $childs )] ['description'] = $requestServiceTypeDetail->description;
					}
				}
				$datas [count ( $datas )] ['child_node'] = $childs;
			}
		}
		echo json_encode ( $datas );
	}
	public function actionGetTimePeriod() {
		$datas = array ();
		$periodGroupId = $_GET ['period_group_id'];
		$periodGroup = PeriodGroup::model ()->findByPk ( $periodGroupId );
		if ($periodGroup != null) {
			$data = array ();
			$data ['period_group_name'] = $periodGroup->name;
			$data ['period_group_description'] = $periodGroup->description;
			$datas [count ( $datas )] = $data;
			$periods = Period::model ()->findAll ( array (
					'condition' => "period_group_id='" . $periodGroupId . "'" 
			) );
			if ($periods != null) {
				foreach ( $periods as $period ) {
					$data = array ();
					$data ['name'] = $period->name;
					$data ['description'] = $period->description;
					$data ['start_hour'] = $period->start_hour;
					$data ['start_min'] = $period->start_min;
					$data ['end_hour'] = $period->end_hour;
					$data ['end_min'] = $period->end_min;
					$data ['status_code'] = $period->status_code;
					$datas [count ( $datas )] = $data;
				}
			}
		}
		echo json_encode ( $datas );
	}
	public function actionGetRoom() {
		$datas = array ();
		$roomType = $_GET ['room_type'];
		$room_group_id = "";
		if ($roomType == "classroom") {
			$room_group_id = '1';
		} else if ($roomType == "meeting") {
			$room_group_id = '2';
		}
		
		$rooms = Room::model ()->findAll ( array (
				'condition' => "room_group_id = '" . $room_group_id . "'" 
		) );
		if ($rooms != null) {
			foreach ( $rooms as $room ) {
				$data = array ();
				$data ['id'] = $room->id;
				$data ['code'] = $room->room_code;
				$data ['name'] = $room->name;
				$data ['description'] = $room->description;
				$datas [count ( $datas )] = $data;
			}
		}
		echo json_encode ( $datas );
	}
	public function actionGetEquipmentInRoom() {
		$datas = array ();
		$roomId = $_GET ['room_id'];
		
		$room = Room::model ()->findAll ( array (
				'condition' => "sky_room_id = '" . $roomId . "'" 
		) );
		if (isset ( $room [0] )) {
			$equipments = Equipment::model ()->findAll ( array (
					'condition' => "room_id = '" . $room [0]->id . "'" 
			) );
			echo CJSON::encode ( CommonUtil::convertModelToArray ( $equipments ) );
		}else{
			return null;
		}
		
	}
	public function actionSubmitRequest() {
		$datas = array ();
		$roomId = $_GET ['room_id'];
		$username = $_GET ['username'];
		$requestDate = $_GET ['request_date'];
		$startTime = $_GET ['start_time'];
		$semester = $_GET ['semester'];
		$endTime = $_GET ['end_time'];
		$equipments = $_GET ['equipments'];
		$requestType = $_GET ['request_type'];
		list ( $s_h, $s_m ) = explode ( '.', $startTime );
		list ( $e_h, $e_m ) = explode ( '.', $endTime );
		$s_h = $s_h + 0;
		$s_m = $s_m + 0;
		$e_h = $e_h + 0;
		$e_m = $e_m + 0;
		$validate = true;
		$message = '';
		if ($validate) {
			if ($username != '') {
				$userLogins = UserLogin::model ()->findAll ( array (
						'condition' => "username = '" . $username . "'" 
				) );
				if ($userLogins != null && count ( $userLogins ) > 0) {
					$userLogin = $userLogins [0];
				} else {
					$validate = false;
					$message = 'User not found.';
				}
			}
		}
		if ($validate) {
			if ($semester != '') {
				list ( $sNumber, $sYear ) = explode ( '-', $semester );
				$semesters = Semester::model ()->findAll ( array (
						'condition' => "semester_number='" . $sNumber . "' and academic_year='" . $sYear . "'" 
				) );
				if ($semesters != null && count ( $semesters ) > 0) {
					$semester = $semesters [0];
				} else {
					if ($requestType == 'semester') {
						$validate = false;
						$message = 'Semester not found.';
					}
				}
			} else {
				if ($requestType == 'semester') {
					$validate = false;
					$message = 'Semester can not be null.';
				}
			}
		}
		if ($validate) {
			if ($requestType != '') {
				if ($requestType == 'daily' || $requestType == 'semester') {
					$periodGroupId = 1;
					if ($requestType == 'daily') {
						if (strtotime ( $requestDate ) > 0) {
							$requestTypeId = '1';
						} else {
							$validate = false;
							$message = 'Wrong request date.';
						}
					} else {
						if ($requestDate >= 1 && $requestDate <= 7) {
							$requestTypeId = '2';
						} else {
							$validate = false;
							$message = 'Wrong request date.';
						}
					}
				} else if ($requestType == 'activity') {
					$periodGroupId = 2;
					if (strtotime ( $requestDate ) > 0) {
						$requestTypeId = '3';
					} else {
						$validate = false;
						$message = 'Wrong request date.';
					}
				}
				$periodStarts = Period::model ()->findAll ( array (
						'condition' => "period_group_id='" . $periodGroupId . "' and start_hour='" . $s_h . "' and start_min='" . $s_m . "'" 
				) );
				$periodEnds = Period::model ()->findAll ( array (
						'condition' => "period_group_id='" . $periodGroupId . "' and end_hour='" . $e_h . "' and end_min='" . $e_m . "'" 
				) );
				if ($periodStarts != null && count ( $periodStarts ) > 0) {
					$periodStart = $periodStarts [0];
				} else {
					$validate = false;
					$message = 'Period start not found.';
				}
				if ($periodEnds != null && count ( $periodEnds ) > 0) {
					$periodEnd = $periodEnds [0];
				} else {
					$validate = false;
					$message = 'Period end not found.';
				}
			} else {
				$validate = false;
				$message = 'Request type can not be null.';
			}
		}
		if ($validate) {
			if ($roomId != '') {
				$room = Room::model ()->findByPk ( $roomId );
				if (! isset ( $room )) {
					$validate = false;
					$message = 'Room not found.';
				}
			} else {
				$validate = false;
				$message = 'Room id can not be null.';
			}
		}
		if ($validate) {
			if ($equipments != '') {
				$message = 'Room ' . $room->name . ' not contain ';
				foreach ( $equipments as $equipment ) {
					$equipments = Equipment::model ()->with ( "equipment_type" )->findAll ( array (
							'condition' => "t.room_id='" . $roomId . "' and equipment_type.name = '" . $equipment . "'" 
					) );
					if ($equipments != null && count ( $equipments ) > 0) {
					} else {
						$validate = false;
						$message = $message . $equipment . ' ';
					}
				}
			}
		}
		if ($validate) {
			$transaction = Yii::app ()->db->beginTransaction ();
			// Add Request
			$requestBooking = new RequestBooking ();
			$requestBooking->user_login_id = $userLogin->id;
			$requestBooking->room_id = $roomId;
			$requestBooking->request_booking_type_id = $requestTypeId;
			if ($requestTypeId == 2) {
				$requestBooking->request_day_in_week = $requestDate;
				$requestBooking->semester_id = $semester->id;
			} else {
				$requestBooking->request_date = $requestDate;
			}
			$requestBooking->period_start = $periodStart->id;
			$requestBooking->period_end = $periodEnd->id;
			$requestBooking->status_code = "REQUEST_APPROVE";
			$requestBooking->create_date = date ( "Y-m-d H:i:s" );
			$validated = true;
			if ($requestBooking->period_end < $requestBooking->period_start) {
				$validate = false;
				$message = 'Wrong period.';
			}
			if ($requestBooking->request_booking_type_id != '2') {
				if ((strtotime ( $requestBooking->request_date . ' ' . DateTimeUtil::getTimeFormat ( $periodStart->start_hour, $periodStart->start_min ) . ':00' )) < (time () + 1800)) {
					$validate = false;
					$message = 'Must booking before start time 30 minutes.';
				}
			}
			$addSuccess = true;
			if ($requestBooking->request_booking_type_id == '2') {
				$condition = "(((" . $requestBooking->period_start . " between t.period_start and t.period_end or " . $requestBooking->period_end . " between t.period_start and t.period_end) AND DAYOFWEEK(t.request_date) = '" . $requestBooking->request_day_in_week . "' and t.request_date between semester.start_date and semester.end_date  OR t.period_start BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . " OR t.period_end BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . ") OR ('" . $requestBooking->semester_id . "' = t.semester_id and (" . $requestBooking->period_start . " between t.period_start AND t.period_end or " . $requestBooking->period_end . " between t.period_start and t.period_end  OR t.period_start BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . " OR t.period_end BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . "))) AND t.room_id = '" . $requestBooking->room_id . "'";
			} else {
				$dayOfWeek = date ( 'w', strtotime ( $requestBooking->request_date ) );
				$condition = "((t.request_date='" . $requestBooking->request_date . "' and (" . $requestBooking->period_start . " between t.period_start and t.period_end or " . $requestBooking->period_end . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . " OR t.period_end BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . ")) OR ('" . $requestBooking->request_date . "' between semester.start_date and semester.end_date and '" . ($dayOfWeek + 1) . "' = t.request_day_in_week AND ((" . $requestBooking->period_start . " between t.period_start and t.period_end or " . $requestBooking->period_end . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . " OR t.period_end BETWEEN " . $requestBooking->period_start . " AND " . $requestBooking->period_end . ") ))) AND '" . $requestBooking->room_id . "' = t.room_id";
			}
			$requestBookings = RequestBooking::model ()->with ( 'semester' )->findAll ( array (
					'condition' => $condition 
			) );
			if (isset ( $requestBookings ) && count ( $requestBookings ) > 0) {
				$validate = false;
				$message = "The request time is not available.";
			}
			if ($validate) {
				if ($requestBooking->save ()) {
					if (isset ( $equipments )) {
						foreach ( $equipments as $equipment ) {
							$equipmentTypeId = $equipment->equipment_type->id;
							$requestBookingEquipmentType = new RequestBookingEquipmentType ();
							$requestBookingEquipmentType->request_booking_id = $requestBooking->getPrimaryKey ();
							$requestBookingEquipmentType->equipment_type_id = $equipmentTypeId;
							if (! $requestBookingEquipmentType->save ()) {
								$addSuccess = false;
								break;
							}
						}
					}
				} else {
					$addSuccess = false;
				}
			}
			if ($addSuccess) {
				$transaction->commit ();
			} else {
				$transaction->rollback ();
			}
		}
		if ($validate && $addSuccess) {
			$datas ['result'] = true;
		} else {
			$datas ['result'] = false;
			$datas ['error_message'] = $message;
		}
		echo json_encode ( $datas );
	}
	
	/*
	 * Register TokenID and check username/password for alert to smartphone
	 */
	public function actionRegister() {
		$datas = array ();
		$username = $_GET ['user'];
		$password = $_GET ['pass'];
		$token_id = $_GET ['token_id'];
		$phone_type = $_GET ['phone_type'];
		
		if (CommonUtil::IsNullOrEmptyString ( $username ) || CommonUtil::IsNullOrEmptyString ( $password ) || CommonUtil::IsNullOrEmptyString ( $token_id ) || CommonUtil::IsNullOrEmptyString ( $phone_type )) {
			$datas ['result'] = false;
			$datas ['error_message'] = "Invalid parameter";
		} else {
			mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
			mysql_select_db ( ConfigUtil::getDbName () );
			
			$sql = "select id,token_id,phone_type from user_login where username='" . $username . "' and password='" . md5 ( $password ) . "'";
			
			$result = mysql_query ( $sql );
			$userId = 0;
			$inTokenId = "";
			while ( $item = mysql_fetch_assoc ( $result ) ) {
				$userId = $item ['id'];
				$inTokenId = $item ['token_id'];
			}
			
			if ($userId > 0 && CommonUtil::IsNullOrEmptyString ( $inTokenId )) {
				$sql = "update user_login set token_id='" . $token_id . "',phone_type='" . $phone_type . "' where id='" . $userId . "'";
				$result = mysql_query ( $sql );
				if ($result) {
					$datas ['result'] = true;
				} else {
					$datas ['result'] = false;
				}
			} else {
				$datas ['result'] = true;
			}
		}
		//
		echo json_encode ( $datas );
	}
	
	/*
	 * iBooking-ShowRequest Service
	 */
	public function actionShowRequest() {
		$datas = array ();
		$curdate = date ( 'Y-m-d' );
		$RequestBookings = RequestBooking::model ()->findAll ( array (
				'condition' => "request_date = '" . $curdate . "'" 
		) );
		if ($RequestBookings != null) {
			foreach ( $RequestBookings as $RequestBooking ) {
				$json_data [] = array (
						"id" => $RequestBooking->id,
						"room_id" => $RequestBooking->room_id,
						"Equipment" => CommonUtil::getEquipmentList ( $RequestBooking->id ),
						"period_start" => CommonUtil::getPeriod ( $RequestBooking->period_start ),
						"period_end" => CommonUtil::getPeriod ( $RequestBooking->period_end ) 
				);
			}
		}
		echo json_encode ( $json_data );
	}
	public function actionSendNotification() {
		$message = $_GET ['message'];
		
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );
		
		$sql = "select * from user_login where role_id in(1,2) and token_id <> '' and status ='ACTIVE'";
		
		$result = mysql_query ( $sql );
		$i = 0;
		$iosDeviceToken = '';
		$androidDeviceToken = '';
		
		while ( $item = mysql_fetch_assoc ( $result ) ) {
			
			$deviceToken = $item ['token_id'];
			$phoneType = $item ['phone_type'];
			
			if ($phoneType == '1') {
				$iosDeviceToken .= $deviceToken . ',';
			} else {
				// $androidDeviceToken = $deviceToken.',';
				$gcm = gcm::getInstance ();
				
				$registatoin_ids = array (
						$deviceToken 
				);
				$message1 = array (
						"price" => $message 
				);
				$resultMsg = $gcm->send_notification ( $registatoin_ids, $message1 );
				echo $resultMsg;
			}
			$i ++;
		}
		/* IOS */
		if (! CommonUtil::IsNullOrEmptyString ( $iosDeviceToken )) {
			return HttpRequestUtil::request ( ConfigUtil::getPushSiteName () . "pushservice/service.php?app_id=" . urlencode ( "0" ) . "&token=" . urlencode ( $iosDeviceToken ) . "&msg=" . urlencode ( $message ) );
		}
		/* ANDRIOD */
		if (! CommonUtil::IsNullOrEmptyString ( $androidDeviceToken )) {
		}
		
		// if($phoneType == '1'){
		
		// echo HttpRequestUtil::request('http://prdapp.net/pushservice/service.php?app_id=0&token='.urlencode($deviceToken).'&msg='.urlencode($message));
		
		// }else
		// {
		// $gcm = gcm::getInstance();
		
		// $registatoin_ids = array($deviceToken);
		// $message1 = array("price" => $message);
		// $resultMsg = $gcm->send_notification($registatoin_ids, $message1);
		// echo $resultMsg;
		
		// }
	}
	public function actionSendMail() {
		MailUtil::sendMail ( 'pawit1357@hotmail.com', 'xxxxx', 'yyyyy' );
	}
	public function actionBorrowEvents() {
		$result = array ();
		
		$date = new DateTime ( date ( "Y-m-d" ) );
		$interval = new DateInterval ( 'P6M' );
		$date->sub ( $interval );
		// echo $date->format ( 'Y-m-d' ) . "\n";
		
		$requests = RequestBooking::model ()->findAll ( array (
// 				'condition' => "request_date ='2016-12-06'"
				'condition' => "request_date >='" . $date->format ( 'Y-m-d' ) . "'" 
		) );
		if ($requests != null) {
			foreach ( $requests as $request ) {
				$datas = array ();
				$datas ['title'] = $request->user_login->email;
				$datas ['description'] = $request->request_booking_type->name;
				$datas ['location'] = $request->room_id;
				$datas ['contact'] = $request->user_login->email;
				// $datas['url'] = 'http://www.muic.mahidol.ac.th/eng/';
				$datas ['start'] = $request->request_date . ' ' . DateTimeUtil::getTimeFormatSplitBySemi ( $request->period_s->start_hour, $request->period_s->start_min );
				$datas ['end'] = $request->request_date . ' ' . DateTimeUtil::getTimeFormatSplitBySemi ( $request->period_e->end_hour, $request->period_e->end_min );
				
				// get equipment list
				
				$reqEquipLits = RequestBookingEquipmentType::model ()->findAll ( array (
						'condition' => "request_booking_id = '" . $request->id . "'" 
				) );
				$a = "<br>---------------<br>";
				$seq =1;
				foreach ( $reqEquipLits as $e ) {
					$a .= $seq.'.'. $e->equipment_type->name."<br>";
					$seq++;
				}
				$a .= "---------------";
				
				$datas ['equipLists'] = $a;
				
				// $datas['allDay']= 'true';
				switch ($request->request_booking_type_id) {
					case 1 : // Daily
						$datas ['backgroundColor'] = '#003300';
						break;
					case 2 : // Activity/Meeting
						$datas ['backgroundColor'] = '#CC6600';
						break;
					case 3 : // Semester
						$datas ['backgroundColor'] = '#003366';
						break;
				}
				
				$result [count ( $result )] = $datas;
			}
		}
		echo json_encode ( $result );
	}
	
	// public function actionSendMailService()
	// {
	// $key = "7Frc6kSp788qPNz2jKlq8";
	
	// $mailTo = $_POST['to'];
	// $subject = $_POST['subject'];
	// $content = $_POST['content'];
	// $checkSum = $_POST['check_sum'];
	
	// $summary = md5($mailTo.$subject.$content.$key);
	// echo '<br>WebService:|'.$mailTo.','.$subject.','.$content.',';
	// if($summary == $checkSum) {
	// if(MailUtil::sendMail($mailTo, $subject, $content)){
	// echo "Send Success.";
	// } else {
	// echo "Send Fail.";
	// }
	// } else {
	// echo "No permission";
	// //echo md5($mailTo.$subject.$content.$key).'<br>';
	// }
	// }
}