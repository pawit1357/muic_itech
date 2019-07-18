<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class RequestBorrowNewController extends CController {
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
				"VIEW_REQUEST_BORROW",
				"VIEW_ALL_REQUEST_BORROW",
				"CREATE_REQUEST_BORROW",
				"UPDATE_REQUEST_BORROW",
				"DELETE_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		$model = new RequestBorrow ();
		$model->initial = true;

		if (isset ( $_GET ['startDateFrom'] )) {
			$model->startDateFrom = addslashes ( $_GET ['startDateFrom'] );
			$model->initial = false;
		}
		if (isset ( $_GET ['endDateFrom'] )) {
			$model->endDateFrom = addslashes ( $_GET ['endDateFrom'] );
			$model->initial = false;
		}
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
		if (isset ( $_GET ['search_status'] )) {
			$model->search_status = addslashes ( $_GET ['search_status'] );
		}
		if (isset ( $_GET ['isOverReturnDate'] )) {
			$model->isOverReturnDate = addslashes ( $_GET ['isOverReturnDate'] );
		}

		$this->render ( 'main', array (
				'data' => $model
		) );
	}
	public function actionBorrow() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		if (UserLoginUtil::isInUseEquipment ( UserLoginUtil::getUserLoginId () )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/000' ) );
		}

		if (isset ( $_POST ['RequestBorrow'] )) {
				
			$transaction = Yii::app ()->db->beginTransaction ();
			try {
				$eqs = $_POST ['eqs'];

				// Add Request
				$sendApproveMail = false;
				// $lecturerEmail;
				$subj_code;
				$nextApproveId = - 1;

				$requestBorrow = new RequestBorrow ();

				$requestBorrow->approve_by = UserLoginUtil::getUserLogin ()->parent;

				list ( $day, $month, $year ) = explode ( '-', $_POST ['RequestBorrow'] ['from_date'] );
				$_POST ['RequestBorrow'] ['from_date'] = $year . '-' . $month . '-' . $day;
				list ( $day, $month, $year ) = explode ( '-', $_POST ['RequestBorrow'] ['thru_date'] );
				$_POST ['RequestBorrow'] ['thru_date'] = $year . '-' . $month . '-' . $day;
				$requestBorrow->attributes = $_POST ['RequestBorrow'];

				$requestBorrow->DocumentNo = CommonUtil::getDocumentNo ();
				// if (isset ( $_POST ['RequestBorrow'] ['teacher_id'] ) && $_POST ['RequestBorrow'] ['teacher_id'] != '') {
				// $lecturerEmail = UserLoginUtil::getUserById ( $_POST ['RequestBorrow'] ['teacher_id'] )->email;
				// }
				if (isset ( $_POST ['RequestBorrow'] ['teacher_id'] ) && $_POST ['RequestBorrow'] ['teacher_id'] != '') {
					$subj_code = $_POST ['RequestBorrow'] ['teacher_id'];

				}

				$requestBorrow->user_login_id = UserLoginUtil::getUserLoginId ();

				if (UserLoginUtil::areUserRole ( array (
						UserRoles::ADMIN
				) )) {
					$requestBorrow->status_code = "R_B_NEW_PREPARE";
				} elseif (UserLoginUtil::areUserRole ( array (
						UserRoles::LECTURER,
						UserRoles::STAFF_AV,
						UserRoles::STAFF
				) )) {

					// CASE:: USE SAME DAY
					if ($_POST ['RequestBorrow'] ['from_date'] == $_POST ['RequestBorrow'] ['thru_date']) {
						if ($requestBorrow->location == 'WHITHIN_MUIC') {
							$requestBorrow->status_code = "R_B_NEW_PREPARE";
						} else {
							$requestBorrow->status_code = "R_B_NEW_WAIT_APPROVE_2";
							$sendApproveMail = true;
							// find approver
							$userApprover = UserLogin::model ()->findAll ( array (
									'condition' => "ApproverType in (2) and isApprover_1=1"
							) );
							if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
								$nextApproveId = $userApprover [0]->id;
							} else {
								echo 'CASE:: USE SAME DAY->Approver is empty.';
							}
						}
					} else {
						// CASE:: USER MORE 1 DAY
						$requestBorrow->status_code = "R_B_NEW_WAIT_APPROVE_2";
						$sendApproveMail = true;
						// find approver
						$userApprover = UserLogin::model ()->findAll ( array (
								'condition' => "ApproverType in (2) and isApprover_1=1"
						) );
						if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
							$nextApproveId = $userApprover [0]->id;
						} else {
							echo 'CASE:: USER MORE 1 DAY->Approver is empty.';
						}
					}
				} else {
					// STUDENT CASE
					$requestBorrow->status_code = "R_B_NEW_WAIT_APPROVE_1";
					$sendApproveMail = true;
					
					/*
					// find approver
					$userApprover = UserLogin::model ()->findAll ( array (
							'condition' => "ApproverType in (1) and isApprover_1=1"
					) );
					if (isset ( $userApprover ) && count ( $userApprover ) > 0) {

						if ($subj_code == "004") {
							//Fix only Communication Design send approve to Dr. Permsak Suwanatat
							$nextApproveId =1383;//AJ.dale.kon $userApprover [1]->id;
						} else {
							//$nextApproveId =1386;//Aj.arron $userApprover [0]->id;
							$nextApproveId =253;//Aj.arron $userApprover [0]->id;
							
						}

						if ($subj_code == "005") {
							//Fix only Communication Design send approve to Dr. Permsak Suwanatat
							$nextApproveId =1373;//Aj.Norachai $userApprover [0]->id;
						}


					} else {
						echo 'STUDENT CASE->Approver is empty.';
					}
					*/
					
					if(UserLoginUtil::areUserRole ( array (UserRoles::STUDENT_FAA))){
					    $nextApproveId =1385;//dynaya.bhu@mahidol.ac.th
					}else if(UserLoginUtil::areUserRole ( array (UserRoles::STUDENT))){
					    $nextApproveId =1373;//wankwan.pol@mahidol.ac.th
					}

				}
				

				$requestBorrow->approve_by = $nextApproveId;

				if ($requestBorrow->status_code == 'R_B_NEW_WAIT_APPROVE_1') {
					$requestBorrow->approver1 = $requestBorrow->approve_by;
				}
				if ($requestBorrow->status_code == 'R_B_NEW_WAIT_APPROVE_2') {
					$requestBorrow->approver2 = $requestBorrow->approve_by;
				}

				$requestBorrow->create_date = date ( "Y-m-d H:i:s" );
				//Add Day +1 for prevent student borrow but not have equipment.	
				$requestBorrow->thru_date =  date('Y-m-d',strtotime('+0 day', strtotime($requestBorrow->thru_date)));
				//
				$addSuccess = true;

				if ($requestBorrow->save ()) {
					$model = $requestBorrow;

					if (isset ( $eqs )) {
						foreach ( $eqs as $equipment => $qty ) {

							$equipId = addslashes ( $equipment );
							list ( $equipment_type_id, $equipment_type_list_id ) = split ( ',', $equipId );
							$requestBorrowEquipmentType = new RequestBorrowEquipmentType ();
							$requestBorrowEquipmentType->request_borrow_id = $requestBorrow->getPrimaryKey ();
							$requestBorrowEquipmentType->quantity = addslashes ( $qty );
							$requestBorrowEquipmentType->equipment_type_list_id = $equipment_type_list_id;

							if (! $requestBorrowEquipmentType->save ()) {
								$addSuccess = false;
								break;
							}
						}
					}

					// Send Mail to owner
					$content = MailUtil::getBorrowDetailMailContent ( $model );
// 					echo "===".$content;
					
					if (isset ( $model->user_login->email )) {
						MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Borrow Result', $content );
					}
					// Send Mail to lecturer
					// if (isset ( $lecturerEmail )) {
					// MailUtil::sendMail ( $lecturerEmail, 'Support AV-Online, Request Borrow Result', $content );
					// }

					// Send Mail to approve 1
					if ($sendApproveMail) {
						$key = md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) ) . md5 ( rand ( 0, 2000 ) );
						$requestBorrowId = $requestBorrow->getPrimaryKey ();
						$createDate = date ( 'Y-m-d H:i:s' );
						$status = "ACTIVE";
						$approveType = "APPROVE_1";

						$requestBorrowApproveLink = new RequestBorrowApproveLink ();
						$requestBorrowApproveLink->request_key = $key;
						$requestBorrowApproveLink->request_borrow_id = $requestBorrowId;
						$requestBorrowApproveLink->create_date = $createDate;
						$requestBorrowApproveLink->status = $status;
						$requestBorrowApproveLink->approve_type = $approveType;

						if ($requestBorrowApproveLink->save ()) {
							$approveUser = UserLogin::model ()->findByPk ( $nextApproveId );
							$content = MailUtil::getApproveMailContent ( $key, $requestBorrow );

							if (isset ( $approveUser->email )) {
								MailUtil::sendMail ( UserLoginUtil::getUserById ( $nextApproveId )->email, 'Support AV-Online, Approve Request Booking', $content );
							}
						}
					}
					
				} else {
					$addSuccess = false;
				}

				if ($addSuccess) {

					$transaction->commit ();
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $requestBorrow->getPrimaryKey () ) );
					$this->render ( 'borrow', array (
							'data' => $model
					) );
				} else {
					$transaction->rollback ();
					$model = new RequestBorrow ();
					$this->render ( 'borrow', array (
							'data' => $model
					) );
				}



			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503/errMsg/'.$e->getMessage() ) );
				//$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}

		} else {
			// Render
			$this->render ( 'borrow' );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = $this->loadModel ();
		$this->render ( 'view', array (
				'data' => $model
		) );
	}
	public function actionPrepare() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		if (isset ( $_POST ['eq_item'] )) {
			try {
				$id = addslashes ( $_GET ['id'] );
				$items = $_POST ['eq_item'];
				$otherDevice = $_POST ['other-device'];

				$transaction = Yii::app ()->db->beginTransaction ();
				$addSuccess = true;

				if (isset ( $_POST ['eqTypeIdDelete'] )) {
					foreach ( $items as $eId => $eTypeId ) {
						$criteria = new CDbCriteria ();
						$criteria->condition = "request_borrow_id = '" . $id . "'";
						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->deleteAll ( $criteria );
					}
				}

				// echo "XXX1XXX";

				foreach ( $items as $eId => $eTypeId ) {

					$criteria = new CDbCriteria ();
					$criteria->condition = "request_borrow_id = '" . $id . "' and equipment_type_list_id='" . $eTypeId . "'";
					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( $criteria );

					$requestBorrowEquipmentType = new RequestBorrowEquipmentType ();
					if (isset ( $requestBorrowEquipmentTypes ) && count ( $requestBorrowEquipmentTypes ) > 0) {
						$requestBorrowEquipmentType = $requestBorrowEquipmentTypes[0];
					} else {

						$requestBorrowEquipmentType = new RequestBorrowEquipmentType ();
						$requestBorrowEquipmentType->request_borrow_id = $id;
						$requestBorrowEquipmentType->equipment_type_list_id = $eTypeId;
						$requestBorrowEquipmentType->quantity = CommonUtil::countQuantity($items,$eTypeId);
						if ($requestBorrowEquipmentType->save ()) {
							$requestBorrowEquipmentType->id = $requestBorrowEquipmentType->getPrimaryKey ();
						} else {
							$addSuccess = false;
						}
						echo "#2#<br>";
					}

					$criteria = new CDbCriteria ();
					$criteria->condition = "equipment_id = '" . $eId . "' and request_borrow_equipment_type_id='" . $requestBorrowEquipmentType->id . "'";
					$requestItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
					if (count ( $requestItems ) <= 0) {
						$model = new RequestBorrowEquipmentTypeItem ();
						$model->request_borrow_equipment_type_id = $requestBorrowEquipmentType->id;
						$model->equipment_id = $eId;
						if (! $model->save ()) {
							$addSuccess = false;
						}
					}
					//update quantity
					$requestBorrowEquipmentType->quantity = CommonUtil::countQuantity($items,$eTypeId);
					$requestBorrowEquipmentType->save();

				}

				// echo "XXX2XXX";
				$countFinish = true;
				$requestEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
						'condition' => "request_borrow_id='" . $id . "'"
				) );

				foreach ( $requestEquipmentTypes as $requestEquipmentType ) {
					$requestQty = $requestEquipmentType->quantity;
					$requestEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( array (
							'condition' => "request_borrow_equipment_type_id='" . $requestEquipmentType->id . "'"
					) );
					if (count ( $requestEquipmentTypeItems ) < $requestQty) {
						$countFinish = false;
						break;
					}
				}

				// echo "XXX3XXX";
				if (! $countFinish) {
					$status = 'R_B_NEW_READY_MISSING';
				} else {
					$status = 'R_B_NEW_READY';
				}

				if ($addSuccess) {

					$requestBorrow = RequestBorrow::model ()->findbyPk ( $id );
					if (isset ( $requestBorrow )) {
						$requestBorrow->otherDevice = $otherDevice;
						$requestBorrow->status_code = $status;
						$requestBorrow->save ();
					}
					$transaction->commit ();
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );

				} else {
					$transaction->rollback ();
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/Prepare/id/' . $id ) );
				}

			} catch ( CDbException $e ) {
				echo $e;
				// 				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$data = RequestBorrow::model ()->findByPk ( addslashes ( $_GET ['id'] ) );
			$this->render ( 'prepare', array (
					'data' => $data
			) );
		}
	}
	public function actionReturn() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		if (isset ( $_POST ['save_request'] ) && $_POST ['save_request'] == 'Save') {
			try {
				$id = addslashes ( $_GET ['id'] );
				$items = $_POST ['eq_items'];
				$transaction = Yii::app ()->db->beginTransaction ();
				$addSuccess = true;

				// clear all return
				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_id = '" . $id . "'";
				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( $criteria );
				if (isset ( $requestBorrowEquipmentTypes ) && count ( $requestBorrowEquipmentTypes > 0 )) {
					foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {
						$criteria = new CDbCriteria ();
						$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
						$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
						foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
							$requestBorrowEquipmentTypeItem->return_date = '';
							$requestBorrowEquipmentTypeItem->return_price = '0';
							$requestBorrowEquipmentTypeItem->broken_price = '0';
							$requestBorrowEquipmentTypeItem->save ();
						}
					}
				}

				// set Return
				if (isset ( $items )) {
					foreach ( $items as $eTypeId => $eId ) {
						$criteria = new CDbCriteria ();
						$criteria->condition = "t.equipment_id = '" . $eId . "' and request_borrow_equipment_type.request_borrow_id = '" . $id . "'";
						$requestItems = RequestBorrowEquipmentTypeItem::model ()->with ( array (
								'request_borrow_equipment_type'
						) )->findAll ( $criteria );
						if (isset ( $requestItems ) && count ( $requestItems ) > 0) {
							foreach ( $requestItems as $requestItem ) {
								$model = $this->loadModel ();
								$borrow = strtotime ( $model->thru_date );
								$current = strtotime ( date ( 'Y-m-d' ) );
								$day_diff = floor ( ($current - $borrow) / 60 / 60 / 24 );
								if ($day_diff > 0) {
									$setting = Setting::model ()->findByPk ( 1 );
									$requestItem->return_price = $day_diff * $setting->returnLatePricePerDay;
								}

								if (isset ( $_POST ['brokenPrice'] [$requestItem->equipment_id] )) {
									$requestItem->broken_price = $_POST ['brokenPrice'] [$requestItem->equipment_id];
								}
								if (isset ( $_POST ['brokenRemark'] [$requestItem->equipment_id] )) {
									$requestItem->remark = $_POST ['brokenRemark'] [$requestItem->equipment_id];
								}

								$requestItem->return_date = time ();
								if (! $requestItem->save ()) {
									$addSuccess = false;
								}
							}
						}
					}
				}

				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_equipment_type.request_borrow_id ='" . $id . "'";
				$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->with ( array (
						'request_borrow_equipment_type'
				) )->findAll ( $criteria );
				$isReturnAll = true;
				if (isset ( $requestBorrowEquipmentTypeItems )) {
					foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
						if ($requestBorrowEquipmentTypeItem->return_date == '') {
							$isReturnAll = false;
							break;
						}
					}
				}
				$status = '';
				if ($isReturnAll) {
					$status = 'R_B_NEW_RETURNED';
				} else {
					$status = 'R_B_NEW_RETURNED_MISSING';
				}
				$requestBorrow = RequestBorrow::model ()->findbyPk ( $id );
				if (isset ( $requestBorrow )) {
					$requestBorrow->status_code = $status;
					$requestBorrow->save ();
				}

				if ($addSuccess) {
					$transaction->commit ();
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );
				} else {
					$transaction->rollback ();
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/Return/id/' . $id ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$data = RequestBorrow::model ()->findByPk ( addslashes ( $_GET ['id'] ) );
			$availableReturnStatus = array (
					'R_B_NEW_READY',
					'R_B_NEW_READY_MISSING',
					'R_B_NEW_RETURNED_MISSING'
			);
			if (! in_array ( $data->status_code, $availableReturnStatus )) {
				throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
						'{action}' => $actionID == '' ? $this->defaultAction : $actionID
				) ) );
			}

			$this->render ( 'return', array (
					'data' => $data
			) );
		}
	}
	public function actionListApprove() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = new RequestBorrow ();
		$model->status_for_approve = true;
		$model->clearDateFilter ();
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
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
				"UPDATE_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/ListApprove' ) );
	}
	public function actionDisapproveRequest() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/ListApprove' ) );
	}
	public function actionApprove() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BORROW",
				"VIEW_ALL_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		// Render
		$model = $this->loadModel ();

		if (isset ( $_POST ['submit'] )) {
			try {
				$submit = $_POST ['submit'];
				$id = $_GET ['id'];
				$remark = $_POST ['disapprove-reason'];
				$status = '';
				$hasNextApprove = false;
				$approveStatus = true;
				$nextApproveId = "";
				if ($submit == 'Approve') {
					$requestUser = UserLogin::model ()->findByPk ( $model->user_login_id );
					if (isset ( $requestUser )) {
						switch($model->status_code)
						{
							case "R_B_NEW_WAIT_APPROVE_1":

								switch($requestUser->role_id)
								{
								    case 3://STUDENT
									case 6://FA STUDENT
										//GET get approve 2 for student
										$userApprover = UserLogin::model ()->findAll ( array ('condition' => "ApproverType in (1) and isApprover_2=1") );
										if (isset ( $userApprover )) {
										    $nextApproveId = $userApprover [0]->id;//jerimiah.mor@mahidol.ac.th 
											$status = 'R_B_NEW_WAIT_APPROVE_2';
											$hasNextApprove =true;
											$model->approver2 = $nextApproveId;
										}else {
											echo "Can't find student approver user.";
											$approveStatus = false;
										}
										break;
									default://STAFF
										//GET get approve 2 for staff
										$userApprover = UserLogin::model ()->findAll ( array ('condition' => "ApproverType in (2) and isApprover_2=1") );
										if (isset ( $userApprover )) {
											$nextApproveId = $userApprover [0]->id;
											$status = 'R_B_NEW_WAIT_APPROVE_2';
											$hasNextApprove =true;
											$model->approver2 = $nextApproveId;
										}else {
											echo "Can't find staff approver user.";
											$approveStatus = false;
										}
										break;
								}
								break;
							case "R_B_NEW_WAIT_APPROVE_2":
									
								$status = 'R_B_NEW_PREPARE';
								$hasNextApprove = false;
								break;
						}
					}else {
						echo "Can't find  requestUser user";
						$approveStatus = false;
					}
				}else {
					$status = 'R_B_NEW_DISAPPROVE';
					$model->remark = $remark;
					$hasNextApprove =false;
				}

				$model->status_code = $status;
				if($approveStatus ){
					if ($model->save ()) {

						RequestUtil::deleteAllRequestLinkKey ( $model->id );

						if ($submit == 'Approve') {
							$content = MailUtil::getBorrowStatusChangeMailContent ( $model );
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Status Approve', $content );
							if ($hasNextApprove) {
								RequestUtil::sendApproveLink ( $model->id, $nextApproveId );
							}
						} else {

							$content = MailUtil::getBorrowStatusChangeMailContent ( $model );
							MailUtil::sendMail ( $model->user_login->email, 'Support AV-Online, Request Booking Status Disapprove', $content );
						}

						$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );
					} else {
						$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );
					}
				}else
				{
					echo "SOMETHING WRONG!!".$approveStatus.",".CommonUtil::isEmpty ( $nextApproveId );
				}

			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503/errMsg/'.$e->getMessage() ) );
			}

		} else {
			$this->render ( 'approve_item', array (
					'data' => $model
			) );
		}
	}
	public function actionPrint() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_REQUEST_BORROW"
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}
		// Render
		$model = $this->loadModel ();

		$setting = Setting::model ()->findByPk ( 1 );

		$this->layout = 'ajax2';
		$this->render ( ($setting->print_format == "1") ? 'print_themal' : 'print', array (
				'data' => $model
		) );
	}
	public function actionDelete() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		$model = $this->loadModel ();
		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) ) && $model->user_login_id != UserLoginUtil::getUserLoginId ()) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID
			) ) );
		}
		$model->status_code = 'R_B_NEW_CANCELLED';
		try {
			$model->save ();
		} catch ( CDbException $e ) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $model->id ) );
	}
	
	public function actionApproveExternal() {
		// $this->layout='main';
		$key = $_GET ['key'];
		$requestBorrowApproveLinks = RequestBorrowApproveLink::model ()->findAll ( array (
				'condition' => "request_key='" . $key . "'"
		) );
		if (isset ( $requestBorrowApproveLinks ) && count ( $requestBorrowApproveLinks ) > 0) {
			try {

				$requestBorrowApproveLink = $requestBorrowApproveLinks [0];
				$requestBorrow = RequestBorrow::model ()->findByPk ( $requestBorrowApproveLink->request_borrow_id );
				if (isset ( $requestBorrow )) {
					$hasNextApprove = true;
					$nextApproveId = '';

					$requestUser = UserLogin::model ()->findByPk ( $requestBorrow->user_login_id );
					if (isset ( $requestUser )) {
						switch($requestBorrow->status_code)
						{
							case "R_B_NEW_WAIT_APPROVE_1":
									
								switch($requestUser->role_id)
								{
									case 6://FA STUDENT
										//GET get approve 2 for student
										$userApprover = UserLogin::model ()->findAll ( array ('condition' => "ApproverType in (1) and isApprover_2=1") );
										if (isset ( $userApprover )) {
											$nextApproveId = $userApprover [0]->id;
											$status = 'R_B_NEW_WAIT_APPROVE_2';
											$hasNextApprove =true;
											$model->approver2 = $nextApproveId;
										}else {
											$_SESSION ['r-message']= "Can't find student approver user.";
											$approveStatus = false;
										}
										break;
									default://STAFF
										//GET get approve 2 for staff
										$userApprover = UserLogin::model ()->findAll ( array ('condition' => "ApproverType in (2) and isApprover_2=1") );
										if (isset ( $userApprover )) {
											$nextApproveId = $userApprover [0]->id;
											$status = 'R_B_NEW_WAIT_APPROVE_2';
											$hasNextApprove =true;
											$model->approver2 = $nextApproveId;
										}else {
											$_SESSION ['r-message']= "Can't find staff approver user.";
											$approveStatus = false;
										}
										break;
								}
								break;
							case "R_B_NEW_WAIT_APPROVE_2":
								$status = 'R_B_NEW_PREPARE';
								$hasNextApprove = false;
								break;
						}

						$requestBorrow->status_code = $status;
						$requestBorrow->update();
						RequestUtil::deleteAllRequestLinkKey ( $requestBorrow->id );

						$content = MailUtil::getBorrowStatusChangeMailContent ( $requestBorrow );
						echo "===".$content;
						MailUtil::sendMail ( $requestBorrow->user_login->email, 'Support AV-Online, Request Booking Status Approve', $content );
						$_SESSION ['r-message'] = 'The request has been approved.';
						if ($hasNextApprove) {
							RequestUtil::sendApproveLink ( $requestBorrow->id, $nextApproveId );
						}
					}else {
						$_SESSION ['r-message'] = 'The approver not found.';
					}
				} else {
					$_SESSION ['r-message'] = 'The request not found.';
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$_SESSION ['r-message'] = 'Key not found.';
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/ApproveResult' ) );
	}
	public function actionDisapproveExternal() {
		$key = $_GET ['key'];
		$requestBorrowApproveLinks = RequestBorrowApproveLink::model ()->findAll ( array (
				'condition' => "request_key='" . $key . "'"
		) );
		if (isset ( $requestBorrowApproveLinks ) && count ( $requestBorrowApproveLinks ) > 0) {
			try {
				$requestBorrowApproveLink = $requestBorrowApproveLinks [0];
				$requestBorrow = RequestBorrow::model ()->findByPk ( $requestBorrowApproveLink->request_borrow_id );
				if (isset ( $requestBorrow )) {
					if ($requestBorrow->status_code == 'R_B_NEW_WAIT_APPROVE_1') {
						$status = 'R_B_NEW_DISAPPROVE';
					} else if ($requestBorrow->status_code == 'R_B_NEW_WAIT_APPROVE_2') {
						$status = 'R_B_NEW_DISAPPROVE';
					}

					$requestBorrow->status_code = $status;
					$requestBorrow->update ();
					RequestUtil::deleteAllRequestLinkKey ( $requestBorrow->id );
					$stausObj = Status::model ()->findByPk ( $status );

					$content = MailUtil::getBorrowStatusChangeMailContent ( $requestBorrow );
					MailUtil::sendMail ( $requestBorrow->user_login->email, 'Support AV-Online, Request Booking Status Disapprove', $content );
					$_SESSION ['r-message'] = 'The request has been disapproved.';
				} else {
					$_SESSION ['r-message'] = 'The request not found.';
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$_SESSION ['r-message'] = 'Key not found.';
		}
		$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/ApproveResult' ) );
	}
	
	public function actionApproveResult() {
		$this->render ( 'approve_result' );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = RequestBorrow::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
	public function actionEquipmentList() {
		$model = new Equipment ();

		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}

		$this->render ( 'equipmentList', array (
				'data' => $model
		) );
	}
	public function actionEquipmentTypeList() {
		$model = new EquipmentTypeList ();

		// Set Search Text
		// 		if (isset ( $_GET ['date_filter'] )) {
		// 			$model->date = addslashes ( $_GET ['date_filter'] );
		// 		}

		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}

		$this->render ( 'equipmenTypetList', array (
				'data' => $model
		) );
	}
	public function actionEdit() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		if (isset ( $_POST ['save_request'] )) {
			try {
				$id = addslashes ( $_GET ['id'] );

				$otherDevice = $_POST ['other-device'];
				$status_code = $_POST ['search_status'];

				if (isset ( $_POST ['eq_item'] )) {

					$items = $_POST ['eq_item'];
					$items_return_price = $_POST ['eq_item_return_price'];
					$items_broken_price = $_POST ['eq_item_broken_price'];

					$transaction = Yii::app ()->db->beginTransaction ();

					// Delete old data
					$criteria = new CDbCriteria ();
					$criteria->condition = "request_borrow_id = '" . $id . "'";
					$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( $criteria );
					if (isset ( $requestBorrowEquipmentTypes )) {

						foreach ( $requestBorrowEquipmentTypes as $item ) {
							$criteria1 = new CDbCriteria ();
							$criteria1->condition = "request_borrow_equipment_type_id='" . $item->id . "'";
							if (RequestBorrowEquipmentTypeItem::model ()->deleteAll ( $criteria1 )) {
								// echo 'delte ' . $item->id . '';
							}
						}

						$criteria2 = new CDbCriteria ();
						$criteria2->condition = "request_borrow_id = '" . $id . "'";
						RequestBorrowEquipmentType::model ()->deleteAll ( $criteria2 );
					}

					$addSuccess = true;

					foreach ( $items as $eId => $eTypeId ) {

						$criteria = new CDbCriteria ();
						$criteria->condition = "request_borrow_id = '" . $id . "' and equipment_type_list_id='" . $eTypeId . "'";
						$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( $criteria );

						if (isset ( $requestBorrowEquipmentTypes ) && count ( $requestBorrowEquipmentTypes ) > 0) {

							$requestBorrowEquipmentType = $requestBorrowEquipmentTypes [0];
						} else {

							$requestBorrowEquipmentType = new RequestBorrowEquipmentType ();
							$requestBorrowEquipmentType->request_borrow_id = $id;
							$requestBorrowEquipmentType->equipment_type_list_id = $eTypeId;
							$requestBorrowEquipmentType->quantity = 1;
							if ($requestBorrowEquipmentType->save ()) {
								$requestBorrowEquipmentType->id = $requestBorrowEquipmentType->getPrimaryKey ();
							} else {
								$addSuccess = false;
							}
						}

						$criteria = new CDbCriteria ();
						$criteria->condition = "equipment_id = '" . $eId . "' and request_borrow_equipment_type_id='" . $requestBorrowEquipmentType->id . "'";
						$requestItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
						if (count ( $requestItems ) <= 0) {
							$model = new RequestBorrowEquipmentTypeItem ();
							$model->request_borrow_equipment_type_id = $requestBorrowEquipmentType->id;
							$model->equipment_id = $eId;
							if (! $model->save ()) {
								$addSuccess = false;
							}
						}
					}

					$countFinish = true;
					$requestEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
							'condition' => "request_borrow_id='" . $id . "'"
					) );

					foreach ( $requestEquipmentTypes as $requestEquipmentType ) {
						$requestQty = $requestEquipmentType->quantity;
						$requestEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( array (
								'condition' => "request_borrow_equipment_type_id='" . $requestEquipmentType->id . "'"
						) );
					}

					if ($addSuccess) {
						$requestBorrow = RequestBorrow::model ()->findbyPk ( $id );

						if (isset ( $requestBorrow )) {
							$requestBorrow->status_code = $status_code;
							$requestBorrow->otherDevice = $otherDevice;
							$requestBorrow->save ();
						}

						$transaction->commit ();
						$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );
					} else {

						$transaction->rollback ();
						$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/edit/id/' . $id ) );
					}
				} else {
					// echo "11111";
					if (isset ( $status_code )) {
						$requestBorrow = RequestBorrow::model ()->findbyPk ( $id );
						// echo "2222";
						if (isset ( $requestBorrow )) {


							$nextApproveId = 0;
							switch ($requestBorrow->user_login->role->id)
							{
								case 6://Student FAA
									switch ($status_code)
									{
										case "R_B_NEW_WAIT_APPROVE_1":
											$userApprover = UserLogin::model ()->findAll ( array (
											'condition' => "ApproverType in (1) and isApprover_1=1"
													) );
													if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
														$requestBorrow->approver1=$userApprover [0]->id;
														$nextApproveId  = $requestBorrow->approver1;
													}else {
														echo "Not found approver 1.";
													}
													break;
										case "R_B_NEW_WAIT_APPROVE_2":
											$userApprover = UserLogin::model ()->findAll ( array (
											'condition' => "ApproverType in (1) and isApprover_2=1"
													) );
													if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
														$requestBorrow->approver2=$userApprover [0]->id;
														$nextApproveId  = $requestBorrow->approver2;
													}else {
														echo "Not found approver 2.";
													}
													break;

									}
									break;
								default:
									switch ($status_code)
									{
										case "R_B_NEW_WAIT_APPROVE_1":
											$userApprover = UserLogin::model ()->findAll ( array (
											'condition' => "ApproverType in (2) and isApprover_1=1"
													) );
													if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
														$requestBorrow->approver1=$userApprover [0]->id;
														$nextApproveId  = $requestBorrow->approver1;
													}else {
														echo "Not found approver 1.";
													}
													break;
										case "R_B_NEW_WAIT_APPROVE_2":
											$userApprover = UserLogin::model ()->findAll ( array (
											'condition' => "ApproverType in (2) and isApprover_2=1"
													) );
													if (isset ( $userApprover ) && count ( $userApprover ) > 0) {
														$requestBorrow->approver2=$userApprover [0]->id;
														$nextApproveId  = $requestBorrow->approver2;
													}else {
														echo "Not found approver 2.";
													}
													break;
									}
									break;
							}
							if( $nextApproveId != 0 ){
								$requestBorrow->approve_by =$nextApproveId;
							}
							$requestBorrow->status_code = $status_code;
							$requestBorrow->otherDevice = $otherDevice;
							$requestBorrow->save ();
							// echo "3333";
						} else {
						}
					}

					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/View/id/' . $id ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$data = RequestBorrow::model ()->findByPk ( addslashes ( $_GET ['id'] ) );
			$this->render ( 'edit', array (
					'data' => $data
			) );
		}
	}
	public function actionEditFine() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		// $ids = array();
		$ids = '';

		$criteria = new CDbCriteria ();
		$criteria->condition = "request_borrow_id = '" . $_GET ['id'] . "'";
		$requestItems = RequestBorrowEquipmentType::model ()->findAll ( $criteria );
		if (isset ( $requestItems ) && count ( $requestItems > 0 )) {
			foreach ( $requestItems as $dat ) {
				$ids .= $dat->id . ',';
			}
			// Render
			if($id !=''){
				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_equipment_type_id in (" . substr ( $ids, 0, - 1 ) . ")";

				$data = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );

				$this->render ( 'editfine', array (
						'data' => $data
				) );
			}
		}
		$model = $this->loadModel ();
		$this->render ( 'view', array (
				'data' => $model
		) );

	}
	public function actionUpdateFine() {
		// Authen Login
		if (! UserLoginUtil::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'management/login' ) );
		}

		if (! UserLoginUtil::areUserRole ( array (
				UserRoles::ADMIN,
				UserRoles::STAFF_AV
		) )) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/404' ) );
		}

		$model = RequestBorrowEquipmentTypeItem::model ()->findByPk ( addslashes ( $_GET ['id'] ) );
		if (isset ( $_POST ['RequestBorrowEquipmentTypeItem'] )) {
			try {

				// echo $_GET ['id'].'::'.$_POST['RequestBorrowEquipmentTypeItem']['return_price'];

				$model->return_price = $_POST ['RequestBorrowEquipmentTypeItem'] ['return_price'];
				$model->broken_price = $_POST ['RequestBorrowEquipmentTypeItem'] ['broken_price'];
				if ($model->update ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'RequestBorrowNew/' ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}

		$this->render ( 'updatefine', array (
				'model' => $model
		) );
	}


}