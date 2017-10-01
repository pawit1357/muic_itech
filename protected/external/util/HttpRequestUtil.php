<?php
class HttpRequestUtil {
	public static function request($url) {
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url,
		CURLOPT_USERAGENT => 'Codular Sample cURL Request',
		));
		$result = curl_exec($curl);
		curl_close($curl);
		return result;
	}
}
?>