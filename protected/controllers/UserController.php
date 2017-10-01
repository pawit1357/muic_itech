<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class UserController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_USER",
				"CREATE_USER",
				"UPDATE_USER",
				"DELETE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		$model = new UserLogin ();
		// Make not find self account
		$model->exceptFindId = UserLoginUtil::getUserLoginId ();
		
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
			$model->username_search = $usernameSearch;
		}
		
		if (isset ( $_POST ['User'] )) {
			
			$upload_path = realpath ( Yii::app ()->basePath . '/../upload' );
			$file = $upload_path . $_POST ['User'] ['file_path'];
			if (file_exists ( $file )) {
				
				// echo '===='.$file;
				/*
				 * Upload
				 */
				Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
				$data = new JPhpExcelReader ( $file );
				$num_row = $data->rowcount () + 1;
				
				// Insert user
				
				while ( $index != $num_row ) {
					if ($index > 1) {
						
						$user = $data->val ( $index, 'A' );
						$under = $data->val ( $index, 'B' );
						$role = $data->val ( $index, 'C' );
						$isApprove_1 = $data->val ( $index, 'D' );
						$isApprove_2 = $data->val ( $index, 'E' );
						$ApproverType = $data->val ( $index, 'F' );
						$firstName = $data->val ( $index, 'G' );
						
						$criteria = new CDbCriteria ();
						$criteria->condition = "username = '" . $user . "'";
						$tmpUser = UserLogin::model ()->findAll ( $criteria );
						
						if (! isset ( $tmpUser [0] )) {
							
							$model = new UserLogin ();
							$model->parent = 1;
							$model->role_id = $role; // (!empty($role)? $role: ( is_numeric(substr($user,1,1)) )? 3:4);
							$model->username = $user;
							$model->isApprover_1 = (empty ( $isApprove_1 ) ? "" : $isApprove_1);
							$model->isApprover_2 = (empty ( $isApprove_2 ) ? "" : $isApprove_2);
							$model->ApproverType = (empty ( $ApproverType ) ? "" : $ApproverType);
							$model->password = md5 ( $user );
							$model->status = "ACTIVE";
							$model->create_by = "1";
							$model->email = $user . "@mahidol.ac.th";
							$model->latest_login = date ( "Y-m-d H:i:s" );
							
							if ($model->save ()) {
								$uInfo = new UserInformation ();
								$uInfo->id = $model->id;
								$uInfo->personal_card_id = $model->id;
								$uInfo->personal_title = "";
								$uInfo->first_name = $firstName;
								$uInfo->last_name = "";
								$uInfo->gender = "";
								$uInfo->birth_date = date ( 'Y-m-d H:i:s' );
								$uInfo->address1 = "";
								$uInfo->address2 = "";
								$uInfo->sub_district = "";
								$uInfo->district = "";
								$uInfo->province = "";
								$uInfo->postal_code = "";
								$uInfo->phone = "";
								$uInfo->mobile = "";
								
								try {
									if ($uInfo->save ()) {
										$this->redirect ( Yii::app ()->createUrl ( 'user/view/id/' . $userInfo->id ) );
									}
								} catch ( CDbException $e ) {
									$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
								}
							}
						} else {
							// user is exist
							
							// $tmpUser->parent = 1;
							
							// if($tmpUser->save()){
							
							// $criteria1 = new CDbCriteria;
							// $criteria1->condition="id = '".$tmpUser->id."'";
							// $tmpInfo = UserInformation::model()->findAll($criteria1);
							// $tmpInfo->first_name=$firstName;
							// if($tmpInfo->save()){
							// }
							// }
						}
					}
				}
				
				$index ++;
			}
			
			// update under
			
			// $index = 0;
			// while($index != $num_row){
			// //echo $index."::<br>";
			// if($index>1){
			
			// $user = $data->val($index, 'A');
			// $under = $data->val($index, 'B');
			
			// $criteria = new CDbCriteria;
			// $criteria->condition="username = '".$user."'";
			// $child = UserLogin::model()->findAll($criteria);
			// if(isset($child[0])) {
			// $criteria1 = new CDbCriteria;
			// $criteria1->condition="username = '".$under."'";
			// $parent = UserLogin::model()->findAll($criteria1);
			// if(isset($parent[0])) {
			// $child[0]->parent = $parent[0]->id;
			// $child[0]->update();
			// }else{
			// //echo "parent is null.<br>";
			// }
			// }else{
			// //echo "child is null.<br>";
			// }
			// }
			
			// $index++;
			// }
		} else {
			// die('The file ' . $file . ' was not found');
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionStaff() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_USER",
				"CREATE_USER",
				"UPDATE_USER",
				"DELETE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		$model = new UserLogin ();
		// Make not find self account
		$model->exceptFindId = UserLoginUtil::getUserLoginId ();
		$model->onlyStaff = true;
		
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$usernameSearch = addslashes ( $_GET ['search_text'] );
			$personalTitleSearch = addslashes ( $_GET ['search_text'] );
			$firstNameSearch = addslashes ( $_GET ['search_text'] );
			$lastNameSearch = addslashes ( $_GET ['search_text'] );
			$emailSearch = addslashes ( $_GET ['search_text'] );
			
			$model->username_search = $usernameSearch;
			$model->user_information_personal_title_search = $personalTitleSearch;
			$model->user_information_first_name_search = $firstNameSearch;
			$model->user_information_last_name_search = $lastNameSearch;
			$model->user_information_email_search = $emailSearch;
		}
		
		$this->render ( 'staff', array (
				'data' => $model 
		) );
	}
	public function actionAssignRoom() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		$model = $this->loadModel ();
		
		if (isset ( $_POST ['submit'] )) {
			RoomStaff::model ()->deleteAll ( "staff_id='" . $model->id . "'" );
			if (isset ( $_POST ['rooms'] )) {
				$rooms = $_POST ['rooms'];
				foreach ( $rooms as $room ) {
					$rs = new RoomStaff ();
					$rs->room_id = $room;
					$rs->staff_id = $model->id;
					$rs->save ();
				}
			}
			$this->redirect ( Yii::app ()->createUrl ( 'User/Staff/' ) );
		}
		
		$this->render ( 'assign_room', array (
				'data' => $model 
		) );
	}
	public function actionCreate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		if (isset ( $_POST ['add_user'] )) {
			$saveSuccess = false;
			$transaction = Yii::app ()->db->beginTransaction ();
			$userLogin = new UserLogin ();
			$userLogin->attributes = $_POST ['UserLogin'];
			$userLogin->password = md5 ( $userLogin->password );
			try {
				
				if ($userLogin->save ()) {
					$userInfo = new UserInformation ();
					$userInfo->id = $userLogin->getPrimaryKey ();
					$userInfo->attributes = $_POST ['UserInformation'];
					$userInfo->personal_card_id = $userInfo->id;
					if ($userInfo->save ()) {
						$saveSuccess = true;
					} else {
						
						$transaction->rollback ();
						// $this->render('create');
					}
					if ($saveSuccess) {
						$transaction->commit ();
						$this->redirect ( Yii::app ()->createUrl ( 'user/view/id/' . $userInfo->id ) );
					} 
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$this->render ( 'create' );
		}
	}
	public function actionDelete() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"DELETE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		try {
			$model->delete ();
		} catch ( CDbException $e ) {
			$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
		}
		$this->redirect ( Yii::app ()->createUrl ( 'User/' ) );
	}
	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		$this->render ( 'view', array (
				'model' => $model 
		) );
	}
	public function actionUpdate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$userLogin = $this->loadModel ();
		if ($userLogin === null) {
			Yii::log ( "User not found!", CLogger::LEVEL_INFO, __METHOD__ );
			throw new CHttpException ( 404, Yii::t ( "MusicModule.general", 'The requested page does not exist.' ) );
		}
		
		if (isset ( $_POST ['UserLogin'] )) {
			if ($_POST ['UserLogin'] ['password'] == '') {
				$_POST ['UserLogin'] ['password'] = $userLogin->password;
			} else {
				$_POST ['UserLogin'] ['password'] = md5 ( $_POST ['UserLogin'] ['password'] );
			}
			$userLogin->attributes = $_POST ['UserLogin'];
			
			// var_dump($userLogin->attributes);
			try {
				if ($userLogin->update ()) {
					$userInfo = UserInformation::model ()->findByPk ( $userLogin->id );
					if (isset ( $userInfo )) {
						$userInfo->attributes = $_POST ['UserInformation'];
						$userInfo->personal_card_id = $userLogin->getPrimaryKey ();
						if ($userInfo->update ()) {
							// $this->redirect(Yii::app()->createUrl('user/view/id/'.$userInfo->id));
						}
					}
					$this->redirect ( Yii::app ()->createUrl ( 'user/view/id/' . $userLogin->id ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			$this->render ( 'update', array (
					'model' => $userLogin 
			) );
		}
	}
	public function actionUpload() {
		// Yii::import("ext.EAjaxUpload.qqFileUploader");
		
		// $folder=Yii::app()->basePath.'/../upload/';// folder for uploaded files
		
		// $allowedExtensions = array("xls");//array("jpg","jpeg","gif","exe","mov" and etc...
		// $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
		// $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		// $result = $uploader->handleUpload($folder);
		// /*
		// * Upload
		// * */
		// Yii::import('ext.phpexcelreader.JPhpExcelReader');
		// $data=new JPhpExcelReader($folder.$result['filename']);
		// $num_row = $data->rowcount() + 1;
		// //Insert user
		
		// while($index != $num_row){
		// if($index>1){
		
		// $user = $data->val($index, 'A');
		// $under = $data->val($index, 'B');
		// $role = $data->val($index, 'C');
		// $name = $data->val($index, 'G');
		// $criteria = new CDbCriteria;
		// $criteria->condition="username = '".$user."'";
		// $tmpUser = UserLogin::model()->findAll($criteria);
		
		// if(!isset($tmpUser[0])) {
		
		// $model = new UserLogin();
		// $model->parent = 1;
		// $model->role_id = (!empty($role)? $role: ( is_numeric(substr($user,1,1)) )? 3:4);
		// $model->username = $user;
		// $model->password = md5($user);
		// $model->status = "ACTIVE";
		// $model->create_by = "1";
		// $model->email = $user."@mahidol.ac.th";
		// $model->latest_login = date("Y-m-d H:i:s");
		
		// if($model->save()){
		
		// // list($name, $surname) = split(' ', "- -");
		
		// $uInfo = new UserInformation();
		// $uInfo->$first_name = $name;
		// $uInfo->id=$model->id;
		// $uInfo->personal_card_id=$model->id;
		// if($uInfo->save()){
		
		// }
		// }
		
		// }else{
		// //user is exist
		// //echo "XXX exist user XXX";
		// }
		
		// }
		
		// $index++;
		// }
		
		// //update under
		
		// $index = 0;
		// while($index != $num_row){
		// //echo $index."::<br>";
		// if($index>1){
		
		// $user = $data->val($index, 'A');
		// $under = $data->val($index, 'B');
		
		// $criteria = new CDbCriteria;
		// $criteria->condition="username = '".$user."'";
		// $child = UserLogin::model()->findAll($criteria);
		// if(isset($child[0])) {
		// $criteria1 = new CDbCriteria;
		// $criteria1->condition="username = '".$under."'";
		// $parent = UserLogin::model()->findAll($criteria1);
		// if(isset($parent[0])) {
		// $child[0]->parent = $parent[0]->id;
		// $child[0]->update();
		// }else{
		// //echo "parent is null.<br>";
		// }
		// }else{
		// //echo "child is null.<br>";
		// }
		// }
		
		// $index++;
		// }
		
		// /**
		// *
		// * */
		
		// $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		// $fileName=$result['filename'];//GETTING FILE NAME
		// $result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		echo $result; // it's array
	}
	
	public function actionResetPassword() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"DELETE_USER"
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID
			) ) );
		}
	
		$model = $this->loadModel ();
		try {
			//echo $model->username.'#####';
			$model->password = md5 ( $model->username );
			$model->update ();
		} catch ( CDbException $e ) {
			echo $model->username.'#####'.$e;
// 			$this->redirect ( Yii::app ()->createUrl ( 'Error/503') );
		}
		$this->redirect ( Yii::app ()->createUrl ( 'User/' ) );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = UserLogin::model ()->findbyPk ( $_GET ['id'] );
			
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}