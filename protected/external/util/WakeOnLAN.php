<?php 
//flush();
class WakeOnLAN
{

	public static function Wol($addr, $mac, $socket_number)
	{
		$addr_byte = explode(':', $mac);
		//$addr = '10.27.7.255';
		$hw_addr   = '';
		 
		for($a=0; $a <6; $a++)
			$hw_addr .= chr(hexdec($addr_byte[$a]));

		$msg = chr(255).chr(255).chr(255).chr(255).chr(255).chr(255);
		 
		for($a = 1; $a <= 16; $a++)
			$msg .= $hw_addr;

		$s = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		 
		if($s == false)
		{
			echo "Can't create socket!<BR>\n";
			echo "Error: '".socket_last_error($s)."' - " . socket_strerror(socket_last_error($s));
			return FALSE;
		}
		else
		{
			$opt_ret = socket_set_option($s, 1, 6, TRUE);

			if($opt_ret < 0)
			{
				echo "setsockopt() failed, error: " . strerror($opt_ret) . "<BR>\n";
				return FALSE;
			}

			if(socket_sendto($s, $msg, strlen($msg), 0, $addr, $socket_number))
			{
				$content = bin2hex($msg);
				echo "Magic Packet Sent!<BR>\n";
				echo "Data: <textarea readonly rows=\"1\" name=\"content\" cols=\"".strlen($content)."\">".$content."</textarea><BR>\n";
				echo "Port: ".$socket_number."<br>\n";
				echo "MAC: ".$_GET['wake_machine']."<BR>\n";
				socket_close($s);
				return TRUE;
			}
			else
			{
				echo "Magic Packet failed to send!<BR>";
				return FALSE;
			}
		}
	}
}