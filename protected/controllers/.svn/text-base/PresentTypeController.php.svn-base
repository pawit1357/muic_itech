<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class PresentTypeController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_POSITION", "CREATE_POSITION", "UPDATE_POSITION", "DELETE_POSITION"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = new PresentType();
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
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_SEMESTER"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		if(isset($_POST['PresentType'])){
			$model = new PresentType();
			$model->attributes = $_POST['PresentType'];				
			if($model->save()){
				$this->redirect(Yii::app()->createUrl('PresentType/'));
			}
		}
		$this->render('create');

	}
	public function actionDelete()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_SEMESTER"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		$model->delete();
		$this->redirect(Yii::app()->createUrl('PresentType/'));
	}
	public function actionView()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_SEMESTER"))){
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
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_SEMESTER"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		if(isset($_POST['PresentType'])){
			$model->attributes = $_POST['PresentType'];
			if($model->update()){
				$this->redirect(Yii::app()->createUrl('PresentType/'));
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
				$this->_model=PresentType::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


}