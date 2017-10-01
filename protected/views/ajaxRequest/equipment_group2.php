<?php
if(UserLoginUtil::isLogin()) {

	if($datas != null) {
		echo '<select name="Equipment[equipment_type_list_id]" id="equipment_type_list_id">';
		foreach($datas as $data) {
			echo '<option value="'.$data->id.'">'.$data->name.'</option>';
		}
		echo '</select>';
	}
}

?>