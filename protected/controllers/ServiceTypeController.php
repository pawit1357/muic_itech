<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class ServiceTypeController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_SERVICE_TYPE",
				"CREATE_SERVICE_TYPE",
				"UPDATE_SERVICE_TYPE",
				"DELETE_SERVICE_TYPE" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = new RequestServiceType ();
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
				"CREATE_SEMESTER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		if (isset ( $_POST ['RequestServiceType'] )) {
			$model = new RequestServiceType ();
			$model->attributes = $_POST ['RequestServiceType'];
			try {
				if ($model->save ()) {
					$this->redirect ( Yii::app ()->createUrl ( 'ServiceType/' ) );
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
				"DELETE_SERVICE_TYPE" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		try{
		$model->delete ();			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		$this->redirect ( Yii::app ()->createUrl ( 'ServiceType/' ) );
	}
	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_SERVICE_TYPE" 
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
				"UPDATE_SERVICE_TYPE" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		if (isset ( $_POST ['RequestServiceType'] )) {
			$model->attributes = $_POST ['RequestServiceType'];
			try{
			if ($model->update ()) {
				$this->redirect ( Yii::app ()->createUrl ( 'ServiceType/' ) );
			}			} catch ( CDbException $e ) {
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
				$this->_model = RequestServiceType::model ()->findbyPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}