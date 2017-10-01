
<?php 
if(UserLoginUtil::isLogin()) {
	if($roomId == ''){
		echo 'Please select room.';
	} else {

		$models = Equipment::model()->findAll(array('condition'=>"room_id='".$roomId."'"));
		$equipementTypes = array();
		if(count($models) > 0){
			echo "<div><table>";
			foreach($models as $model){


				if(!in_array($model->equipment_type->id,$equipementTypes)){

					
					echo '<tr><td><input type="checkbox" name="equipments[]" '.($_SESSION['request_equipment'] == $model->equipment_type->id ? 'checked="checked"' : '').' value="'.$model->equipment_type->id.'"></td><td>'.$model->equipment_type->name.'</td><td>'.CommonUtil::getAviable($model->equipment_type->id,$roomId,$request_date,$start,$end).'</td></tr>';

					$equipementTypes[count($equipementTypes)] = $model->equipment_type->id;
				}

			}
			echo "</table></div>";
				

				
		} else {
			echo "Not found equipment.";
		}

	}
}
?>