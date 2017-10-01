<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class ReportController extends CController
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
		$this->render('main');
	}
	public function actionRequestBookingStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBookingStatisticReport', array('data'=>$model));
	}
	public function actionRequestBookingUsingStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBookingUsingStatisticReport', array('data'=>$model));
	}
	public function actionRequestBookingProblemStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBookingProblemStatisticReport', array('data'=>$model));
	}
	public function actionRequestBorrowStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBorrowStatisticReport', array('data'=>$model));
	}
	public function actionRequestBorrowUsingStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBorrowUsingStatisticReport', array('data'=>$model));
	}
	public function actionRequestBorrowProblemStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestBorrowProblemStatisticReport', array('data'=>$model));
	}
	public function actionRequestServiceStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestServiceStatisticReport', array('data'=>$model));
	}
	public function actionRequestServiceUsingStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestServiceUsingStatisticReport', array('data'=>$model));
	}
	public function actionSolutionUsingStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('SolutionUsingStatisticReport', array('data'=>$model));
	}
	public function actionRequestServiceProblemStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('RequestServiceProblemStatisticReport', array('data'=>$model));
	}
	public function actionSolutionProblemStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('SolutionProblemStatisticReport', array('data'=>$model));
	}
	public function actionMenuClickStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('MenuClickStatisticReport', array('data'=>$model));
	}

	public function actionUserStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('UserStatisticReport', array('data'=>$model));
	}
	
	
	public function actionEquipmentCrackStatisticReport()
	{
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('EquipmentCrackStatisticReport', array('data'=>$model));
	}
	public function actionUsingSheet()
	{
		$this->layout='wide';
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('UsingSheet', array('data'=>$model));
	}
	public function actionExportUsingSheetExcel()
	{
		$this->layout='excel_export';
		// Authen Login
		if(!UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl('management/login'));
		}
		// Render
		$model = new RequestBooking();
		$this->render('UsingSheetExcel', array('data'=>$model));
	}
	
	
}