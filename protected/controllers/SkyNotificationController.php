<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SkyNotificationController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = new SkyNotification();

		// Set Search Text
		if(isset($_GET['search_text'])){
			$model->search_text = addslashes($_GET['search_text']);
		}

		$this->render('main', array(
				'data' => $model,
		));
	}


	public function actionLoadData()
	{

		$id = addslashes($_GET['id']);


		$criteria = new CDbCriteria;
		$criteria->condition="request_sky_noti_id = '".$id."'";
		$skyExist = RequestBooking::model()->findAll($criteria);


		if(count($skyExist) == 0) {
				
			$str = file_get_contents('https://sky.muic.mahidol.ac.th/api/externals/reservations?auth_token=437d2b611411d9942123a848d1ee11ecb6a70e&data%5bstart_datetime%5d=1404708905&data%5bend_datetime%5d=1406696105');
			$json = json_decode($str, true);
			// 			echo '1size:'.$json;
			foreach($json['data'] as $item) {

				// 				echo 'user_loin_id: ' . $item['sender']['username'] . '<br />';
				// 				echo 'request_booking_type_id: ' . '1' . '<br />';
				// 				echo 'room_id: ' . $item['room']['room_number'] . '<br />';
				// 				echo 'semester_id: ' . 'NULL' . '<br />';
				// 				echo 'request_date: ' . $item['start_datetime'] . '<br />';
				// 				echo 'request_day_in_week: ' . 'NULL' . '<br />';
				// 				echo 'period_start: ' . $item['start_datetime'] . '<br />';//เน�เธ� mapping เธ�เธฑเธ� table
				// 				echo 'period_end: ' . $item['end_datetime'] . '<br />';
				// 				echo 'description: ' . $item['remark'] . '<br />';
				// 				echo 'status_code: ' . 'REQUEST_APPROVE' . '<br />';
				// 				echo 'create_date: ' . $item['created_at'] . '<br />';
				// 				echo 'course_name: ' . '' . '<br />';
				// 				echo ' --------------------------------------------------  '. '<br />';


				$epoch_start = $item['start_datetime'];
				$epoch_end = $item['end_datetime'];
				$epoch_create_at = $item['created_at'];
				list($d, $t) = explode('.', $epoch_create_at);


				$start_datetime = new DateTime("@$epoch_start");  // convert UNIX timestamp to PHP DateTime
				$end_datetime = new DateTime("@$epoch_end");  // convert UNIX timestamp to PHP DateTime
				$create_date = new DateTime("@$d");  // convert UNIX timestamp to PHP DateTime

				$period_start = CommonUtil::getPeriodId($start_datetime->format('H'),$start_datetime->format('i'));
				$period_end = CommonUtil::getPeriodId($end_datetime->format('H'),$end_datetime->format('i'));

				$user_login_id = 1;//Fix for localmode
				$room_id = -1;
				$criteria = new CDbCriteria;
				$criteria->condition="username = '".$item['sender']['username']."'";
				$userLogin = UserLogin::model()->findAll($criteria);
				if(isset($userLogin[0])) {

					$user_login_id = $userLogin[0]->id;
				}
				$criteria1 = new CDbCriteria;
				$criteria1->condition="room_code = '".$item['room']['room_number']."'";
				$rooms = Room::model()->findAll($criteria1);
				if(isset($rooms[0])) {

					$room_id = $rooms[0]->id;
				}
				//echo $room_id.'<br>';
				$model = new RequestBooking();
				$model->request_sky_id = $item['id'];
				$model->request_sky_noti_id = $id;
				$model->user_login_id = $user_login_id;
				$model->request_booking_type_id = 1;
				$model->room_id = $room_id;
				$model->request_date = $start_datetime->format('Y-m-d H:i:s');
				$model->period_start =  $period_start;
				$model->period_end = $period_end;
				$model->description = $item['remark'];
				$model->status_code = 'REQUEST_SKYDATA_WAIT_APPROVE';
				$model->create_date = $create_date->format('Y-m-d H:i:s');
				$model->course_name = $item['remark'];
				if($model->save()){
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->condition="request_sky_noti_id = '".$id."'";
		$reqs = RequestBooking::model()->findAll($criteria);
		if(count($reqs) > 0) {
			$model = new RequestBooking();
			$model->status_filter ='REQUEST_SKYDATA_WAIT_APPROVE';
			$model->request_sky_noti_id =$id;
			$this->render('listReservation', array(
					'data' => $model,
			));
		}else{

			$model = new SkyNotification();
			$this->render('main', array(
					'data' => $model,
			));
		}
	}
	public function actionApproved()
	{

		$id = addslashes($_GET['id']);

		$criteria = new CDbCriteria;
		$criteria->condition="request_sky_noti_id = '".$id."'";
		$reqs = RequestBooking::model()->findAll($criteria);
		if(count($reqs) > 0) {
			foreach($reqs as $req) {
				$req->status_code = 'REQUEST_APPROVE';
				if( $req->update()){

				}
			}

			$sky = SkyNotification::model()->findByPk($id);
			if($sky != null) {
				$sky->status=1;
				$sky->update();
			}
		}

		$model = new SkyNotification();
		$this->render('main', array(
				'data' => $model,
		));

	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id'])) {
				$id = addslashes($_GET['id']);
				$this->_model=SkyNotification::model()->findbyPk($id);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


}
