<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class PeriodController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_ROOM", "CREATE_ROOM", "UPDATE_ROOM", "DELETE_ROOM"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		$model = new Period();
		if(isset($_GET['search_text'])){
			$model->search_text = addslashes($_GET['search_text']);
		}
		$this->render('main', array(
				'data' => $model,
		));
	}
	public function actionCreate()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_ROOM"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		if(isset($_POST['Period'])){
			$model = new Period();
			$model->attributes = $_POST['Period'];
			$model->status_code = "PERIOD_ACTIVE";
			if($model->save()){
				$this->redirect(Yii::app()->createUrl('Period/'));
			}
		}
		$this->render('create');

	}
	public function actionDelete()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_ROOM"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		$model->delete();
		$this->redirect(Yii::app()->createUrl('Period/'));
	}
	public function actionView()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_ROOM"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		$this->render('view', array(
				'model' => $model,
		));
	}
	public function actionUpdate()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_USER"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		if(isset($_POST['Period'])){
			$model->attributes = $_POST['Period'];
			if($model->update()){
				$this->redirect(Yii::app()->createUrl('Period/'));
			}
		}
		$this->render('update', array(
				'model' => $model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Period::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


}