<?php
if (UserLoginUtil::isLogin ()) {
	
	if ($datas != null) {
		// echo '<h3>'.$typeOfEvent.'</h3>';
		
		echo '<select name="equipment_type_list_id" id="equipment_type_list_id" onchange="changeEquipmentRemain()">';
		switch ($typeOfEvent) {
			case "1" :
			case "2" :
			case "3" :
			case "4" :
				break;
			default :
				echo '<option value="">-Detail-</option>';
				break;
		}
		foreach ( $datas as $data ) {
			echo '<option value="' . $data->id . '">' . $data->name . '</option>';
		}
		echo '</select>';
	}
}

?>