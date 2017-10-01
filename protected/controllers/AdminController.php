<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class AdminController extends CController
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
		$model = new RequestBooking();

		$this->render('main', array('data'=>$model));


	}
	public function actionCheckStatus()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('main', array('data'=>$model));
	}
	public function actionRequest()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('main', array('data'=>$model));
	}

}