<?php 

 $ldap_server = "ldap://10.27.101.102"; 
 $ldap_domain = "@sky.local"; 
 
 $auth_user = $_GET['user'].$ldap_domain; // ldap rdn or dn 
 $auth_pass = $_GET['pass']; // associated password 
 
 $base_dn = "OU=MUIC, DC=sky, DC=local"; 

 
 if($auth_user == "" || $auth_pass == "") { 
  echo '<span class="label label-block label-danger">Username หรือ Password ไม่ถูกต้อง</span><br>'; 
 }else{ 
	// connect to server 
	if (!($connect = ldap_connect($ldap_server))) { 
			die("Could not connect to ldap server"); 
	} 
	ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3); 
	// bind to server 
 
	if (!($bind=@ldap_bind($connect, $auth_user, $auth_pass))) { 
			die('<span class="label label-block label-danger">Username หรือ Password ไม่ถูกต้อง</span><br>'); 
	}else{  
  
		/*connect DB Here*/
		$data_profile= GetDBUser($auth_user,$connect);
	  
		if($data_profile) { 
					$_SESSION["USER"] = $_GET['user']; 
					$_SESSION["LEVEL"] = "user"; 
					echo "1"; 
		}  else  { 
				echo '<span class="label label-block label-warning">ยังไม่ได้ลงทะเบียนในระบบโปรดติดต่อเจ้าหน้าที่</span><br>'; 
		} 

		exit(); 
	} 
} 

 unset($connect) ; 
 unset($bind) ; 
 
?>