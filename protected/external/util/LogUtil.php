<?php
class LogUtil {

	public static function addLog($pathInfo) {
		list($controller, $action) = explode('/', $pathInfo);
		if($controller != 'AjaxRequest') {
			$usingLog = new UsingLog();
			$usingLog->controller_id = $controller;
			$usingLog->action_id = $action;
			$usingLog->user_login_id = UserLoginUtil::getUserLoginId();
			$usingLog->datetime = date("Y-m-d H:i:s");
			$usingLog->save();
		}
	}
}
?>