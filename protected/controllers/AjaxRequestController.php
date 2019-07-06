<?php
class AjaxRequestController extends CController {
	public $layout = 'ajax';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
	}
	public function actionEquipmentInRoom() {
		$request_date = addslashes ( $_GET ['request_date'] );
		$roomId = addslashes ( $_GET ['room'] );
		$start = addslashes ( $_GET ['Start'] );
		$end = addslashes ( $_GET ['End'] );
		$this->render ( 'equipment_in_room', array (
				'roomId' => $roomId,
				'request_date' => $request_date,
				'start' => $start,
				'end' => $end 
		) );
	}
	public function actionClassroomRequestBooking() {
		$requestType = addslashes ( $_GET ['RequestType'] );
		$this->render ( 'classroom_request_booking', array (
				'requestType' => $requestType 
		) );
	}
	public function actionAvailableClassroomBookingPeriod() {
		$date = addslashes ( $_GET ['Date'] );
		$requestType = addslashes ( $_GET ['RequestType'] );
		$semester = addslashes ( $_GET ['Semester'] );
		$day = addslashes ( $_GET ['Day'] );
		$start = addslashes ( $_GET ['Start'] );
		$end = addslashes ( $_GET ['End'] );
		$this->render ( 'available-classroom-booking-period', array (
				'requestType' => $requestType,
				'date' => $date,
				'start' => $start,
				'end' => $end,
				'semester' => $semester,
				'day' => $day 
		) );
	}
	public function actionRequest() {
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
	public function actionRequestBorrowExecutiveApprove() {
		$location = addslashes ( $_GET ['Location'] );
		$this->render ( 'request-borrow-executive-approve', array (
				'location' => $location 
		) );
	}
	public function actionRequestServiceOther() {
		$checked = addslashes ( $_GET ['checked'] );
		$this->render ( 'request-service-other', array (
				'checked' => $checked 
		) );
	}
	public function actionRoomSchedule() {
		$roomId = addslashes ( $_GET ['room_id'] );
		$month = addslashes ( $_GET ['month'] );
		$year = addslashes ( $_GET ['year'] );
		$this->render ( 'room-schedule', array (
				'roomId' => $roomId,
				'month' => $month,
				'year' => $year 
		) );
	}
	public function actionAvailableRoomSchedule() {
		if (isset ( $_SESSION ['date_filter'] )) {
			$_GET ['date_filter'] = $_SESSION ['date_filter'];
			unset ( $_SESSION ['date_filter'] );
		}
		if (isset ( $_SESSION ['equipment_type_id'] )) {
			$_GET ['equipment_type_id'] = $_SESSION ['equipment_type_id'];
			unset ( $_SESSION ['equipment_type_id'] );
		}
		if (isset ( $_SESSION ['start_period'] )) {
			$_GET ['start_period'] = $_SESSION ['start_period'];
			unset ( $_SESSION ['start_period'] );
		}
		
		// Render
		if (isset ( $_GET ['date_filter'] )) {
			$date = $_GET ['date_filter'];
		} else {
			$date = date ( 'd-m-Y' );
		}
		
		$equipmentTypeId = addslashes ( $_GET ['equipment_type_id'] );
		
		$equipmentType = $_GET ['equipment_type'];
		if ($_GET ['start_period'] != '') {
			$timeStart = $_GET ['start_period'];
		} else {
			$timeStart = 0;
			$timeEnd = 0;
		}
		if ($_GET ['room_id'] != '') {
			$roomId = $_GET ['room_id'];
		} else {
			unset ( $roomId );
		}
		
		if (isset ( $_GET ['end_period'] )) {
			$timeEnd = $_GET ['end_period'];
			if ($timeStart == 0) {
				$timeEnd = 0;
			}
		} else {
			$timeEnd = $timeStart;
		}
		
		if ($equipmentType != '') {
			$_SESSION ['request_equipment'] = $equipmentType;
		} else {
			unset ( $_SESSION ['request_equipment'] );
		}
		if ($date != '') {
			$_SESSION ['request_date'] = $date;
		} else {
			unset ( $_SESSION ['request_date'] );
		}
		if ($timeStart != '') {
			$_SESSION ['request_time_start'] = $timeStart;
		} else {
			unset ( $_SESSION ['request_time_start'] );
		}
		if ($timeEnd != '') {
			$_SESSION ['request_time_end'] = $timeEnd;
		} else {
			unset ( $_SESSION ['request_time_end'] );
		}
		
		if (date != '') {
			$date = DateTimeUtil::convertDateFormat ( $date, 'yyyy-mm-dd' );
		}
		$condition = "status='A' and room_group_id = 1";
		$unavailableSpecifyRoomIds = RequestUtil::getUnavailableSpecifyRoom ( $date, $timeStart, $timeEnd, null, null );
		if (count ( $unavailableSpecifyRoomIds ) > 0) {
			$exceptRoomId = '(';
			foreach ( $unavailableSpecifyRoomIds as $unavailableSpecifyRoomId ) {
				$exceptRoomId = $exceptRoomId . $unavailableSpecifyRoomId . ', ';
			}
			$exceptRoomId = substr ( $exceptRoomId, 0, strlen ( $exceptRoomId ) - 2 );
			$exceptRoomId = $exceptRoomId . ')';
			$condition = $condition . ' AND id not in ' . $exceptRoomId;
		}
		if (isset ( $roomId )) {
			$condition = $condition . " AND id = '" . $roomId . "'";
		}
		if (isset ( $equipmentTypeId ) && $equipmentTypeId != '') {
			$rs = RequestUtil::getRoomHasEquipment ( $equipmentTypeId );
			$condition = $condition . " AND id IN " . $rs;
		}
		// echo $condition;
		$model = Room::model ()->findAll ( array (
				'condition' => $condition 
		) );
		
		$this->render ( 'available-room-schedule', array (
				'data' => $model,
				'date' => $date 
		) );
	}
	public function actionAvailableRoomScheduleMeeting() {
		// Render
		if (isset ( $_GET ['date_filter'] )) {
			$date = $_GET ['date_filter'];
		} else {
			$date = date ( 'd-m-Y' );
		}
		$equipmentTypeId = addslashes ( $_GET ['equipment_type_id'] );
		$equipmentType = $_GET ['equipment_type'];
		if ($_GET ['start_period'] != '') {
			$timeStart = $_GET ['start_period'];
		} else {
			$timeStart = 0;
			$timeEnd = 0;
		}
		if ($_GET ['room_id'] != '') {
			$roomId = $_GET ['room_id'];
		} else {
			unset ( $roomId );
		}
		
		if (isset ( $_GET ['end_period'] )) {
			$timeEnd = $_GET ['end_period'];
			if ($timeStart == 0) {
				$timeEnd = 0;
			}
		} else {
			$timeEnd = $timeStart;
		}
		
		if ($equipmentType != '') {
			$_SESSION ['request_equipment'] = $equipmentType;
		} else {
			unset ( $_SESSION ['request_equipment'] );
		}
		if ($date != '') {
			$_SESSION ['request_date'] = $date;
		} else {
			unset ( $_SESSION ['request_date'] );
		}
		if ($timeStart != '') {
			$_SESSION ['request_time_start'] = $timeStart;
		} else {
			unset ( $_SESSION ['request_time_start'] );
		}
		if ($timeEnd != '') {
			$_SESSION ['request_time_end'] = $timeEnd;
		} else {
			unset ( $_SESSION ['request_time_end'] );
		}
		
		if (date != '') {
			$date = DateTimeUtil::convertDateFormat ( $date, 'yyyy-mm-dd' );
		}
		$condition = "status='A' and room_group_id = 2";
		$unavailableSpecifyRoomIds = RequestUtil::getUnavailableSpecifyRoom ( $date, $timeStart, $timeEnd, null, null );
		if (count ( $unavailableSpecifyRoomIds ) > 0) {
			$exceptRoomId = '(';
			foreach ( $unavailableSpecifyRoomIds as $unavailableSpecifyRoomId ) {
				$exceptRoomId = $exceptRoomId . $unavailableSpecifyRoomId . ', ';
			}
			$exceptRoomId = substr ( $exceptRoomId, 0, strlen ( $exceptRoomId ) - 2 );
			$exceptRoomId = $exceptRoomId . ')';
			$condition = $condition . ' AND id not in ' . $exceptRoomId;
		}
		if (isset ( $roomId )) {
			$condition = $condition . " AND id = '" . $roomId . "'";
		}
		if (isset ( $equipmentTypeId ) && $equipmentTypeId != '') {
			$rs = RequestUtil::getRoomHasEquipment ( $equipmentTypeId );
			$condition = $condition . " AND id IN " . $rs;
		}
		// echo $condition;
		$model = Room::model ()->findAll ( array (
				'condition' => $condition 
		) );
		$this->render ( 'available-room-schedule-meeting', array (
				'data' => $model,
				'date' => $date 
		) );
	}
	public function actionSetBookingAttr() {
		$roomId = addslashes ( $_GET ['room_id'] );
		$periodStart = addslashes ( $_GET ['period_start'] );
		$periodEnd = addslashes ( $_GET ['period_end'] );
		$requestDate = addslashes ( $_GET ['request_date'] );
		$type = addslashes ( $_GET ['type'] );
		$this->render ( 'booking-attr', array (
				'type' => $type,
				'roomId' => $roomId,
				'periodStart' => $periodStart,
				'periodEnd' => $periodEnd,
				'requestDate' => $requestDate 
		) );
	}
	public function actionRequestServiceTypeDetail() {
		$id = addslashes ( $_GET ['id'] );
		$datas = RequestServiceTypeDetail::model ()->findAll ( array (
				'condition' => "request_service_type_id='" . $id . "'" 
		) );
		$this->render ( 'request_service_type_detail', array (
				'datas' => $datas 
		) );
	}
	public function actionRequestEquipmentTypeList() {
		$id = addslashes ( $_GET ['id'] );
		$typeOfEvent = addslashes ( $_GET ['typeOfEvent'] );
		
		$datas = EquipmentTypeList::model ()->findAll ( array (
				'condition' => "equipment_type_id='" . $id . "' and status='A'" 
		) );
		// echo "equipment_type_id='".$id."'";
		
		// foreach ($datas as $equipTypeList){
		// //������
		// $equipments = Equipment::model()->findAll(array('condition'=>"(room_id in (2)) and equipment_type_list_id = '".$equipTypeList->id."'"));
		// $used = 0;
		// $requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"equipment_type_list_id = '".$equipTypeList->id."'"));
		// if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0 ) {
		// //Find Status of this item is reutrned,disapprove,cancelled
		// foreach ($requestBorrowEquipmentTypes as $tmp){
		// $requestBorrows = RequestBorrow::model()->findAll(array('condition'=>"status_code not in('R_B_NEW_RETURNED','R_B_NEW_CANCELLED','R_B_NEW_DISAPPROVE_1','R_B_NEW_DISAPPROVE_2','R_B_NEW_DISAPPROVE_3') and id='".$tmp->request_borrow_id."'"));
		// if($requestBorrows != null && count($requestBorrows) > 0 ) {
		// $used = $used + $tmp->quantity;
		// }
		// }
		// }
		
		// $equipTypeList->remain = (count($equipments)-$used);
		// }
		
		$this->render ( 'request_equipment_type_list', array (
				'datas' => $datas,
				'typeOfEvent' => $typeOfEvent 
		) );
	}
	public function actionChageEquipmentTypeListByTypeOfEvent() {
		$id = addslashes ( $_GET ['id'] );
		
		// FAA Student,Student,Lecturer
		if ($id == 6 || $id == 7 || $id == 8) {
			$datas = EquipmentType::model ()->findAll ( array (
					'condition' => "id in(11,12,14,15,16,17,18,21,23,25,26,28,29,30,31,32)" 
			) );
			$this->render ( 'equipment_type_list', array (
					'datas' => $datas 
			) );
		} else {
			
			$datas = EquipmentType::model ()->findAll ( array (
					'condition' => "id in(1,2,3,4,5,6,7,8,9,10)" 
			) );
			
			$this->render ( 'equipment_type_list', array (
					'datas' => $datas 
			) );
		}
	}
	public function actionChageEquipmentTypeListByType() {
		$id = $_GET ['id'] ;
		$equipment_type_id =  $_GET ['equipment_type_id'] ;
		
// 		return $equipment_type_id;
		
		
		if (!self::IsNullOrEmptyString( $equipment_type_id )) {
			$datas = EquipmentTypeList::model ()->findAll ( array (
					'condition' => "equipment_type_id=" . $id . " and id=" . $equipment_type_id 
			) );
			$this->render ( 'equipment_group2', array (
					'datas' => $datas
			) );
		} else {
			$datas = EquipmentTypeList::model ()->findAll ( array (
					'condition' => "equipment_type_id=" . $id 
			) );
			$this->render ( 'equipment_group', array (
					'datas' => $datas
			) );
		}
		

	}
	
	function IsNullOrEmptyString($question){
		return (!isset($question) || trim($question)==='');
	}
	
	
	public function actionEquipmentRemain() {
		$tmp = addslashes ( $_GET ['id'] );
		list ( $id, $recieveDate ) = explode ( ',', $tmp );
		
		// Find only equipment in room 5314-FAA Division and 7-Ed-Tech office
		$equipments = Equipment::model ()->findAll ( array (
				'condition' => "(room_id in (7,5314)) and status='A' and equipment_type_list_id = '" . $id . "'" 
		) );
		$used = CommonUtil::getEdtechEquipRemain ( $id, $recieveDate );
		// echo "xxxxxx<br>"."(room_id in (7,5314)) and status='A' and equipment_type_list_id = '".$id."'";
		echo ' Available  : <label id="lbEquipItemRemain"> ' . (count ( $equipments ) - $used) . '</label><input type="hidden" id="equipmentItemRemain" value="' . (count ( $equipments ) - $used) . '">/' . count ( $equipments );
	}
	public function actionEquipmentImage() {
		$_id = addslashes ( $_GET ['id'] );
		
		$equipment = Equipment::model ()->findByPk ( $tmp );
		// $equipment->img_path = '/itech/images/attach.jpg';//
		
		// update av_itech.equipment set img_path = CONCAT('/images_equipment/', equipment_type_list_id,'.png') where room_id=5314;
		
		$criteria = new CDbCriteria ();
		$criteria->condition = "equipment_type_list_id = '" . $_id . "'";
		$equipments = Equipment::model ()->findAll ( $criteria );
		
		if (isset ( $equipments ) && count ( $equipments ) > 0) {
			echo $equipment . '<img src="/itech' . $equipments [0]->img_path . '" width="100%"; height="100%"; />';
		} else {
			echo 'No Image.';
		}
	}
	public function actionUpload() {
		
		// A list of permitted file extensions
		$allowed = array (
				'png',
				'jpg',
				'gif',
				'zip' 
		);
		if (isset ( $_FILES ['upl'] ) && $_FILES ['upl'] ['error'] == 0) {
			$extension = pathinfo ( $_FILES ['upl'] ['name'], PATHINFO_EXTENSION );
			if (! in_array ( strtolower ( $extension ), $allowed )) {
				echo '{"status":"error"}';
				exit ();
			}
			if (move_uploaded_file ( $_FILES ['upl'] ['tmp_name'], 'uploads/' . $_FILES ['upl'] ['name'] )) {
				echo '{"status":"success"}';
				exit ();
			}
		}
		echo '{"status":"error"}';
		exit ();
	}
	public function actionGetEquipmentDetailByBarcode() {
		$id = addslashes ( $_GET ['id'] );
		$data = array ();
		if ($id != '') {
			
			$criteria = new CDbCriteria ();
			$criteria->condition = "REPLACE(barcode, ' ', '') = '" . $id . "'";
			$equipments = Equipment::model ()->findAll ( $criteria );
			
			if (isset ( $equipments ) && count ( $equipments ) > 0) {
				
				$data ['c'] = count ( $equipments );
				$equipment = $equipments [0];
				
				$remain = CommonUtil::getEdtechEquipRemain ( $equipment->equipment_type_list_id, date ( 'Y-m-d' ) );
				
				$data ['remain'] = $remain;
				$data ['id'] = $equipment->id;
				$data ['barcode'] = $id;
				$data ['equipment_type_id'] = $equipment->equipment_type->id;
				$data ['equipment_type_name'] = $equipment->equipment_type->name;
				$data ['equipment_type_list_id'] = $equipment->equipment_type_list_id;
				$data ['equipment_type_list_name'] = $equipment->equipment_type_list->name;
			} else {
				$data ['e'] = '';
			}
		} else {
			$data ['e'] = '';
		}
		echo json_encode ( $data );
	}
	public function actionCheckDate() {
		$cd = addslashes ( $_GET ['cd'] );
		$data = array ();
		if ($cd != '') {
			// $data = PeriodGroup::model()->findByPk(1);
			$datas = Holidays::model ()->findAll ( array (
					'condition' => "holiday_date='" . $cd . "'" 
			) );
			if (isset ( $datas ) && count ( $datas ) > 0) {
				$tmp = $datas [0];
				$data ['holiday_desc'] = $tmp->holiday_desc;
			} else {
				$data ['holiday_desc'] = '-';
			}
		} else {
			$data ['holiday_desc'] = '-';
		}
		echo json_encode ( $data );
	}
}