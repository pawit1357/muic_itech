<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class GalleryController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_GALLERY", "CREATE_GALLERY", "UPDATE_GALLERY", "DELETE_GALLERY"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = new Gallery();

		$this->render('main', array(
				'data' => $model,
		));
	}
	public function actionCreate()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_GALLERY"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}
		if(isset($_POST['Gallery'])) {
			$glr = $_POST['Gallery'];
			$gallery = new Gallery();
			$gallery->attributes = $glr;
			if($gallery->save()) {
				$gallery = Gallery::model()->findByPk($gallery->primaryKey());
				$file = $_FILES['file_path'];
				if(isset($file)){
					$storeFolder = 'upload/gallery/'.$gallery->id;
					@mkdir($storeFolder, 0777, true);
					if(copy($file['tmp_name'], $storeFolder.'/'.$file['name'])){
						$gallery->file_path = $storeFolder.'/'.$file['name'];
						$gallery->update();
					}
				}
				$this->redirect(Yii::app()->createUrl('Gallery/View/id/'.$gallery->id));
			}
		}
		$this->render('create');

	}
	public function actionDelete()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_GALLERY"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		$model->delete();
	}
	public function actionView()
	{
		// Permission
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_GALLERY"))){
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
		if(!UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_GALLERY"))){
			throw new CHttpException(404,Yii::t('yii','The system is unable to find the requested',
					array('{action}'=>$actionID==''?$this->defaultAction:$actionID)));
		}

		$model = $this->loadModel();
		if(isset($_POST['Gallery'])) {
			$gallery = $this->loadModel();
			$glr = $_POST['Gallery'];
			$gallery->attributes = $glr;
			if($gallery->update()) {
				$file = $_FILES['file_path'];
				if(isset($file)){
					$storeFolder = 'upload/gallery/'.$gallery->id;
					@mkdir($storeFolder, 0777, true);
					if(copy($file['tmp_name'], $storeFolder.'/'.$file['name'])){
						$gallery->file_path = $storeFolder.'/'.$file['name'];
						$gallery->update();
					}
				}
				$this->redirect(Yii::app()->createUrl('Gallery/View/id/'.$gallery->id));
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
				$this->_model=Gallery::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


}