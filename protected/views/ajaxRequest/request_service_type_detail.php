<?php 
if(UserLoginUtil::isLogin()) {
	if($datas != null) {
		echo '<select name="service_type_detail" id="service_type_detail">';
		echo '<option value="">-Detail-</option>';
		foreach($datas as $data) {
			echo '<option value="'.$data->id.'">'.$data->name.'</option>';
		}
		echo '</select>';
	}
}
?>