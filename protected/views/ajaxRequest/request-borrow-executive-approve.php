<?php 
if(UserLoginUtil::isLogin()) {
	if($location == 'WITHOUT_MUIC'){
		echo '<div><input type="text" name="RequestBorrow[approve_by]" id="approve_by"></div>';
		echo '<div style="font-size:10px;">**The equipment to be used without MUIC must be approved by executive.</div>';
	} else {
		echo ' ';
	}
}
?>