<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class RequestBorrowController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BORROW", "VIEW_ALL_REQUEST_BORROW", "CREATE_REQUEST_BORROW", "UPDATE_REQUEST_BORROW", "DELETE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		// Render
		$model = new RequestBorrow();
		$model2 = new RequestBorrow();
		$model2->show_all_active = true;
		if(isset($_GET['year_filter'])){
			$model->year_filter = addslashes($_GET['year_filter']);
			$model2->year_filter = addslashes($_GET['year_filter']);
		}
		if(isset($_GET['month_filter'])){
			$model->month_filter = addslashes($_GET['month_filter']);
			$model2->month_filter = addslashes($_GET['month_filter']);
		}
		if(isset($_GET['day_filter'])){
			$model->day_filter = addslashes($_GET['day_filter']);
			$model2->day_filter = addslashes($_GET['day_filter']);
		}
		if(isset($_GET['status_filter'])){
			$model->status_filter = addslashes($_GET['status_filter']);
			$model2->status_filter = addslashes($_GET['status_filter']);
		}
		if(UserLoginUtil::hasPermission(array("FULL_ADMIN","VIEW_ALL_REQUEST_BORROW"))){
			$model->view_all_request = true;
			$model2->view_all_request = true;
		}
		$model->completed_request = true;
		$model2->completed_request = false;
		$this->render('main', array('data'=>$model,'data2'=>$model2));
	}

	public function actionCheckStatus()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}

		if(isset($_GET['date_filter'])){
			$date = addslashes($_GET['date_filter']);
		} else {
			$date = date("d-m-Y");
		}
		// Render
		$model = new EquipmentType();
		$request_find_date = $date;
		$this->render('check_status', array('data'=>$model, 'request_find_date'=>$request_find_date));
	}

	public function actionRequest()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		if(isset($_POST['RequestBorrow'])){
			$transaction = Yii::app()->db->beginTransaction();
			$equipments = $_POST['equipments'];
			// Add Request
			$requestBorrow = new RequestBorrow();
			list($day, $month, $year) = explode('-', $_POST['RequestBorrow']['from_date']);
			$_POST['RequestBorrow']['from_date'] = $year.'-'.$month.'-'.$day;
			list($day, $month, $year) = explode('-', $_POST['RequestBorrow']['thru_date']);
			$_POST['RequestBorrow']['thru_date'] = $year.'-'.$month.'-'.$day;
			$requestBorrow->attributes = $_POST['RequestBorrow'];
			$requestBorrow->user_login_id = UserLoginUtil::getUserLoginId();
			if($requestBorrow->location == 'WHITHIN_MUIC') {
				$requestBorrow->status_code = "REQUEST_BORROW_WAIT_FOR_APPROVE";
			} else {
				$requestBorrow->status_code = "REQUEST_BORROW_WAIT_FOR_APPROVE";
			}
			$requestBorrow->create_date = date("Y-m-d H:i:s");
			$addSuccess = true;
			$validate = true;

			// validate qty

			foreach ($equipments as $equipment) {
				$items = RequestBorrowEquipmentType::model()->with("request_borrow")->findAll(array('condition'=>"t.equipment_type_id = '".addslashes($equipment)."' and (request_borrow.status_code != 'REQUEST_BORROW_CANCELLED' and request_borrow.status_code != 'REQUEST_BORROW_COMPLETED')"));
				$sumQuantity = 0;
				$eName = 'Equipment';
				foreach($items as $item) {
					$sumQuantity = $sumQuantity + $item->quantity;
					if($eName == 'Equipment') {
						$eName = $item->equipment_type->name;
					}
				}
				$eqs = Equipment::model()->findAll(array('condition' => "equipment_type_id = '".addslashes($equipment)."' and room_id = '7'"));
				$requestQty = addslashes($_POST['EquipmentType'][$equipment]);
				// 				echo (count($eqs) - $sumQuantity).' -- '.$requestQty;
				if((count($eqs) - $sumQuantity)  < $requestQty) {
					$validate = false;
					$result = array();
					$result['class'] = 'error';
					$result['message'] = $eName.' is out of stock. Available quantity is '.(count($eqs) - $sumQuantity);
					$_SESSION['OPERATION_RESULT'] = $result;
				}
			}


			if($validate && $requestBorrow->save()){
				$model = $requestBorrow;
				if(isset($equipments)) {
					foreach ($equipments as $equipment){
						$equipmentTypeId = addslashes($equipment);
						$requestBorrowEquipmentType = new RequestBorrowEquipmentType();
						$requestBorrowEquipmentType->request_borrow_id = $requestBorrow->getPrimaryKey();
						$requestBorrowEquipmentType->equipment_type_id = $equipmentTypeId;
						if(isset($_POST['EquipmentType'][$equipmentTypeId])){
							$requestBorrowEquipmentType->quantity = addslashes($_POST['EquipmentType'][$equipmentTypeId]);
						}
						if(!$requestBorrowEquipmentType->save()){
							$addSuccess = false;
							break;
						}
					}
				}

				$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
						'Here is your request details.<br />';

				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
				if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
					foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
						$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
					}
				}
				$content = $content.'Request From Date : '.$model->from_date.'<br />'.
						'To Date : '.$model->thru_date.'<br />'.
						'Best Regards.';
				if(isset($model->user_login->email)) {
					MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
				}
				if($requestBorrow->location == 'WHITHIN_MUIC') {
					if(isset($model->chef_email)) {
						MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
					}
				} else {
					// Send Mail to approve 1
					$key = md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000));
					$requestBorrowId = $requestBorrow->getPrimaryKey();
					$createDate = date('Y-m-d H:i:s');
					$status = "ACTIVE";
					$approveType = "APPROVE_1";

					$requestBorrowApproveLink = new RequestBorrowApproveLink();
					$requestBorrowApproveLink->request_key = $key;
					$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
					$requestBorrowApproveLink->create_date = $createDate;
					$requestBorrowApproveLink->status = $status;
					$requestBorrowApproveLink->approve_type = $approveType;

					if($requestBorrowApproveLink->save()) {
						$link = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Approve/key/'.$key.'">>>Click Here to Approve this request.<<</a>';
						$dlink = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Disapprove/key/'.$key.'">>>Click Here to Disapprove this request.<<</a>';
						$content = 'Hi approver. ' . $model->user_login->user_information->first_name.' has request borrow equipment.<br />'.
								'Here is the request details.<br />';
							
						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$requestBorrow->id."'"));
						if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
							foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
								$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
							}
						}
						$content = $content.'Request From Date : '.$model->from_date.'<br />'.
								'To Date : '.$model->thru_date.'<br />';
						$content = $content.$link.'<br />Or<br>';
						$content = $content.$dlink.'<br />';
						if(isset($model->chef_email)) {
// 							MailUtil::sendMail($model->chef_email, 'Support AV-Online, Approve Request Booking', $content);
						}
					}
				}

			} else {
				$addSuccess = false;
			}

			if($addSuccess) {
				$transaction->commit();
				$this->redirect(Yii::app()->createUrl('RequestBorrow/View/id/'.$requestBorrow->getPrimaryKey()));
				$this->render('request', array('data'=>$model));
			} else {
				$transaction->rollback();
				$model = new RequestBorrow();
				$this->render('request', array('data'=>$model));
			}

		} else {
			// Render
			$model = new RequestBorrow();
			$this->render('request', array('data'=>$model));
		}
	}

	public function actionApprove()
	{
		//$this->layout='main';
		$key = $_GET['key'];
		$requestBorrowApproveLinks = RequestBorrowApproveLink::model()->findAll(array('condition'=>"request_key='".$key."' and approve_type='APPROVE_1'"));
		if(isset($requestBorrowApproveLinks) && count($requestBorrowApproveLinks) > 0) {
			$requestBorrowApproveLink = $requestBorrowApproveLinks[0];
			$requestBorrow = RequestBorrow::model()->findByPk($requestBorrowApproveLink->request_borrow_id);
			if(isset($requestBorrow)) {
				if(isset($requestBorrow->approve_by)) {
					$requestBorrow->status_code ='REQUEST_BORROW_APPROVED';
				}else
				{
					$requestBorrow->status_code ='REQUEST_BORROW_APPROVE_1';
				}

				$key = md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000));
				$requestBorrowId = $requestBorrowApproveLink->request_borrow_id;
				$createDate = date('Y-m-d H:i:s');
				$status = "ACTIVE";
				$approveType = "FINAL_APPROVE";

				$requestBorrowApproveLink1 = $requestBorrowApproveLink;

				$requestBorrowApproveLink = new RequestBorrowApproveLink();
				$requestBorrowApproveLink->request_key = $key;
				$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
				$requestBorrowApproveLink->create_date = $createDate;
				$requestBorrowApproveLink->status = $status;
				$requestBorrowApproveLink->approve_type = $approveType;

				if($requestBorrowApproveLink->save()) {
					$requestBorrow->update();
					$requestBorrowApproveLink1->delete();

					$link = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/FinalApprove/key/'.$key.'">>>Click Here to Approve this request.<<</a>';
					$dlink = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Disapprove/key/'.$key.'">>>Click Here to Disapprove this request.<<</a>';
					$content = 'Hi approver. ' . $model->user_login->user_information->first_name.' has request borrow equipment.<br />'.
							'Here is the request details.<br />';

					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$requestBorrow->id."'"));
					if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
						foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
							$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
						}
					}
					$content = $content.'Request From Date : '.$requestBorrow->from_date.'<br />'.
							'To Date : '.$requestBorrow->thru_date.'<br />';
					$content = $content.$link.'<br />Or<br>';
					$content = $content.$dlink.'<br />';

					if(isset($requestBorrow->approve_by)) {
// 						MailUtil::sendMail($requestBorrow->approve_by, 'Support AV-Online, Approve Request Booking', $content);
					}

					$this->render('approve_result', array('data'=>array('success'=>true, 'message'=>'The request has been approved.')));
				}else {
					$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'The request not found.')));
				}
			} else {
				$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'Key not found.')));
			}
		}
	}

	public function actionFinalApprove()
	{
		//$this->layout='main';
		$key = $_GET['key'];
		$requestBorrowApproveLinks = RequestBorrowApproveLink::model()->findAll(array('condition'=>"request_key='".$key."' and approve_type='FINAL_APPROVE'"));
		if(isset($requestBorrowApproveLinks) && count($requestBorrowApproveLinks) > 0) {
			$requestBorrowApproveLink = $requestBorrowApproveLinks[0];
			$requestBorrow = RequestBorrow::model()->findByPk($requestBorrowApproveLink->request_borrow_id);
			if(isset($requestBorrow)) {
				$requestBorrow->status_code = 'REQUEST_BORROW_APPROVE_1';

				$requestBorrowApproveLink1 = $requestBorrowApproveLink;
				$requestBorrow->update();
				$requestBorrowApproveLink1->delete();

				$content = 'Hi '.$requestBorrow->user_login->user_information->first_name.', your request borrow equipment.<br />'.
						'Here is the request details.<br />';

				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$requestBorrow->id."'"));
				if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
					foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
						$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
					}
				}
				$content = $content.'Request From Date : '.$requestBorrow->from_date.'<br />'.
						'To Date : '.$requestBorrow->thru_date.'<br />';
				$content = $content.'<br />Your request has been approved.<br>';

				if(isset($requestBorrow->user_login->email)) {
// 					MailUtil::sendMail($requestBorrow->user_login->email, 'Support AV-Online, Approve Request Booking', $content);
				}
				$this->render('approve_result', array('data'=>array('success'=>true, 'message'=>'The request has been approved.')));
			} else {
				$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'The request not found.')));
			}
		} else {
			$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'Key not found.')));
		}
	}

	public function actionDisapprove() {
		$key = $_GET['key'];
		$requestBorrowApproveLinks = RequestBorrowApproveLink::model()->findAll(array('condition'=>"request_key='".$key."'"));
		if(isset($requestBorrowApproveLinks) && count($requestBorrowApproveLinks) > 0) {
			$requestBorrowApproveLink = $requestBorrowApproveLinks[0];
			$requestBorrow = RequestBorrow::model()->findByPk($requestBorrowApproveLink->request_borrow_id);
			if(isset($requestBorrow)) {
				$requestBorrow->status_code = 'REQUEST_BORROW_CANCELLED';

				$requestBorrowApproveLink1 = $requestBorrowApproveLink;
				$requestBorrow->update();
				$requestBorrowApproveLink1->delete();

				$content = 'Hi '.$requestBorrow->user_login->user_information->first_name.', your request borrow equipment.<br />'.
						'Here is the request details.<br />';

				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
				if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
					foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
						$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
					}
				}
				$content = $content.'Request From Date : '.$requestBorrow->from_date.'<br />'.
						'To Date : '.$requestBorrow->thru_date.'<br />';
				$content = $content.'<br />Your request has been dissapprove.<br>';

				if(isset($requestBorrow->user_login->email)) {
					MailUtil::sendMail($requestBorrow->user_login->email, 'Support AV-Online, Disapprove Request Booking', $content);
				}
				$this->render('approve_result', array('data'=>array('success'=>true, 'message'=>'The request has been disapproved.')));

			} else {
				$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'The request not found.')));
			}
		} else {
			$this->render('approve_result', array('data'=>array('success'=>false, 'message'=>'Key not found.')));
		}
	}

	public function actionView()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BORROW", "VIEW_ALL_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		// Render
		$model = $this->loadModel();
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_ALL_REQUEST_BORROW")) && $model->user_login_id != UserLoginUtil::getUserLoginId()){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		$this->render('view', array('data'=>$model));
	}

	public function actionUpdate()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		$model = $this->loadModel();
		if(isset($_POST['change_status'])){
			$status = addslashes($_POST['status_code']);
			$model->status_code = $status;

			if($model->update()){
					
				if($status == "REQUEST_BORROW_APPROVED" || $status == "REQUEST_BORROW_CANCELLED" ){

					$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
							'Here is your request details.<br />';

					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
					if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
						foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
							$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
						}
					}
					$content = $content.'Request From Date : '.$model->from_date.'<br />'.
							'To Date : '.$model->thru_date.'<br />'.
							'Best Regards.';
					if(isset($model->user_login->email)) {
						MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
					}

					if($model->location == 'WHITHIN_MUIC') {
						if(isset($model->chef_email)) {
							MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
						}
					} else {

						if( $status != "REQUEST_BORROW_CANCELLED" ){
							// Send Mail to approve 1
							$key = md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000));
							$requestBorrowId = $model->getPrimaryKey();
							$createDate = date('Y-m-d H:i:s');
							$status = "ACTIVE";
							$approveType = "APPROVE_1";

							$requestBorrowApproveLink = new RequestBorrowApproveLink();
							$requestBorrowApproveLink->request_key = $key;
							$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
							$requestBorrowApproveLink->create_date = $createDate;
							$requestBorrowApproveLink->status = $status;
							$requestBorrowApproveLink->approve_type = $approveType;

							if($requestBorrowApproveLink->save()) {
								$link = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Approve/key/'.$key.'">>>Click Here to Approve this request.<<</a>';
								$dlink = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Disapprove/key/'.$key.'">>>Click Here to Disapprove this request.<<</a>';
								$content = 'Hi approver. ' . $model->user_login->user_information->first_name.' has request borrow equipment.<br />'.
										'Here is the request details.<br />';

								$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$requestBorrow->id."'"));
								if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
									foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
										$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
									}
								}
								$content = $content.'Request From Date : '.$model->from_date.'<br />'.
										'To Date : '.$model->thru_date.'<br />';
								$content = $content.$link.'<br />Or<br>';
								$content = $content.$dlink.'<br />';
								if(isset($model->approve_by)) {
// 									MailUtil::sendMail($model->approve_by, 'Support AV-Online, Approve Request Booking', $content);
								}
							}
						}

					}

				}

				$this->redirect(Yii::app()->createUrl('RequestBorrow/'));
			} else {
				$this->render('update', array('data'=>$model));
			}

		} else {
			// Render
			$this->render('update', array('data'=>$model));
		}
	}

	public function actionConfirm()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		// Render
		$model = $this->loadModel();
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_ALL_REQUEST_BORROW")) && $model->user_login_id != UserLoginUtil::getUserLoginId()){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		if(isset($_POST['confirm'])){
			if($_POST['confirm'] == 'Confirm') {
				$model->status_code = "REQUEST_BORROW_CONFIRMED";
				if($model->update()){

					$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
							'Here is your request details.<br />';

					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
					if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
						foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
							$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
						}
					}
					$content = $content.'Request From Date : '.$model->from_date.'<br />'.
							'To Date : '.$model->thru_date.'<br />'.
							'Best Regards.';
					if(isset($model->user_login->email)) {
						MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
					}
					if(isset($model->approve_by)) {
						MailUtil::sendMail($model->approve_by, 'Support AV-Online, Request Borrow Result', $content);
					}
					if(isset($model->chef_email)) {
						MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
					}
					$this->redirect(Yii::app()->createUrl('RequestBorrow/View/id/'.$model->id));
				}
				// Mail
				$content = 'You have booked request id : ' . $model->id;
				MailUtil::sendMail($model->user_login->email, 'test', $content);
			} else if($_POST['confirm'] == 'Cancel'){
				if($model->delete()){
					$this->redirect(Yii::app()->createUrl('RequestBorrow/'));
				}
			}
		}
		$this->render('confirm', array('data'=>$model));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=RequestBorrow::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	public function actionListApprove()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		// Render
		$model = new RequestBorrow();
		$model->view_all_request = true;
		$model->clearDateFilter();
		$model->status_filter = 'REQUEST_BORROW_WAIT_FOR_APPROVE';
		$this->render('approve', array('data'=>$model));
	}

	public function actionApproveRequest()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		if(isset($_GET['id'])) {
			$id = addslashes($_GET['id']);
			$model = RequestBorrow::model()->findByPk($id);
			if(isset($model)) {
				if($model->location == 'WHITHIN_MUIC') {
					$model->status_code = 'REQUEST_BORROW_APPROVE_1';
				}else{
					$model->status_code = 'REQUEST_BORROW_APPROVED';
				}

				if($model->update()) {

					if($model->location == 'WHITHIN_MUIC') {

						$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
								'Here is your request details.<br />';

						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
						if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
							foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
								$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
							}
						}
						$content = $content.'Request From Date : '.$model->from_date.'<br />'.
								'To Date : '.$model->thru_date.'<br />'.
								'Best Regards.';
						if(isset($model->user_login->email)) {
							MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
						}

						if($model->location == 'WHITHIN_MUIC') {
							if(isset($model->chef_email)) {
								MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
							}
						}


					}else{

						//เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
								'Here is your request details.<br />';

						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
						if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
							foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
								$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
							}
						}
						$content = $content.'Request From Date : '.$model->from_date.'<br />'.
								'To Date : '.$model->thru_date.'<br />'.
								'Best Regards.';
						if(isset($model->user_login->email)) {
							MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
						}


						if(isset($model->chef_email)) {
							MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
						}

						// Send Mail to approve 1
						$key = md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000)).md5(rand(0, 2000));
						$requestBorrowId = $model->getPrimaryKey();
						$createDate = date('Y-m-d H:i:s');
						$status = "ACTIVE";
						$approveType = "APPROVE_1";

						$requestBorrowApproveLink = new RequestBorrowApproveLink();
						$requestBorrowApproveLink->request_key = $key;
						$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
						$requestBorrowApproveLink->create_date = $createDate;
						$requestBorrowApproveLink->status = $status;
						$requestBorrowApproveLink->approve_type = $approveType;

						if($requestBorrowApproveLink->save()) {
							$link = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Approve/key/'.$key.'">>>Click Here to Approve this request.<<</a>';
							$dlink = '<a href="'.ConfigUtil::getSiteName().'/index.php/RequestBorrow/Disapprove/key/'.$key.'">>>Click Here to Disapprove this request.<<</a>';
							$content = 'Hi approver. ' . $model->user_login->user_information->first_name.' has request borrow equipment.<br />'.
									'Here is the request details.<br />';

							$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$requestBorrow->id."'"));
							if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
								foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
									$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
								}
							}
							$content = $content.'Request From Date : '.$model->from_date.'<br />'.
									'To Date : '.$model->thru_date.'<br />';
							$content = $content.$link.'<br />Or<br>';
							$content = $content.$dlink.'<br />';
							if(isset($model->approve_by)) {
// 								MailUtil::sendMail($model->approve_by, 'Support AV-Online, Approve Request Booking', $content);
							}
						}

					}
				}
			}
		}
		$this->redirect(Yii::app()->createUrl('RequestBorrow/ListApprove'));
	}

	public function actionDisapproveRequest()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		if(isset($_GET['id'])) {
			$id = addslashes($_GET['id']);
			$model = RequestBorrow::model()->findByPk($id);
			if(isset($model)) {
				$model->status_code = 'REQUEST_BORROW_CANCELLED';
				if($model->update()) {

					if($model->location == 'WHITHIN_MUIC') {
							
						$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
								'Here is your request details.<br />';
							
						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
						if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
							foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
								$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
							}
						}
						$content = $content.'Request From Date : '.$model->from_date.'<br />'.
								'To Date : '.$model->thru_date.'<br />'.
								'Best Regards.';
						if(isset($model->user_login->email)) {
							MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
						}
							
						// 						if($model->location == 'WHITHIN_MUIC') {
						// 							if(isset($model->chef_email)) {
						// 								MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
						// 							}
						// 						}
							
							
					}else{
						//เธชเน�เธ�เน€เธกเธฅ
						$content = 'Hi ' . $model->user_login->user_information->first_name.', You have request borrow equipment.<br />'.
								'Here is your request details.<br />';

						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id='".$model->id."'"));
						if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0) {
							foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType) {
								$content = $content.$requestBorrowEquipmentType->equipment_type->name." ".$requestBorrowEquipmentType->quantity.'<br>';
							}
						}
						$content = $content.'Request From Date : '.$model->from_date.'<br />'.
								'To Date : '.$model->thru_date.'<br />'.
								'Best Regards.';
						if(isset($model->user_login->email)) {
							MailUtil::sendMail($model->user_login->email, 'Support AV-Online, Request Borrow Result', $content);
						}
						// 						if(isset($model->approve_by)) {
						// 							MailUtil::sendMail($model->approve_by, 'Support AV-Online, Request Borrow Result', $content);
						// 						}
						// 						if(isset($model->chef_email)) {
						// 							MailUtil::sendMail($model->chef_email, 'Support AV-Online, Request Borrow Result', $content);
						// 						}
					}
					//เธชเน�เธ�เน€เธกเธฅ

				}
			}
		}
		$this->redirect(Yii::app()->createUrl('RequestBorrow/ListApprove'));
	}

}