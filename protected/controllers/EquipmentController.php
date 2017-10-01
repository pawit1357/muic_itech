<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class EquipmentController extends CController {
	public $layout = 'management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_EQUIPMENT",
				"CREATE_EQUIPMENT",
				"UPDATE_EQUIPMENT",
				"DELETE_EQUIPMENT"
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID
			) ) );
		}

		$model = new Equipment ();

		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}

		if (isset ( $_POST ['Equipment'] )) {
			try {
				$upload_path = realpath ( Yii::app ()->basePath . '/../upload' );
				$file = $upload_path . $_POST ['Equipment'] ['file_path'];

				Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
				$data = new JPhpExcelReader ( $file );
				// 				$data = new JPhpExcelReader ( "C:\AppServ\www\itech\document\Template_Equipment_20160114_edit.xls");
				$num_row = $data->rowcount () + 1;

				// Insert user
				$tmpName = "";
				$tmpId = 0;
				while ( $index != $num_row ) {

					if ($index > 1) {

						$order = $data->val ( $index, 'A' );
						$groupCode = $data->val ( $index, 'C' );
						$name = $data->val ( $index, 'D' );
						$band = $data->val ( $index, 'E' );
						$barcode = $data->val ( $index, 'F' );
						$room = $data->val ( $index, 'G' );

						$criteria1 = new CDbCriteria ();
						$criteria1->condition = "barcode = '" . $barcode . "'";
						$equip = Equipment::model ()->findAll ( $criteria1 );


						if (count( $equip ) == 0) {

							$criteria = new CDbCriteria ();
							$criteria->condition = "equipment_type_code = '" . $groupCode . "'";
							$equipmentType = EquipmentType::model ()->findAll ( $criteria );

							if (isset ( $equipmentType [0] )) {
								// Add Group
								if ($tmpName != $name) {
									$tmp = new EquipmentTypeList ();
									$tmp->equipment_type_id = $equipmentType [0]->id;
									$tmp->name = $name;

									if ($tmp->save ()) {
										$tmpName = $name;
										$tmpId = $tmp->id;
									}

								}

								$model = new Equipment ();
								$model->equipment_type_id = $equipmentType [0]->id;
								$model->equipment_type_list_id = $tmpId;
								$model->room_id = $room;
								$model->name = $name;
								$model->description = $band;
								$model->status = "A";
								$model->barcode = $barcode;
								$model->ip_address='D20160114';
								$model->client_user='';
								$model->client_pass='';
								$model->mac_address='';
								$model->img_path='';
									
								if ($model->save ()) {
								}
									
							}
						} else {

							// $equip->room_id =$room;
							// $equip->name=$name;
							// $equip->description =$band;
							// if($equip->save()){
							// }
						}
					}

					$index ++;
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503/errMsg/'.$e->getMessage() ) );
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
				"CREATE_USER"
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID
			) ) );
		}
		if (isset ( $_POST ['Equipment'] )) {
			$model = new Equipment ();
			$model->attributes = $_POST ['Equipment'];
// 			try {

				//Update equipment type list
// 				$criteria = new CDbCriteria ();
// 				$criteria->condition = "name = '" . $model->name . "'";
// 				$equipmentTypeList = EquipmentTypeList::model ()->findAll ( $criteria );

// 				if (count($equipmentTypeList)==0) {

// 					$tmp = new EquipmentTypeList ();
// 					$tmp->equipment_type_id = $model->equipment_type_id;
// 					$tmp->name = $model->name;

// 					if ($tmp->save ()) {
// 						$model->equipment_type_list_id = $tmp->id;
// 					}
// 				}else{
// 					$model->equipment_type_list_id = $equipmentTypeList[0]->id;
// 				}

				if ($model->save ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Equipment/' ) );
				}
// 			} catch ( CDbException $e ) {
// 				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
// 			}
		}
		$this->render ( 'create' );
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
		$this->redirect ( Yii::app ()->createUrl ( 'Equipment/' ) );
	}

	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_EQUIPMENT"
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

		$model = $this->loadModel ();
		if (isset ( $_POST ['Equipment'] )) {
			try {
				if ($model->status == 'D') {
					if ($_POST ['Equipment'] ['status'] == 'A') {
						$equipmentCrackedLogs = EquipmentCrackedLog::model ()->findAll ( array (
								'condition' => "equipment_id = '" . $model->id . "' and status != 'S'"
						) );
						if ($equipmentCrackedLogs != null && count ( $equipmentCrackedLogs ) > 0) {
							$equipmentCrackedLog = $equipmentCrackedLogs [0];
							$equipmentCrackedLog->status = 'S';
							$equipmentCrackedLog->update ();
						}
					}
				} else {
					if ($_POST ['Equipment'] ['status'] == 'D') {
						$equipmentCrackedLog = new EquipmentCrackedLog ();
						$equipmentCrackedLog->equipment_id = $model->id;
						$equipmentCrackedLog->cracked_date = date ( "Y-m-d" );
						$equipmentCrackedLog->save ();
					}
				}
				$model->attributes = $_POST ['Equipment'];

				//Update equipment type list
				$criteria = new CDbCriteria ();
				$criteria->condition = "name = '" . $model->name . "'";
				$equipmentTypeList = EquipmentTypeList::model ()->findAll ( $criteria );

				if( is_null($model->equipment_type_list_id) && $model->equipment_type_list_id <> 0){

					if (count($equipmentTypeList)==0) {

						$tmp = new EquipmentTypeList ();
						$tmp->equipment_type_id = $model->equipment_type_id;
						$tmp->name = $model->name;

						if ($tmp->save ()) {
							$model->equipment_type_list_id = $tmp->id;
						}
					}else{
						$model->equipment_type_list_id = $equipmentTypeList[0]->id;
					}
				}
				else{

					$criteria = new CDbCriteria ();
					$criteria->condition = "id = '" . $model->equipment_type_list_id . "'";
					$equipTypeListUpdate = EquipmentTypeList::model ()->find ( $criteria );
					
					if(isset($equipTypeListUpdate)){
		
						$equipTypeListUpdate->name = $model->name;
						if($equipTypeListUpdate->update()){
	
						}
					}

					
				}

				if ($model->update ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Equipment/' ) );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->render ( 'update', array (
				'model' => $model
		) );
	}

	public function actionUpload1() {
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

	public function actionUpload() {
		/*
		 Yii::import ( "ext.EAjaxUpload.qqFileUploader" );

		 $folder = Yii::app ()->basePath . '/../upload/'; // folder for uploaded files

		 $allowedExtensions = array (
		 "xls"
		 ); // array("jpg","jpeg","gif","exe","mov" and etc...
		 $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
		 $uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		 $result = $uploader->handleUpload ( $folder );

		 Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
		 $data = new JPhpExcelReader ( $folder . $result ['filename'] );
		 */
		Yii::import ( 'ext.phpexcelreader.JPhpExcelReader' );
		$data = new JPhpExcelReader ( "E:\Template_Equipment_2010921.xls");
		$num_row = $data->rowcount () + 1;
		// Insert user

		$tmpName = "";
		$tmpId = 0;
		while ( $index != $num_row ) {
			if ($index > 1) {

				$order = $data->val ( $index, 'A' );
				$groupCode = $data->val ( $index, 'C' );
				$name = $data->val ( $index, 'D' );
				$band = $data->val ( $index, 'E' );
				$barcode = $data->val ( $index, 'F' );
				$room = $data->val ( $index, 'G' );

				$criteria1 = new CDbCriteria ();
				$criteria1->condition = "barcode = '" . $barcode . "'";
				$equip = Equipment::model ()->findAll ( $criteria1 );

				if (! isset ( $equip [0] )) {

					$criteria = new CDbCriteria ();
					$criteria->condition = "equipment_type_code = '" . $groupCode . "'";
					$equipmentType = EquipmentType::model ()->findAll ( $criteria );
					if (isset ( $equipmentType [0] )) {
						// Add Group
						if ($tmpName != $name) {
							$tmp = new EquipmentTypeList ();
							$tmp->equipment_type_id = $equipmentType [0]->id;
							$tmp->name = $name;
							if ($tmp->save ()) {
								$tmpName = $name;
								$tmpId = $tmp->id;
							}
						}

						$model = new Equipment ();
						$model->equipment_type_id = $equipmentType [0]->id;
						$model->equipment_type_list_id = $tmpId;
						$model->room_id = $room;
						$model->name = $name;
						$model->description = $band;
						$model->status = "A";
						$model->barcode = $barcode;
						$model->ip_address='D20150925';
						if ($model->save ()) {
						}
					}
				} else {
					// echo "XXXXX".$equip[0]->id."<br>";
				}
			}

			$index ++;
		}

		/**
		 */

		// 		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		// 		$fileName = $result ['filename']; // GETTING FILE NAME
		// 		$result = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );

		$result = htmlspecialchars ( json_encode ( "SUCCESS" ), ENT_NOQUOTES );
		echo $result; // it's array
	}

	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = Equipment::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}

}