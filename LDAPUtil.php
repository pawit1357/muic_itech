<?php

$domain = 'sky.local';
$username = 'aaron.sch';
$password = 'password@1';
$ldapconfig['host'] = '10.27.101.243';
$ldapconfig['port'] = 389;
$ldapconfig['basedn'] = 'dc=sky,dc=local';

$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
//ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
//ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

$dn="ou=MUIC,".$ldapconfig['basedn'];
$bind=ldap_bind($ds, $username .'@' .$domain, $password);

//$isITuser = ldap_search($bind,$dn,'(&(objectClass=User)(sAMAccountName=' . $username. '))');
if ($bind) {
    echo("Login correct");
} else {
    echo("Login incorrect");
}


// $ldap = new LDAP("10.27.101.243:389" ,"sky.local","MUIC", "chayanon.poo", "password@1");

// $user = new User("chayanon.poo","password@1");
// echo  $ldap->authenticate($user);


// $users = $ldap->get_users();
// print "<pre>";
// print_r($users);
// print "</pre>";



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
	private $domain = "sky.local";
	private $ou = "student";
	private $admin = "hui01";
	private $password = "hui01xxx";

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
				$result = $user->auth_status = AuthStatus::OK;

				$this->_get_user_info($ldap, $user);
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
		echo $base_dn;
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