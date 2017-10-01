<?php
class CommonUtil {
	
	public static function convertModelToArray($models) {
		if (is_array($models))
			$arrayMode = TRUE;
		else {
			$models = array($models);
			$arrayMode = FALSE;
		}
	
		$result = array();
		foreach ($models as $model) {
			$attributes = $model->getAttributes();
			$relations = array();
			foreach ($model->relations() as $key => $related) {
				if ($model->hasRelated($key)) {
					$relations[$key] = convertModelToArray($model->$key);
				}
			}
			$all = array_merge($attributes, $relations);
	
			if ($arrayMode)
				array_push($result, $all);
			else
				$result = $all;
		}
		return $result;
	}
	
	public static function IsNullOrEmptyString($question) {
		return (! isset ( $question ) || trim ( $question ) === '');
	}
	public static function getPeriod($periodId) {
		$Period = Period::model ()->findByPk ( $periodId );
		return $Period->name;
	}
	public static function getPeriodId($hour, $min) {
		$id = "";
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		$sql = "SELECT id FROM " . ConfigUtil::getDbName () . ".period where " . $hour . " >= start_hour and " . $min . " >=start_min and " . $hour . " <= end_hour and " . $min . "<=end_min and period_group_id=1";
		$result = mysql_query ( $sql );
		if ($result = mysql_query ( $sql )) {
			while ( $item = mysql_fetch_assoc ( $result ) ) {
				$id = $item ['id'];
			}
			if (CommonUtil::IsNullOrEmptyString ( $id )) {
				$id = 1;
			}
		} else {
			print mysql_error ();
		}

		return $id;
	}
	public static function getEquipmentList($request_booking_id) {
		$listName = "";
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		$sql = "SELECT t2.name as name FROM " . ConfigUtil::getDbName () . ".request_booking_equipment_type t1," . ConfigUtil::getDbName () . ".equipment_type t2 WHERE t1.equipment_type_id =t2.id and t1.request_booking_id = '" . $request_booking_id . "'";

		if ($result = mysql_query ( $sql )) {
			while ( $item = mysql_fetch_assoc ( $result ) ) {
				$listName = $item ['name'] . "," . $listName;
			}
		} else {
			print mysql_error ();
		}

		return substr ( $listName, 0, - 1 );
	}
	public static function getDocumentNo() {
		$borrows = RequestBorrow::model ()->findAll ();

		return sprintf ( '%d%2$08d', substr ( date ( 'Y' ), 2, 2 ), (count ( $borrows ) + 1) );
	}
	public static function getEquipmentTypeName($id) {
		$equipmentType = EquipmentType::model ()->findByPk ( $id );
		return $equipmentType->name;
	}
	public static function generateBorrowApproveLink($id) {
	}
	public static function generateBorrowDisapproveLink($id) {
	}
	public static function isEmpty($str) {
		if ($str == null || $str == '' || $str == 'null') {
			return true;
		} else {
			return false;
		}
	}
	public static function getBorrowStatusCode($code) {
		if (UserLoginUtil::isLogin ()) {
			return (strpos ( $code, 'R_B_NEW_WAIT_APPROVE_1' ) !== false) || (strpos ( $code, 'R_B_NEW_WAIT_APPROVE_2' ) !== false) || (strpos ( $code, 'R_B_NEW_WAIT_APPROVE_3' ) !== false);
		} else {
			return false;
		}
	}
	public static function getUsedEquipment($equipmentTypeId, $request_date, $start, $end) {
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		list ( $_d, $_m, $_y ) = explode ( '-', $request_date );
		$request_date = $_y . '-' . $_m . '-' . $_d;
		$count = 0;
		if ($request_date != "--") {
			
			//CON#1
// 			$sql = "SELECT sum(t1.quantity) as icount
// 					FROM request_booking_equipment_type t1 left join equipment_type t2 on t1.equipment_type_id = t2.id
// 					where request_booking_id in(select id from request_booking
// 					where status_code != 'REQUEST_COMPLETED'
// 					AND status_code != 'REQUEST_CANCEL' and  '" . $request_date . "' = date(request_date) and '" . $end . "' <= period_end
// 							and request_booking_type_id=3)
// 							and t1.equipment_type_id='" . $equipmentTypeId . "'
// 									group by equipment_type_id";
			
			$sql = "select sum(t2.quantity) as icount  
					from request_booking t1 left join request_booking_equipment_type t2 on t1.id	= t2.request_booking_id 
					where t1.status_code not in('REQUEST_COMPLETED','REQUEST_CANCEL') 
					and t2.equipment_type_id='" . $equipmentTypeId . "' 
					and '" . $request_date . "' = date(t1.request_date) and '" . $end . "' between t1.period_start and t1.period_end  and t1.request_booking_type_id=3";
			
			
			
// 						echo ':::' . $sql . '<br><br>';
						
			$result = mysql_query ( $sql );
			$count = 0;
			while ( $item = mysql_fetch_assoc ( $result ) ) {
				$count = $item ['icount'];
			}
		}

		return $count;
	}
	public static function getEdtechEquipRemain($equipmentTypeId, $recieveDate) {
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		list ( $_d, $_m, $_y ) = explode ( '-', $recieveDate );
		$recieveDate = $_y . '-' . $_m . '-' . $_d;

		$count = 0;
		if ($recieveDate != "--") {
			// 			$sql = "select sum(quantity) as icount from request_borrow_equipment_type where request_borrow_id in(
			// 				select id from request_borrow
			// 				where status_code not in('R_B_NEW_RETURNED','R_B_NEW_CANCELLED','R_B_NEW_DISAPPROVE') and '" . $recieveDate . "' >= date(thru_date)
			// 						) and equipment_type_list_id='" . $equipmentTypeId . "'";
			$sql = "select sum(e.quantity) as icount from request_borrow b left join request_borrow_equipment_type e on b.id = e.request_borrow_id
					where status_code not in('R_B_NEW_RETURNED','R_B_NEW_CANCELLED','R_B_NEW_DISAPPROVE','R_B_DO_NOT_RECEIVE') and e.equipment_type_list_id='" . $equipmentTypeId . "'  and '" . $recieveDate . "' between  date(b.from_date) and date(b.thru_date)";
			
// 			$sql = "select sum(e.quantity) as icount from request_borrow b left join request_borrow_equipment_type e on b.id = e.request_borrow_id
// 					where status_code not in('R_B_NEW_RETURNED','R_B_NEW_CANCELLED','R_B_NEW_DISAPPROVE','R_B_DO_NOT_RECEIVE') and e.equipment_type_list_id='" . $equipmentTypeId . "'  and  date(b.thru_date) = '" . $recieveDate . "'";
			
			
			//echo $sql;
			$result = mysql_query ( $sql );

			while ( $item = mysql_fetch_assoc ( $result ) ) {
				$count = $item ['icount'];
			}
		}

		return $count;
	}
	public static function getEdtechEquipTotal($equipmentTypeId) {
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		$sql = "SELECT count(id) as icount FROM equipment where status='A' and equipment_type_list_id=" . $equipmentTypeId;

		// echo $sql;
		$result = mysql_query ( $sql );
		$count = 0;
		while ( $item = mysql_fetch_assoc ( $result ) ) {
			$count = $item ['icount'];
		}
		return $count;
	}
	public static function getCountOfEquipmentById($id, $roomId) {
		mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
		mysql_select_db ( ConfigUtil::getDbName () );

		$sql = "SELECT count(id) as icount FROM equipment where status='A' and room_id='" . $roomId . "' and equipment_type_id='" . $id . "'";

		$result = mysql_query ( $sql );
		$count = 0;

		while ( $item = mysql_fetch_assoc ( $result ) ) {
			$count = $item ['icount'];
		}

		return $count;
	}
	//for i-booking (Meeting/Activity)
	public static function getAviable($avail, $roomId, $request_date, $start, $end) {
		if (UserLoginUtil::isLogin ()) {

			$total = CommonUtil::getCountOfEquipmentById ( $avail, $roomId );
			
			$use =  CommonUtil::getUsedEquipment ( $avail, $request_date, $start, $end );
// 			echo $use.'<br>';
			$remain = $total - $use;

			$data .= '<input type="hidden" id="hTotal_' . $avail . '" value="' . $total . '"/><input type="hidden" id="hRemain_' . $avail . '" value="' . $remain . '"/>';
			$data .= '<input type="text" readonly="readonly" id="qtys_' . $avail . '" name="qtys[' . $avail . ']" value="1"> Available  : <label id="lbEquipItemRemain_' . $avail . '"> ' . ($remain) . '</label>/' . $total;

			return $data;
		} else {
			return false;
		}
	}

	public function countQuantity($items,$_eTypeId)
	{
		//count equipment_type_list_id
		$count = 0;
		foreach ( $items as $eId => $eTypeId ) {
			if($eTypeId ==$_eTypeId ){
				$count++;
			}
		}
		return $count;
	}
}
?>