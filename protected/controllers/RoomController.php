<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class RoomController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_ROOM",
				"CREATE_ROOM",
				"UPDATE_ROOM",
				"DELETE_ROOM" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = new Room ();
		
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionCreate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_ROOM" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['Room'] )) {
			$model = new Room ();
			$model->attributes = $_POST ['Room'];
			try {
				if ($model->save ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Room/' ) );
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
				"DELETE_ROOM" 
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
		$this->redirect ( Yii::app ()->createUrl ( 'Room/' ) );
	}
	public function actionManageStaff() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_ROOM" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		if (isset ( $_POST ['staff'] )) {
			$staffs = UserLogin::model ()->findAll ( array (
					'condition' => "role_id='2'" 
			) );
			foreach ( $staffs as $staff ) {
				if (isset ( $_POST ['staff'] [$staff->id] )) {
					// Add
					
					$rs = RoomStaff::model ()->findAll ( array (
							'condition' => "room_id='" . $model->id . "' and staff_id='" . $staff->id . "'" 
					) );
					if (count ( $rs ) == 0) {
						$roomStaff = new RoomStaff ();
						$roomStaff->room_id = $model->id;
						$roomStaff->staff_id = $staff->id;
						$roomStaff->save ();
					}
				} else {
					// Delete
					$rs = RoomStaff::model ()->findAll ( array (
							'condition' => "room_id='" . $model->id . "' and staff_id='" . $staff->id . "'" 
					) );
					if (count ( $rs ) > 0) {
						$rs [0]->delete ();
					}
				}
			}
			
			$this->redirect ( Yii::app ()->createUrl ( 'room/view/id/' . $model->id ) );
		}
		
		$this->render ( 'manage_staff', array (
				'model' => $model 
		) );
	}
	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_ROOM" 
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
		if (isset ( $_POST ['Room'] )) {
			$model->attributes = $_POST ['Room'];
			try {
				if ($model->update ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'Room/' ) );
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
				$this->_model = Room::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}