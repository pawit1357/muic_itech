<?php
class RoomUtil {
	public static function getRoomHasEquipmentType($equipmentType){
		$roomIds = array();
		if($equipmentType != '') {
			$roomEquipments = RoomEquipment::model()->with('equipment')->findAll(array('condition'=>"equipment.equipment_type_id = '".$equipmentType."'"));
			if(count($roomEquipments) <= 0) {
				$hasEquipment = false;
			}
			foreach($roomEquipments as $roomEquipment) {
				if(!in_array($roomEquipment->room_id, $roomIds)){
					$roomIds[count($roomIds)] = $roomEquipment->room_id;
				}
			}
		}
		return $roomIds;
	}
	public static function getRoomByEquipment($equipment){
		//$roomEquipment = 	
	
	}
}
?>