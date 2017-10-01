<?php
if(UserLoginUtil::isLogin()) {

	if($datas != null) {
		echo '<select name="equipment_type" id="equipment_type" onchange="changeEquipmentType()">';
		echo '<option value="">-Select-</option>';
		foreach($datas as $data) {
			echo '<option value="'.$data->id.'">'.$data->name.'</option>';
		}
		echo '</select>';
	}
}

?>