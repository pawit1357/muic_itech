<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SubjectController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_LINK",
				"CREATE_LINK",
				"UPDATE_LINK",
				"DELETE_LINK" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = new Subject ();
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
		
		if (isset ( $_POST ['Subject'] )) {
			
			$upload_path = realpath ( Yii::app ()->basePath . '/../upload' );
			$file = $upload_path . $_POST ['Subject'] ['file_path'];
			
			/*
			 * Upload
			 */
			Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
			$data = new JPhpExcelReader ( $file );
			$num_row = $data->rowcount () + 1;
			
			// Insert user
			
			$tmpName = "";
			$tmpId = 0;
			while ( $index != $num_row ) {
				if ($index > 1) {
					
					$subj_code = $data->val ( $index, 'A' );
					$sbj_name = $data->val ( $index, 'B' );
					$teacher_user_id = $data->val ( $index, 'C' );
					
					$criteria = new CDbCriteria ();
					$criteria->condition = "subj_code = '" . $subj_code . "'";
					$tmp = Subject::model ()->findAll ( $criteria );
					
					if (! isset ( $tmp [0] )) {
						
						$criteria1 = new CDbCriteria ();
						$criteria1->condition = "username = '" . $teacher_user_id . "'";
						$tmpUser = UserLogin::model ()->findAll ( $criteria1 );
						if (isset ( $tmpUser [0] )) {
							$model = new Subject ();
							$model->subj_code = $subj_code;
							$model->sbj_name = $sbj_name;
							$model->teacher_user_id = $tmpUser [0]->id;
							
							// echo "XXX exist user XXX".$model->teacher_user_id."<br>";
							try {
								if ($model->save ()) {
								}
							} catch ( CDbException $e ) {
								$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
							}
						}
					} else {
						// user is exist
						// echo "XXX exist user XXX";
					}
				}
				
				$index ++;
			}
		}
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionCreate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_LINK" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['Subject'] )) {
			$model = new Subject ();
			$model->attributes = $_POST ['Subject'];
			// $model->status_code = "PERIOD_GROUP_ACTIVE";
			try {
				if ($model->save ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Subject/' ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->render ( 'create' );
	}
	public function actionDelete() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"DELETE_LINK" 
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
		$this->redirect ( Yii::app ()->createUrl ( 'Subject/' ) );
	}
	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_LINK" 
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
				"UPDATE_LINK" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		if (isset ( $_POST ['Subject'] )) {
			$model->attributes = $_POST ['Subject'];
			try {
				if ($model->update ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Subject/' ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = Subject::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
	public function actionUpload() {
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		
		$folder = Yii::app ()->basePath . '/../upload/'; // folder for uploaded files
		
		$allowedExtensions = array (
				"xls" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		/*
		 * Upload
		 */
		Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
		$data = new JPhpExcelReader ( $folder . $result ['filename'] );
		$num_row = $data->rowcount () + 1;
		// Insert user
		
		while ( $index != $num_row ) {
			if ($index > 1) {
				
				$subj_code = $data->val ( $index, 'A' );
				$sbj_name = $data->val ( $index, 'B' );
				$teacher_user_id = $data->val ( $index, 'C' );
				
				$criteria = new CDbCriteria ();
				$criteria->condition = "subj_code = '" . $subj_code . "'";
				$tmp = Subject::model ()->findAll ( $criteria );
				
				if (! isset ( $tmp [0] )) {
					
					$criteria1 = new CDbCriteria ();
					$criteria1->condition = "username = '" . $teacher_user_id . "'";
					$tmpUser = UserLogin::model ()->findAll ( $criteria1 );
					if (isset ( $tmpUser [0] )) {
						$model = new Subject ();
						$model->subj_code = $subj_code;
						$model->sbj_name = $sbj_name;
						$model->teacher_user_id = $tmpUser [0]->id;
						
						echo "XXX exist user XXX" . $model->teacher_user_id . "<br>";
						try {
							if ($model->save ()) {
							}
						} catch ( CDbException $e ) {
							$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
						}
					}
				} else {
					// user is exist
					echo "XXX exist user XXX";
				}
			}
			
			$index ++;
		}
		/**
		 */
		
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		$result = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		
		echo $result; // it's array
	}
}