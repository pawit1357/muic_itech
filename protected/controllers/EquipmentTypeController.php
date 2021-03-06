<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class EquipmentTypeController extends CController {
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
		
		$model = new EquipmentType ();
		
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
				"CREATE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['EquipmentType'] )) {
			try {
				$model = new EquipmentType ();
				$model->attributes = $_POST ['EquipmentType'];
				if ($model->save ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'EquipmentType/' ) );
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
		$this->redirect ( Yii::app ()->createUrl ( 'EquipmentType/' ) );
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
		if (isset ( $_POST ['EquipmentType'] )) {
			try {
				$model->attributes = $_POST ['EquipmentType'];
				if ($model->update ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'EquipmentType/' ) );
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
				$this->_model = EquipmentType::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}