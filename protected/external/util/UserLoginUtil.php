<?php
class UserLoginUtil {
	private static $userPermissions = array ();
	public static function hasPermission($permissionCodes) {
		$userLoginId = self::getUserLoginId ();
		if ($userLoginId == null) {
			return false;
		}
		
		$currentTime = time ();
		// Cache timeout in 5 minites
		$cacheTimeout = (5 * 60 * 1000);
		
		if (self::$userPermissions ['latestUpdateTime'] < ($currentTime - $cacheTimeout)) {
			$userLogin = UserLogin::model ()->with ( 'role' )->findByPk ( $userLoginId );
			$permissions = array ();
			if (isset ( $userLogin->role )) {
				$criteria = new CDbCriteria ();
				$criteria->condition = "role_id = '" . $userLogin->role->id . "'";
				$rolePermissions = RolePermission::model ()->with ( 'permission' )->findAll ( $criteria );
				foreach ( $rolePermissions as $rolePermission ) {
					if (! in_array ( $rolePermission->permission_code, $permissions )) {
						$permissions [count ( $permissions )] = $rolePermission->permission_code;
					}
				}
			}
			self::$userPermissions ['permissions'] = $permissions;
			self::$userPermissions ['latestUpdateTime'] = $currentTime;
		}
		
		$permissions = self::$userPermissions ['permissions'];
		foreach ( $permissionCodes as $permissionCode ) {
			if (in_array ( $permissionCode, $permissions )) {
				return true;
				break;
			}
		}
		
		return false;
	}
	public static function isLogin() {
		return isset ( $_SESSION ['USER_LOGIN_ID'] );
	}
	
	public static function logout() {
		unset ( $_SESSION ['USER_LOGIN_ID'] );
		unset ( $_SESSION ['ROLE_ID'] );
	}
	
