<?php
class ApiController extends CController
{
	public $layout='ajax';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{

	}

// 	http://localhost:88/itech/index.php/api/need_update/key/121212
	public function actionNeed_update()
	{

		$key = $_GET['key'];
		$data = $_GET['data'];

		if(!CommonUtil::IsNullOrEmptyString($key))
		{
			mysql_connect(ConfigUtil::getHostName(), ConfigUtil::getUsername(), ConfigUtil::getPassword());
			mysql_select_db(ConfigUtil::getDbName());
			$sql = "insert into tb_sky_notification(request_type,request_key,data,create_date) values('REQUEST_KEY_PUSH','".$key."','".$data."',now())";
				
			$result = mysql_query($sql);
			if($result){
				echo json_encode (json_decode ("{}"));
			}else {
				$datas['error_message'] = 'Invalid data.';
				echo json_encode($datas);
			}
		}else{
			$datas['error_message'] = 'Invalid parameter.';
			echo json_encode($datas);
		}
	}




}