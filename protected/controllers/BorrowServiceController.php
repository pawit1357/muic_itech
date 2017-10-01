<?php
class BorrowServiceController extends CController {
	public $layout = 'ajax';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
	}
	public function actionBorrowNotification() {
		$requestBorrows = RequestBorrow::model ()->findAll ( array (
				'condition' => "status_code ='R_B_NEW_READY'" 
		) );
		if (isset ( $requestBorrows ) && count ( $requestBorrows ) > 0) {
			
			foreach ( $requestBorrows as $req ) {
				
				$end = new DateTime ( $req->thru_date );
				$start = new DateTime ();
				$days = round ( ($end->format ( 'U' ) - $start->format ( 'U' )) / (60 * 60 * 24) );
				switch ($days) {
					case 1 :
					case 3 :
						$content = MailUtil::getBorrowNotification ( $req );
						MailUtil::sendMail ( $req->user_login->email, 'Support AV-Online, Borrow due date notification.', $content );
						break;
				}
			}
		}
	}
}
?>