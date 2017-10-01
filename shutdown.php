<?php

//การ config ปิดเครื่อง
//-1 กำหนด user/pass ให้เครื่อง
//-2 เพิ่ม LocalAccountTokenFilterPolicy กำหนดค่า DWORD32=1 ใน HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\Policies\System

//header("Location: http://www.dpu.ac.th");
$ip = $_GET["ip_address"];
$user = $_GET["client_user"];
$pass = $_GET["client_pass"];

//echo "command>>net rpc shutdown -I ".$ip." -U ".$user."%".$pass;



//For Linux
echo "exec:".exec('net rpc shutdown -I '.$ip.' -U '.$user.'%'.$pass);
//echo exec("ls -l");

//For windows
//echo 'command:'.'C:\\Windows\\System32\\psshutdown.exe -s -f -c -t 2 -u '.$user.' -p '.$pass.' \\\\'.$ip;
//echo '<br>';
//echo 'result'.exec('C:\\Windows\\System32\\psshutdown.exe -s -f -c -t 2 -u '.$user.' -p '.$pass.' \\\\'.$ip);

?>