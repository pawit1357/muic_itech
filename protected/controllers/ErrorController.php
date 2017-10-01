<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class ErrorController extends CController
{
	public $layout='management';
	private $_model;

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$this->render('404', array());
	}
	
	public function action404()
	{
		$this->render('404', array());
	}
	public function action000()
	{
		$this->render('000', array());
	}
	public function action503()
	{
		$this->render('503', array());
	}
}