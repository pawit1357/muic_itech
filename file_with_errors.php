<?php

//echo "aaa";
//

// $output = exec('ping google.com');////net rpc shutdown -I 10.27.3.200 -U AV_MUIC%1234');
// echo $output;


$macAddressHexadecimal = str_replace(':', '', '5C:F9:DD:DD:1C:94');
$broadcastAddress ='10.27.7.255';

// check if $macAddress is a valid mac address
if (!ctype_xdigit($macAddressHexadecimal)) {
	throw new \Exception('Mac address invalid, only 0-9 and a-f are allowed');
}

$macAddressBinary = pack('H12', $macAddressHexadecimal);

$magicPacket = str_repeat(chr(0xff), 6).str_repeat($macAddressBinary, 16);

if (!$fp = fsockopen('udp://' . $broadcastAddress, 9, $errno, $errstr, 2)) {
	throw new \Exception("Cannot open UDP socket: {$errstr}", $errno);
}
fputs($fp, $magicPacket);
fclose($fp);

echo 'ss';
?>
