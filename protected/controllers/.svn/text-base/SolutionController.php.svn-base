<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SolutionController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new Equipment();
		if(isset($_GET['room_filter'])){
			$model->room_filter = addslashes($_GET['room_filter']);
		}
		if(isset($_GET['equipment_type_filter'])){
			$model->equipment_type_filter = addslashes($_GET['equipment_type_filter']);
		}
		if(isset($_GET['search_text'])){
			$model->search_text = addslashes($_GET['search_text']);
		}
		
		$model->onlyComAndVisual = true;
		$this->render('main', array('data'=>$model));
	}
}