<?php
class SocialMediaUtil {
	public static function postToFacebook($message) {
		Yii::import('application.extensions.facebook-api.Facebook');
		$config = array(
				'appId' => '152579034911530',
				'secret' => 'b773ff0c97198bd1e6af067bdafe8d10',
		);
		$facebook = new Facebook($config);
		$user_id = $facebook->getUser();
		if($user_id) {
			try {
				$ret_obj = $facebook->api('/me/feed', 'POST',
						array(
								'link' => 'http://www.prdapp.net',
								'message' => 'test',
								'photo' => 'http://prdapp.net/logo.jpg'
						));

				echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
			} catch(FacebookApiException $e) {
				$login_url = $facebook->getLoginUrl( array(
						'scope' => 'publish_stream'
				));
				echo 'Please <a href="' . $login_url . '">login.</a>';
				error_log($e->getType());
				error_log($e->getMessage());
			}
			echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
		} else {
			$login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream' ) );
			echo 'Please <a href="' . $login_url . '">login.</a>';
		}
	}
}
?>