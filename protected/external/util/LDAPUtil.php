<?php

/*
$ldap = new LDAP("10.27.101.243:389" ,"sky.local","MUIC", "chayanon.poo", "password@1");
$user = new User("chayanon.poo","password@1");
echo  $ldap->authenticate($user);
foreach ($user as $key => $value) {
echo $value."<br>";	
}

$users = $ldap->get_users();
print "<pre>";
print_r($users);
print "</pre>";
*/

abstract class AuthStatus
{
	const FAIL = "Authentication failed";
	const OK = "Authentication OK";
	const SERVER_FAIL = "Unable to connect to LDAP server";
	const ANONYMOUS = "Anonymous log on";
}

// The LDAP server
class LDAP
{
	/*
	 OU: MUIC -> Staffs + Instructors
	OU: student -> Students
	*/
	private $server = "10.27.101.243:389";
	private $domain = "sky.loca";
	private $ou = "MUIC";
	private $admin = "";
	private $password = "";

	public function __construct($server, $domain,$ou ="", $admin = "", $password = "")
	{
		$this->server = $server;
		$this->ou = $ou;
		$this->domain = $domain;
		$this->admin = $admin;
		$this->password = $password;
	}

	// Authenticate the against server the domain\username and password combination.
	public function authenticate($user)
	{
		$user->auth_status = AuthStatus::FAIL;

		$ldap = ldap_connect($this->server) or $user->auth_status = AuthStatus::SERVER_FAIL;
		ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldapbind = ldap_bind($ldap, $user->username."@".$this->domain, $user->password);
		if($ldapbind)
		{
			if(empty($user->password))
			{
				$user->auth_status = AuthStatus::ANONYMOUS;
			}
			else
			{
				if( is_numeric(substr($value,1,1))){
					$this->ou = "student";
				}else{
					$this->ou = "MUIC";
				}
				$result = $user->auth_status = AuthStatus::OK;
				$this->_get_user_info($ldap, $user);
				echo $usr->username;
			}
		}
		else
		{
			$result = $user->auth_status = AuthStatus::FAIL;
		}
		echo $result;
		ldap_close($ldap);
	}

	// Get an array of users or return false on error
	public function get_users()
	{
		if(!($ldap = ldap_connect($this->server))) return false;

		ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldapbind = ldap_bind($ldap, $this->admin."@".$this->domain, $this->password);

		$dc = explode(".", $this->domain);
		$base_dn = "";
		foreach($dc as $_dc) $base_dn .= "dc=".$_dc.",";
		$base_dn = "ou=".$this->ou.",".substr($base_dn, 0, -1);
		$sr=ldap_search($ldap, $base_dn, "(&(objectClass=user)(objectCategory=person)(|(mail=*)(telephonenumber=*))(!(userAccountControl:1.2.840.113556.1.4.803:=2)))", array("cn", "dn", "memberof", "mail", "telephonenumber", "othertelephone", "mobile", "ipphone", "department", "title"));
		$info = ldap_get_entries($ldap, $sr);

		for($i = 0; $i < $info["count"]; $i++)
		{
			$users[$i]["name"] = $info[$i]["cn"][0];
			$users[$i]["ou"] = $info[$i]["ou"][0];
			$users[$i]["mail"] = $info[$i]["mail"][0];
			$users[$i]["mobile"] = $info[$i]["mobile"][0];
			$users[$i]["skype"] = $info[$i]["ipphone"][0];
			$users[$i]["telephone"] = $info[$i]["telephonenumber"][0];
			$users[$i]["department"] = $info[$i]["department"][0];
			$users[$i]["title"] = $info[$i]["title"][0];

			for($t = 0; $t < $info[$i]["othertelephone"]["count"]; $t++)
				$users[$i]["othertelephone"][$t] = $info[$i]["othertelephone"][$t];

			// set to empty array
			if(!is_array($users[$i]["othertelephone"])) $users[$i]["othertelephone"] = Array();
		}

		return $users;
	}

	private function _get_user_info($ldap, $user)
	{
		$dc = explode(".", $this->domain);

		$base_dn = "";
		foreach($dc as $_dc) $base_dn .= "dc=".$_dc.",";

		$base_dn = substr($base_dn, 0, -1);

		$sr=ldap_search($ldap, $base_dn, "(&(objectClass=user)(objectCategory=person)(samaccountname=".$user->username."))", array("cn", "dn", "memberof", "mail", "telephonenumber", "othertelephone", "mobile", "ipphone", "department", "title"));
		$info = ldap_get_entries($ldap, $sr);

		$user->groups = Array();
		for($i = 0; $i < $info[0]["memberof"]["count"]; $i++)
			array_push($user->groups, $info[0]["memberof"][$i]);

		$user->name = $info[0]["cn"][0];
		$user->dn = $info[0]["dn"];
		$user->ou = $info[0]["ou"];
		$user->mail = $info[0]["mail"][0];
		$user->telephone = $info[0]["telephonenumber"][0];
		$user->mobile = $info[0]["mobile"][0];
		$user->skype = $info[0]["ipphone"][0];
		$user->department = $info[0]["department"][0];
		$user->title = $info[0]["title"][0];

		for($t = 0; $t < $info[$i]["othertelephone"]["count"]; $t++)
			$user->other_telephone[$t] = $info[$i]["othertelephone"][$t];

		if(!is_array($user->other_telephone[$t])) $user->other_telephone[$t] = Array();
	}

	private function getUser($ldap, $user)
	{
		$resultUser = new User();
		$dc = explode(".", $this->domain);

		$base_dn = "";
		foreach($dc as $_dc) $base_dn .= "dc=".$_dc.",";

		$base_dn = substr($base_dn, 0, -1);

		$sr=ldap_search($ldap, $base_dn, "(&(objectClass=user)(objectCategory=person)(samaccountname=".$user->username."))", array("cn", "dn", "memberof", "mail", "telephonenumber", "othertelephone", "mobile", "ipphone", "department", "title"));
		$info = ldap_get_entries($ldap, $sr);

		$user->groups = Array();
		for($i = 0; $i < $info[0]["memberof"]["count"]; $i++)
			array_push($resultUser->groups, $info[0]["memberof"][$i]);

		$resultUser->name = $info[0]["cn"][0];
		$resultUser->dn = $info[0]["dn"];
		$resultUser->ou = $info[0]["ou"];
		$resultUser->mail = $info[0]["mail"][0];
		$resultUser->telephone = $info[0]["telephonenumber"][0];
		$resultUser->mobile = $info[0]["mobile"][0];
		$resultUser->skype = $info[0]["ipphone"][0];
		$resultUser->department = $info[0]["department"][0];
		$resultUser->title = $info[0]["title"][0];

		for($t = 0; $t < $info[$i]["othertelephone"]["count"]; $t++)
			$resultUser->other_telephone[$t] = $info[$i]["othertelephone"][$t];

		if(!is_array($resultUser->other_telephone[$t])) $resultUser->other_telephone[$t] = Array();

		return $resultUser;
	}
}

class User
{
	public $auth_status = AuthStatus::FAIL;
	public $username = "Anonymous";
	public $password = "";

	public $groups = Array();
	public $dn = "";
	public $ou = "";
	public $name = "";
	public $mail = "";
	public $telephone = "";
	public $other_telephone = Array();
	public $mobile = "";
	public $skype = "";
	public $department = "";
	public $title = "";

	public function __construct($username, $password)
	{
		$this->auth_status = AuthStatus::FAIL;
		$this->username = $username;
		$this->password = $password;
	}

	public function get_auth_status()
	{
		return $this->auth_status;
	}

}
?>