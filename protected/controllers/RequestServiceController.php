<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class RequestServiceController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_SERVICE",
				"VIEW_ALL_REQUEST_SERVICE",
				"CREATE_REQUEST_SERVICE",
				"UPDATE_REQUEST_SERVICE",
				"DELETE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestService ();
		
		if (isset ( $_GET ['date_filter'] )) {
			$model->date_filter = addslashes ( $_GET ['date_filter'] );
		}
		
		if (isset ( $_GET ['request_type_filter'] )) {
			$model->request_type_filter = addslashes ( $_GET ['request_type_filter'] );
		}
		
		if (UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV 
		) )) {
			$model->view_all_request = true;
			$model->completed_request = true;
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_POST ['RequestService'] )) {
			$transaction = Yii::app ()->db->beginTransaction ();
			$serviceTypeDetail = $_POST ['service_type_detail'];
			list ( $day, $month, $year ) = explode ( '-', $_POST ['RequestService'] ['due_date'] );
			$_POST ['RequestService'] ['due_date'] = $year . '-' . $month . '-' . $day;
			// Add Request
			$requestService = new RequestService ();
			$requestService->attributes = $_POST ['RequestService'];
			$requestService->user_login_id = UserLoginUtil::getUserLoginId ();
			$requestService->status_code = "REQUEST_ISERVICE_WAIT_APPROVE";
			$requestService->create_date = date ( "Y-m-d H:i:s" );
			
			$addSuccess = true;
			try {
				if ($requestService->save ()) {
					$requestService->id = $requestService->getPrimaryKey ();
					if (isset ( $serviceTypeDetail )) {
						$serviceTypeDetailId = addslashes ( $serviceTypeDetail );
						$requestServiceDetail = new RequestServiceDetail ();
						$requestServiceDetail->request_service_id = $requestService->getPrimaryKey ();
						$requestServiceDetail->request_service_type_detail_id = $serviceTypeDetail;
						if (! $requestServiceDetail->save ()) {
							$addSuccess = false;
							break;
						}
					}
				} else {
					$addSuccess = false;
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
			if ($addSuccess) {
				$transaction->commit ();
				$this->redirect ( Yii::app ()->createUrl ( 'RequestService/View/id/' . $requestService->getPrimaryKey () ) );
			} else {
				$transaction->rollback ();
				$model = new RequestService ();
				$this->render ( 'request', array (
						'data' => $model 
				) );
			}
		} else {
			// Render
			$model = new RequestService ();
			$this->render ( 'request', array (
					'data' => $model 
			) );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_SERVICE",
				"VIEW_ALL_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = $this->loadModel ();
		$this->render ( 'view', array (
				'data' => $model 
		) );
	}
	public function actionUpdate() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		$model = $this->loadModel ();
		if (isset ( $_POST ['change_status'] )) {
			$status = addslashes ( $_POST ['status_code'] );
			$model->status_code = $status;
			try {
				if ($model->update ()) {
					
					if ($status == "REQUEST_ISERVICE_COMPLETED") {
						// เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name . ', Your request is completed.</br>' . 'Best Regards.';
						if (isset ( $model->user_login->email )) {
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
						}
					}
					$this->redirect ( Yii::app ()->createUrl ( 'RequestService/' ) );
				} else {
					$this->render ( 'update', array (
							'data' => $model 
					) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			// Render
			$this->render ( 'update', array (
					'data' => $model 
			) );
		}
	}
	public function actionDelete() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		$model = $this->loadModel ();
		$model->status_code = 'REQUEST_ISERVICE_CANCEL';
		try {
			$model->save ();
		} catch ( CDbException $e ) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestService/' ) );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = RequestService::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
	public function actionApprove() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestService ();
		$model->view_all_request = true;
		$model->status_filter = 'REQUEST_ISERVICE_WAIT_APPROVE';
		$this->render ( 'approve', array (
				'data' => $model 
		) );
	}
	public function actionApproveRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_GET ['id'] )) {
			$id = addslashes ( $_GET ['id'] );
			$model = RequestService::model ()->findByPk ( $id );
			if (isset ( $model )) {
				$model->status_code = 'REQUEST_ISERVICE_PROCESSING';
				try {
					if ($model->update ()) {
						// เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name . ', Your request already approved.</br>' . 'Best Regards.';
						if (isset ( $model->user_login->email )) {
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
						}
					}
				} catch ( CDbException $e ) {
					$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
				}
			}
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestService/Approve' ) );
	}
	public function actionDisapproveRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_SERVICE" 
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		
		if (isset ( $_GET ['id'] )) {
			$id = addslashes ( $_GET ['id'] );
			$model = RequestService::model ()->findByPk ( $id );
			if (isset ( $model )) {
				$model->status_code = 'REQUEST_ISERVICE_CANCEL';
				try {
					if ($model->update ()) {
						// เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name . ', Your request is disapproved.</br>' . 'Best Regards.';
						if (isset ( $model->user_login->email )) {
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Result', $content );
						}
					}
				} catch ( CDbException $e ) {
					$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
				}
			}
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestService/Approve' ) );
	}
	public function actionUpload() {
		// $this->redirect(Yii::app()->createUrl('http://www.kapook.com'));
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		
		$folder = 'upload/';
		
		if (! is_dir ( $folder )) {
			mkdir ( $folder, 0777, TRUE );
		}
		
		$allowedExtensions = array (
				"jpg",
				"png",
				"xls" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 5 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		$return = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		
		echo $return; // it's array
	}
}