	public static function authen($username, $password) {
		
		$ldap_server = "ldap://10.27.101.102";
		$ldap_domain = "@sky.local";
		
		$auth_user = $username . $ldap_domain; // ldap rdn or dn
		$auth_pass = $password; // associated password
		
		$base_dn = "OU=MUIC, DC=sky, DC=local";
		
		if ($auth_user == "" || $auth_pass == "") {
			// echo '<span class="label label-block label-danger">Username ���� Password ���١��ͧ</span><br>';
			$_SESSION ['FAIL_MESSAGE'] = 'Incorrect Username or Password!';
		} else {
			
			
			if (is_numeric ( substr ( $username, 1 ) )) {
				// --------- check student. ---------
				// connect to server
				if (! ($connect = ldap_connect ( $ldap_server ))) {
					die ( "Could not connect to ldap server" );
					$_SESSION ['FAIL_MESSAGE'] = 'Could not connect to ldap server';
				}
				ldap_set_option ( $connect, LDAP_OPT_PROTOCOL_VERSION, 3 );
				// bind to server
				
				if (! ($bind = @ldap_bind ( $connect, $auth_user, $auth_pass ))) {
					$_SESSION ['FAIL_MESSAGE'] = 'Incorrect Username or Password!';
				} else {
					
					$criteria = new CDbCriteria ();
					$criteria->condition = "username = '" . $username . "'";
					$userLogin = UserLogin::model ()->findAll ( $criteria );
					if (isset ( $userLogin [0] )) {
						$userLogin [0]->latest_login = date ( "Y-m-d H:i:s" );
						$userLogin [0]->update ();
						$_SESSION ['USER_LOGIN_ID'] = $userLogin [0]->id;
						$_SESSION ['ROLE_ID'] =  $userLogin [0]->role->id;
						
					} else {
						//Add new User
						$link = mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
						if (! $link) {
							die ( 'Could not connect: ' . mysql_error () );
						}
						mysql_select_db ( ConfigUtil::getDbName () );
						$sql = "insert into user_login(role_id,username,password,status,department_id,email) value('3','" . $username . "','" . md5 ( $username ) . "','INACTIVE',2,'" . $username . "@mahidol.ac.th')";
						$result = mysql_query ( $sql );
						mysql_close ( $link );
						// Reget user
						$criteria1 = new CDbCriteria ();
						$criteria1->condition = "username = '" . $username . "'";
						$userLogin1 = UserLogin::model ()->findAll ( $criteria1 );
						if (isset ( $userLogin1 [0] )) {
							$_SESSION ['USER_LOGIN_ID'] = $userLogin1 [0]->id;
							$_SESSION ['ROLE_ID'] =  $userLogin1 [0]->role->id;
								
						}
					}
					return true;
				}
			} else if ($username == 'admin') {
// 				 --------- check admin. ---------
				$criteria = new CDbCriteria ();
				$criteria->condition = "username = '" . $username . "' and password = md5('" . $password . "')";
				$userLogin = UserLogin::model ()->findAll ( $criteria );
				if (isset ( $userLogin [0] )) {
					$userLogin [0]->latest_login = date ( "Y-m-d H:i:s" );
					$userLogin [0]->update ();
					$_SESSION ['USER_LOGIN_ID'] = $userLogin [0]->id;
					$_SESSION ['ROLE_ID'] =  $userLogin [0]->role->id;
					return true;
				} else {
					$_SESSION ['FAIL_MESSAGE'] = 'Incorrect Username or Password!';
					return false;
				}
			} else {
				
				// --------- check staff. ---------
				// connect to server
				if (! ($connect = ldap_connect ( $ldap_server ))) {
					die ( "Could not connect to ldap server" );
					$_SESSION ['FAIL_MESSAGE'] = 'Could not connect to ldap server';
				}
				ldap_set_option ( $connect, LDAP_OPT_PROTOCOL_VERSION, 3 );
				// bind to server
				
				if (! ($bind = @ldap_bind ( $connect, $auth_user, $auth_pass ))) {
					$_SESSION ['FAIL_MESSAGE'] = 'Incorrect Username or Password!';
				} else {
					
					$criteria = new CDbCriteria ();
					$criteria->condition = "username = '" . $username . "'";
					$userLogin = UserLogin::model ()->findAll ( $criteria );
					if (isset ( $userLogin [0] )) {
						$userLogin [0]->latest_login = date ( "Y-m-d H:i:s" );
						$userLogin [0]->update ();
						$_SESSION ['USER_LOGIN_ID'] = $userLogin [0]->id;
						$_SESSION ['ROLE_ID'] =  $userLogin [0]->role->id;
						
					} else {
						
						$link = mysql_connect ( ConfigUtil::getHostName (), ConfigUtil::getUsername (), ConfigUtil::getPassword () );
						if (! $link) {
							die ( 'Could not connect: ' . mysql_error () );
						}
						mysql_select_db ( ConfigUtil::getDbName () );
						$sql = "insert into user_login(role_id,username,password,status,department_id,email) value('2','" . $username . "','" . md5 ( $username ) . "','INACTIVE',2,'" . $username . "@mahidol.ac.th')";
						$result = mysql_query ( $sql );
						mysql_close ( $link );
						// Reget user
						$criteria1 = new CDbCriteria ();
						$criteria1->condition = "username = '" . $username . "'";
						$userLogin1 = UserLogin::model ()->findAll ( $criteria1 );
						if (isset ( $userLogin1 [0] )) {
							$_SESSION ['USER_LOGIN_ID'] = $userLogin1 [0]->id;
							$_SESSION ['ROLE_ID'] =  $userLogin1 [0]->role->id;
								
						}
					}
					return true;
				}
			}
		}
		
		unset ( $connect );
		unset ( $bind );
		
	}
	public static function getUserLoginId() {
		if (isset ( $_SESSION ['USER_LOGIN_ID'] )) {
			return $_SESSION ['USER_LOGIN_ID'];
		} else {
			return null;
		}
	}
	public static function getUserLogin() {
		if (self::isLogin ()) {
			$userLogin = UserLogin::model ()->findByPk ( self::getUserLoginId () );
			return $userLogin;
		} else {
			return null;
		}
	}
	public static function getUserRole() {
		if (self::isLogin ()) {
// 			$userLogin = UserLogin::model ()->findByPk ( self::getUserLoginId () );
			return $_SESSION ['ROLE_ID'];// $userLogin->role->id;
		} else {
			return null;
		}
	}
	public static function getUserRoleName() {
		if (self::isLogin ()) {
			$role = Role::model ()->findByPk ( self::getUserRole() );
			return $role->name;
		} else {
			return null;
		}
	}
	public static function areUserRole($roles) {
		if (self::isLogin ()) {
			$userLogin = UserLogin::model ()->findByPk ( self::getUserLoginId () );
			return in_array ( $userLogin->role->name, $roles );
		} else {
			return null;
		}
	}
	public static function areUserRoleById($roles, $userId) {
		if (self::isLogin ()) {
			$userLogin = UserLogin::model ()->findByPk ( $userId );
			return in_array ( $userLogin->role->name, $roles );
		} else {
			return null;
		}
	}
	public static function getUserById($userId) {
		$userLogin = UserLogin::model ()->findByPk ( $userId );
		return $userLogin;
	}
	public static function isBlackList($userId) {
		// skipp
		// username=5780180,id=879
		if ($userId == 879 || $userId == 1182) {
			return false;
		}
		$times = 0;
		$reqs = RequestBorrow::model ()->findAll ( array (
				'condition' => "user_login_id = '" . $userId . "'" 
		) );
		
		if (isset ( $reqs ) && count ( $reqs ) > 0) {
			
			foreach ( $reqs as $req ) {
				
				$RequestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
						'condition' => "request_borrow_id = '" . $req->id . "'" 
				) );
				$isLate = false;
				
				if (isset ( $RequestBorrowEquipmentTypes ) && count ( $RequestBorrowEquipmentTypes ) > 0) {
					
					foreach ( $RequestBorrowEquipmentTypes as $RequestBorrowEquipmentType ) {
						$RequestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( array (
								'condition' => "request_borrow_equipment_type_id = '" . $RequestBorrowEquipmentType->id . "'" 
						) );
						
						if (isset ( $RequestBorrowEquipmentTypeItems ) && count ( $RequestBorrowEquipmentTypeItems ) > 0) {
							foreach ( $RequestBorrowEquipmentTypeItems as $RequestBorrowEquipmentTypeItem ) {
								if ($RequestBorrowEquipmentTypeItem->return_price > 0) {
									$isLate = true;
								}
							}
						}
					}
				}
				
				if ($isLate) {
					$times = $times + 1;
				}
			}
		}
		
		// return ($times >= 2) ? true : false;
		return false;
	}
	public static function isInUseEquipment($userId) {
		$inuse = false;
		$reqs = RequestBorrow::model ()->findAll ( array (
				'condition' => " user_login_id='" . $userId . "' And status_code not in ('R_B_NEW_RETURNED','R_B_NEW_CANCELLED','R_B_NEW_DISAPPROVE')" 
		) );
		if (isset ( $reqs ) && count ( $reqs ) > 0 && ! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN 
		) )) {
			
			$inuse = true;
		}
		
		return $inuse;
	}
	public static function isApprover($userId) {
		$inuse = false;
		
		$criteria = new CDbCriteria ();
		$criteria->condition = "id = '" . $userId . "' and ApproverType in (1,2)";
		$userLogin = UserLogin::model ()->findAll ( $criteria );
		if (isset ( $userLogin [0] )) {
			$inuse = true;
		}
		
		return $inuse;
	}
}
interface UserRoles {
	const ADMIN = "Admin";
	const STAFF = "Staff";
	const STUDENT = "Student";
	const LECTURER = "Lecturer";
	const STAFF_AV = "StaffAV";
	const STUDENT_FAA = "StudentFAA";
}
?>