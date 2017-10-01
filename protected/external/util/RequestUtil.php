<?php
class RequestUtil {
	public static function getAllRequestServiceTypeName($requestId) {
		$requestServiceDetails = RequestServiceDetail::model ()->findAll ( array (
				'condition' => "request_service_id = '" . $requestId . "'" 
		) );
		foreach ( $requestServiceDetails as $requestServiceDetail ) {
			if ($requestServiceDetail->request_service_type_detail_id != null) {
				$requestServiceTypeDetail = RequestServiceTypeDetail::model ()->findByPk ( $requestServiceDetail->request_service_type_detail_id );
				if (isset ( $requestServiceTypeDetail )) {
					$str = $str . $requestServiceTypeDetail->name . ', ';
				}
			} else {
				$str = $str . $requestServiceDetail->description . ', ';
			}
		}
		if (strlen ( $str ) > 2) {
			$str = substr ( $str, 0, strlen ( $str ) - 2 );
		}
		return $str;
	}
	public static function getRoomHasEquipment($equipmentTypeId) {
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );
		
		$sql = "SELECT DISTINCT room.id as r_id FROM equipment INNER JOIN room ON equipment.room_id = room.id INNER JOIN equipment_type ON equipment.equipment_type_id = equipment_type.id WHERE equipment_type.id='" . $equipmentTypeId . "'";
		// echo $sql;
		$result = mysql_query ( $sql );
		$count = 0;
		$roomIds = "(-1, ";
		while ( $item = mysql_fetch_assoc ( $result ) ) {
			$roomIds = $roomIds . $item ['r_id'] . ", ";
		}
		$roomIds = substr ( $roomIds, 0, strlen ( $roomIds ) - 2 ) . ")";
		return $roomIds;
	}
	public static function getUnavailableSpecifyRoom($date, $timeStart, $timeEnd, $dayInWeek, $semesterId) {
		$roomIds = array ();
		$condition = '';
		
		if ($date != '') {
			/**
			 * non semester input;; has date, timeStart, timeEnd*
			 */
			// chk non semester
			if ($timeStart != '') {
				$periodCondition = "(" . $timeStart . " between t.period_start and t.period_end or " . $timeEnd . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $timeStart . " AND " . $timeEnd . " OR t.period_end BETWEEN " . $timeStart . " AND " . $timeEnd . ") AND";
			}
			$conditionNonSemesterFindNonSemester = "(" . $timeStart . " between t.period_start and t.period_end or " . $timeEnd . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $timeStart . " AND " . $timeEnd . " OR t.period_end BETWEEN " . $timeStart . " AND " . $timeEnd . ") AND" . " t.request_date = '" . $date . "' AND t.request_booking_type_id != 2";
			// chk semester
			$dayOfWeek = date ( 'w', strtotime ( $date ) );
			$conditionNonSemesterFindSemester = "(" . $timeStart . " between t.period_start and t.period_end or " . $timeEnd . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $timeStart . " AND " . $timeEnd . " OR t.period_end BETWEEN " . $timeStart . " AND " . $timeEnd . ") AND" . " t.request_day_in_week = '" . $dayOfWeek . "' AND '" . $date . "' BETWEEN semester.start_date AND semester.end_date AND t.request_booking_type_id = 2";
			
			$condition = "((" . $conditionNonSemesterFindNonSemester . ") OR (" . $conditionNonSemesterFindSemester . "))";
		} else {
			/**
			 * semester input;; has timeStart, timeEnd, dayInweek, semesterId *
			 */
			// chk non semester
			$semester = Semester::model ()->findAllByPk ( $semesterId );
			$conditionSemesterFindNonSemester = "(" . $timeStart . " between t.period_start and t.period_end or " . $timeEnd . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $timeStart . " AND " . $timeEnd . " OR t.period_end BETWEEN " . $timeStart . " AND " . $timeEnd . ") AND DAYOFWEEK(t.request_date) = '" . $dayInWeek . "' AND t.request_date between '" . $semester->start_date . "' AND '" . $semester->end_date . "' AND t.request_booking_type_id != 2";
			// chk semester
			$conditionSemesterFindSemester = "(" . $timeStart . " between t.period_start and t.period_end or " . $timeEnd . " between t.period_start and t.period_end OR t.period_start BETWEEN " . $timeStart . " AND " . $timeEnd . " OR t.period_end BETWEEN " . $timeStart . " AND " . $timeEnd . ") and t.request_day_in_week = '" . $dayInWeek . "' AND t.semester_id = '" . $semesterId . "' AND t.request_booking_type_id = 2";
			
			$condition = "((" . $conditionSemesterFindNonSemester . ") OR (" . $conditionSemesterFindSemester . "))";
		}
		$oDBC = new CDbCriteria ();
		$oDBC->select = '*';
		$oDBC->join = 'LEFT OUTER JOIN semester semester ON t.semester_id = semester.id';
		$oDBC->condition = $condition;
		
		$requestBookings = RequestBooking::model ()->findAll ( $oDBC );
		
		foreach ( $requestBookings as $requestBooking ) {
			if (! in_array ( $requestBooking->room_id, $roomIds )) {
				$roomIds [count ( $roomIds )] = $requestBooking->room_id;
			}
		}
		return $roomIds;
	}
	public static function getRequestBookingByDateAndRoom($date, $roomId) {
		$roomIds = array ();
		$condition = '';
		
		if ($date != '') {
			/**
			 * non semester input;; has date, timeStart, timeEnd*
			 */
			// chk non semester
			
			$conditionNonSemesterFindNonSemester = "t.request_date = '" . $date . "' AND t.request_booking_type_id != 2";
			// chk semester
			$dayOfWeek = date ( 'w', strtotime ( $date ) );
			$dayOfWeek = ($dayOfWeek + 1);
			$conditionNonSemesterFindSemester = "t.request_day_in_week = '" . $dayOfWeek . "' AND '" . $date . "' BETWEEN semester.start_date AND semester.end_date AND t.request_booking_type_id = 2";
			
			$condition = "((" . $conditionNonSemesterFindNonSemester . ") OR (" . $conditionNonSemesterFindSemester . ")) AND t.room_id=" . $roomId;
		}
		$oDBC = new CDbCriteria ();
		$oDBC->select = '*';
		$oDBC->join = 'LEFT OUTER JOIN semester semester ON t.semester_id = semester.id';
		$oDBC->condition = $condition;
		
		$requestBookings = RequestBooking::model ()->findAll ( $oDBC );
		
		return $requestBookings;
	}
	public static function getRequestBookingEquipmentNames($id) {
		$equipments = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id='" . $id . "'" 
		) );
		if (isset ( $equipments )) {
			$eq = '';
			foreach ( $equipments as $equipment ) {
				$eq = $eq . $equipment->equipment_type_list->name . ', ';
			}
			$eq = substr ( $eq, 0, strlen ( $eq ) - 2 );
			return $eq;
		}
	}
	public static function hasRequestBookingActivityFile($id) {
		$requestBookingAcivityDetail = RequestBookingActivityDetail::model ()->findByPk ( $id );
		if (isset ( $requestBookingAcivityDetail )) {
			if ($requestBookingAcivityDetail->file_path != '') {
				return true;
			}
		}
		return false;
	}
	public static function getActivityFilePath($id) {
		$requestBookingAcivityDetail = RequestBookingActivityDetail::model ()->findByPk ( $id );
		if (isset ( $requestBookingAcivityDetail )) {
			if ($requestBookingAcivityDetail->file_path != '') {
				return $requestBookingAcivityDetail->file_path;
			}
		}
		return '#';
	}
	public static function hasRequestServiceFile($id) {
		$requestService = RequestService::model ()->findByPk ( $id );
		if (isset ( $requestService )) {
			if ($requestService->file_path != '') {
				return true;
			}
		}
		return false;
	}
	public static function getRequestServiceFilePath($id) {
		$requestService = RequestService::model ()->findByPk ( $id );
		if (isset ( $requestService )) {
			if ($requestService->file_path != '') {
				return $requestService->file_path;
			}
		}
		return '#';
	}
	public static function getMaxEquipmentType($id) {
		$dbCommand = Yii::app ()->db->createCommand ( "
				SELECT COUNT(*) as count FROM `equipment` where `room_id` = '7' AND `equipment_type_id` = '" . $id . "'" );
		
		$data = $dbCommand->queryAll ();
		return $data [0] ['count'];
	}
	public static function getCurrentEquipmentTypeUse($id, $date) {
		$sql = "SELECT SUM(b.quantity) as sum_item FROM `request_borrow` a inner join `request_borrow_equipment_type` b on a.id = b.request_borrow_id where b.equipment_type_id = '" . $id . "' AND a.status_code NOT IN ('REQUEST_BORROW_COMPLETED', 'REQUEST_BORROW_CANCELLED')";
		$dbCommand = Yii::app ()->db->createCommand ( $sql );
		
		$data = $dbCommand->queryAll ();
		if ($data [0] ['sum_item'] != '') {
			return $data [0] ['sum_item'];
		} else {
			return 0;
		}
	}
	public static function deleteAllRequestLinkKey($id) {
		RequestBorrowApproveLink::model ()->deleteAll ( array (
				'condition' => "request_borrow_id='" . $id . "'" 
		) );
	}
	public static function sendApproveLink($id, $nextApproveId) {
		$requestBorrow = RequestBorrow::model()->findByPk($id);
		$key = md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) );
		$requestBorrowId = $id;
		$createDate = date ( 'Y-m-d H:i:s' );
		$status = "ACTIVE";
		
		$requestBorrowApproveLink = new RequestBorrowApproveLink ();
		$requestBorrowApproveLink->request_key = $key;
		$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
		$requestBorrowApproveLink->create_date = $createDate;
		$requestBorrowApproveLink->status = $status;
		
		if ($requestBorrowApproveLink->save ()) {			
			$content = MailUtil::getApproveMailContent ( $key, $requestBorrow );
			$nextApproveUser = UserLogin::model ()->findByPk ( $nextApproveId );
			MailUtil::sendMail ( $nextApproveUser->email, 'Support AV-Online, Approve Request Booking', $content );
		}
	}
}
?>