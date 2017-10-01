<?php

Yii::import('ext.runactions.components.ERunActions');

/**
 * RunActionsController.php
 *
 * Usage see readme.txt
 *
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @package runactions
 * @version 1.1
*/
class RunActionsController extends CController
{

	public $defaultAction = 'run';

	/**
	 * RunActionsController::_runAction()
	 *
	 * @param mixed $config
	 * @return
	 */
	protected function _runActions($config)
	{
		$this->widget('ERunActions',
				array(
						'config'=>$config,
						'interval'=>10, //only once every hour
						//'allowedIps'=>array('127.0.0.1'), //call only from localhost
				)
		);
	}


	/**
	 * Execute the configured controller actions
	 * Example:
	 * http://localhost/index.php/cron/run/config/cleanupdb
	 */
	public function actionTouch()
	{
		if (ERunActions::runBackground())
		{
			$config = isset($_GET['config']) ? $_GET['config'] : null;
			$this->_runActions($config);
		}
	}

	/**
	 * Execute a cron config by calling the url
	 * Only request headers and return immediatly
	 *
	 * @param mixed $configName
	 * @param integer $format
	 * @param integer $follow_redirect
	 */
	public function actionRun()
	{
		$config = isset($_GET['config']) ? $_GET['config'] : null;
		$this->_runActions($config);
	}

	public function actionTestCron1()
	{
		// 		if (ERunActions::runBackground())
			// 		{
			// 			$config = 'testscript';
			// 			$this->_runActions($config);
			// 		}
		echo ERunActions::httpGET('http://localhost:81/avonline-v4/index.php/management',array('type'=>1,'key'=>123));
		// 		Yii::import('ext.runactions.components.ERunActions');
		ERunActions::runAction("management/Index",$params=array(),$ignoreFilters=true,$ignoreBeforeAfterAction=true,$logOutput=false,$silent=false);
	}

}

