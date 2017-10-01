<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class ConfirmUserController extends CController {
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
		$model->status = 'INACTIVE';
		
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
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
		$this->redirect ( Yii::app ()->createUrl ( 'ConfirmUser/' ) );
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
	public function actionActive() {
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
		$userLogin->status = 'ACTIVE';
		if ($userLogin->update ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'ConfirmUser/' ) );
		}
		$this->render ( 'update', array (
				'model' => $userLogin 
		) );
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