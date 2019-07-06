<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class TestController extends CController
{

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		// 		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		// 		$this->renderPartial('createDialog',array('model'=>$model,),false,true);
		MailUtil::mailsend('pawit1357@hotmail.com','into@test.com','hello','how are yout to day');

 		$headers = array(
 				'MIME-Version: 1.0',
				'Content-type: text/html; charset=iso-8859-1'
 		);
 		Yii::app()->email->send('pawitvaap@gmail.com','pawit1357@hotmail.com','Subject','<html><head><title>Subject</title></head><body>BODY</body></html>',$headers);
echo 'send mail success';
	}



}
