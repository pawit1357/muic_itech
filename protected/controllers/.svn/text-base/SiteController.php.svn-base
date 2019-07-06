<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends CController
{
	public $layout='home';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$model = News::model()->findAll(array('order' => 'create_date DESC', 'limit'=>'3'));
		if(isset($_POST['submit-search'])) {
			$_SESSION['date_filter'] = $_POST['date_filter'];
			$_SESSION['equipment_type_id'] = $_POST['equipment_type_id'];
			$_SESSION['start_period'] = $_POST['start_period'];
			$this->redirect(Yii::app()->createUrl('RequestBooking'));
		}
		$this->render('main', array('model'=>$model));
	}

	/**
	 * Login Page
	 */
	public function actionLogin()
	{
		// if login redirect to index
		if(UserLoginUtil::isLogin()){
			$this->redirect(Yii::app()->createUrl(''));
		}

		// if post parameters username and password submitted
		if(isset($_POST['UserLogin']['username']) && isset($_POST['UserLogin']['password'])){
			$username = addslashes($_POST['UserLogin']['password']);
			$password = addslashes($_POST['UserLogin']['password']);
			// Authen
			if(UserLoginUtil::authen($username, $password)) {
				$this->redirect(Yii::app()->createUrl(''));
			} else {
				$this->redirect('login');
			}
		}
		$this->render('login');
	}

	public function actionNews()
	{
		$id = addslashes($_GET['id']);
		$news = News::model()->findByPk($id);

		$this->render('view_news', array('news'=>$news));
	}
	public function actionAllNews()
	{
		$id = addslashes($_GET['id']);
		$news = News::model()->findAll(array('order'=>'create_date DESC'));
	
		$this->render('all_news', array('model'=>$news));
	}
	

	/**
	 * Logout
	 */
	public function actionLogout()
	{
		UserLoginUtil::logout();
		$this->redirect('login');
	}
}