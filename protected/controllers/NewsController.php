<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class NewsController extends CController
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

		$model = new News();
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

		if(isset($_POST['News'])) {
			$news = new News();
			$news->attributes = $_POST['News'];
			$news->create_date = date("Y-m-d H:i:s");
			$news->create_by = UserLoginUtil::getUserLoginId();
			$success = true;
			if($news->save()) {
				$news = News::model()->findByPk($news->getPrimaryKey());
				if($_FILES['pic']['name'] != '') {
					$pic = $_FILES['pic'];
					$storeFolder = 'upload/news/'.$news->id;
					mkdir($storeFolder, 0777, true);
					if(copy($pic['tmp_name'], $storeFolder.'/'.$pic['name'])){
						$news->pic = $storeFolder.'/'.$pic['name'];
						if(!$news->update()) {
							$success = false;
						}
					}
				}
			} else {
				$success = false;
			}
			if($success) {
				$this->redirect(Yii::app()->createUrl('News/View/id/'.$news->id));
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
		
		$this->redirect(Yii::app()->createUrl('News/'));
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

		if(isset($_POST['News'])) {
			$news = $model;
			$news->attributes = $_POST['News'];
			$news->create_date = date("Y-m-d H:i:s");
			$news->create_by = UserLoginUtil::getUserLoginId();
			$success = true;
			if($news->update()) {
				$news = News::model()->findByPk($news->getPrimaryKey());
				if($_FILES['pic']['name'] != '') {
					$pic = $_FILES['pic'];
					$storeFolder = 'upload/news/'.$news->id;
					if(!is_dir($storeFolder)) {
						mkdir($storeFolder, 0777, true);
					}
					if(copy($pic['tmp_name'], $storeFolder.'/'.$pic['name'])){
						$news->pic = $storeFolder.'/'.$pic['name'];
						if(!$news->update()) {
							$success = false;
						}
					}
				}
			} else {
				$success = false;
			}
			if($success) {
				$this->redirect(Yii::app()->createUrl('News/View/id/'.$news->id));
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
				$this->_model=News::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


}