<?php 
if(UserLoginUtil::isLogin()) {
	if($checked == 'true'){
		echo '<div><input type="text" name="RequestService[other_service_type]"></div>';
	} else {
		echo ' ';
	}
}
?>