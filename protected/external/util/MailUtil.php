<?php
class MailUtil {

	public static function sendMail($emailAddress, $subject, $content) {
		
		
		// $mail = Yii::app ()->Smtpmail;
		// $mail->IsSMTP ();
		// $mail->SetFrom ( 'icet@mahidol.ac.th', 'Technology Education Section' );
		// $mail->Subject = $subject;
		// $mail->MsgHTML ( $content );
		// $mail->ClearAddresses ();
		// $mail->AddAddress ( $emailAddress, "" );
		// if ($mail->Send ()) {
		// 	return true;
		// } else {
		// 	return false; 
		// }

 		echo "SEND MAIL>>>>".$emailAddress;
		return true;
	}

	public static function getApproveMailContent($key, $requestBorrow) {
		
		/* EMAIL TEMPLATE BEGINS */
		$imgSrc   = 'https://ed.muic.mahidol.ac.th/itech/images/logo.png'; // Change image src to your site specific settings
		$imgDesc  = 'muic search logo'; // Change Alt tag/image Description to your site specific settings
		$imgTitle = 'MUIC Logo'; // Change Alt Title tag/image title to your site specific settings

		$link = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/ApproveExternal/key/' . $key . '">>>Click Here to Approve this request.<<</a>';
		$dlink = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/DisapproveExternal/key/' . $key . '">>>Click Here to Disapprove this request.<<</a>';
		/*
		 Change your message body in the given $subjectPara variables.
		$subjectPara1 means 'first paragraph in message body', $subjectPara2 means'first paragraph in message body',
		if you don't want more than 1 para, just put NULL in unused $subjectPara variables.
		*/

		$dearText = "User";
		if( $requestBorrow->user_login->isApprover_1="1" ||  $requestBorrow->user_login->isApprover_2="1"){
		    $dearText="Approver";
		}
		
		$dearUser = UserLogin::model ()->findByPk ( $requestBorrow->approve_by );
		$subjectPara1 = '<br><br>Dear ' .$dearText. ',<br><p>Has request to borrow equipment.Here is the request detail</p>' .
				'<table>
				<tr>
				<td style="text-align: right;color: #000000;">Request Date : </td>
				<td>' . DateTimeUtil::getDateFormat ( $requestBorrow->from_date, "dd MM yyyy" ) . ' - ' . DateTimeUtil::getDateFormat ( $requestBorrow->thru_date, "dd MM yyyy" ) .'</td>
						</tr>
						<tr>
						<td style="text-align: right;color: #000000;">Location Type : </td>
						<td>' . ($requestBorrow->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC') .'</td>
								</tr>
								<tr>
								<td style="text-align: right;color: #000000;">Type of event : </td>
								<td>' . $requestBorrow->event_type->name .'</td>
										</tr>
										<tr>
										<td style="text-align: right;color: #000000;">Important Notes :</td>
										<td>' . $requestBorrow->description . '</td>
												</tr>
												<tr>
												<td style="text-align: right;color: #000000;">Status : </td>
												<td>' . $requestBorrow->status->name .'</td>
														</tr>
														</table>';

		$subjectPara2 = '<table border="1">';

		$returnPriceList = array ();
		$brokenList = array ();
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id = '" . $requestBorrow->id . "'"
		) );
		if (count ( $requestBorrowEquipmentTypes ) > 0) {
			foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

				$subjectPara2 = $subjectPara2 . '<tr><th width="400" align="left">' . $requestBorrowEquipmentType->equipment_type_list->name . '</th><th width="100">' . $requestBorrowEquipmentType->quantity . '</th></tr>';
				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
				$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
				if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
					foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
						if ($requestBorrowEquipmentTypeItem->return_price > 0) {
							$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
						}
						if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
							$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
						}
						$subjectPara2 = $subjectPara2 . '<tr><td>' . $requestBorrowEquipmentTypeItem->equipment->barcode . '</td><td>' . ($requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : '') . '</td></tr>';
					}
				}
			}
		} else {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><i>- no item found -</i></td></tr>';
		}
		$subjectPara2 = $subjectPara2 . '</table></fieldset></td></tr>';
		if (count ( $returnPriceList ) > 0) {
			$subjectPara2 = $content . '<tr><td colspan="2"><fieldset><legend>Return Late List</legend>' . '<div class="simple-grid"><table class="items"><tr>' . '<th width="200">Equipment</th>	<th width="100">Price</th></tr>';
			$subjectPara2 = 1;
			$sum = 0;
			foreach ( $returnPriceList as $returnPrice ) {
				$sum = $sum + $returnPrice->return_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $returnPrice->equipment->barcode . '</td><td align="right">' . number_format ( $returnPrice->return_price ) . '</td></tr>';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		if (count ( $brokenList ) > 0) {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><fieldset><legend>Broken List</legend><div class="simple-grid">' . '<table class="items"><tr><th width="200">Equipment</th><th width="100">Price</th></tr>';

			$counter = 1;
			$sum = 0;
			foreach ( $brokenList as $broken ) {
				$sum = $sum + $broken->broken_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $broken->equipment->barcode . '</td><td align="right">' . number_format ( $broken->broken_price ) . '</td></tr>	';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}

		$subjectPara3 = $link.'<br>'.$dlink;
		$subjectPara4 = NULL;
		$subjectPara5 = NULL;

		$message = '<!DOCTYPE HTML>'.
				'<head>'.
				'<meta http-equiv="content-type" content="text/html">'.
				'<title>Email notification</title>'.
				'</head>'.
				'<body style="background-color: #F9F9F9;">'.
				'<div id="header" style="width: 100%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #0b162b;font-family: Open Sans,Arial,sans-serif;">'.
				'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'">'.
				'</div>'.

				'<div id="outer" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;margin-top: 10px;">'.
				'<div id="inner" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'.
				'<p>'.$subjectPara1.'</p>'.
				'<p>'.$subjectPara2.'</p>'.
// 				'<p>'.$subjectPara3.'</p>'.
				'<p><a href="' . ConfigUtil::getSiteName () . '/index.php"> >>Click Here to Approve this request.<< </a></p>'.
				//'<p>'.$subjectPara4.'</p>'.
		//'<p>'.$subjectPara5.'</p>'.
		'<br><br></div>'.
		'</div>'.

		'<div id="footer" style="width: 100%;height: 40px;margin: 0 auto;text-align: center;padding: 8px;font-family: Verdena;background-color: #F9F9F9;color: #000000;">'.
		'Mahidol University International College 999 Phutthamonthon 4 Road, Salaya,Nakhonpathom, Thailand 73170 '.
		'</div>'.
		'</body>';

		/*EMAIL TEMPLATE ENDS*/
// echo  $message;
		return $message;
	}
	
	public static function getBorrowDetailMailContent($requestBorrow) {

		/*EMAIL TEMPLATE BEGINS*/

		$imgSrc   = 'https://ed.muic.mahidol.ac.th/itech/images/logo.png'; // Change image src to your site specific settings
		$imgDesc  = 'muic search logo'; // Change Alt tag/image Description to your site specific settings
		$imgTitle = 'MUIC Logo'; // Change Alt Title tag/image title to your site specific settings

		// 		$link = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/ApproveExternal/key/' . $key . '">>>Click Here to Approve this request.<<</a>';
		// 		$dlink = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/DisapproveExternal/key/' . $key . '">>>Click Here to Disapprove this request.<<</a>';
		/*
		 Change your message body in the given $subjectPara variables.
		$subjectPara1 means 'first paragraph in message body', $subjectPara2 means'first paragraph in message body',
		if you don't want more than 1 para, just put NULL in unused $subjectPara variables.
		*/
		
        $dearText = "User";
        if (strcmp($requestBorrow->user_login->isApprover_1, '1') == 0) {
            $dearText = "Approver";
        } else if (strcmp($requestBorrow->user_login->isApprover_2, '1') == 0) {
            $dearText = "Approver";
        }
		
		$dearUser = UserLogin::model ()->findByPk ($requestBorrow->user_login->id); //UserLogin::model ()->findByPk ( $requestBorrow->approve_by );
		$subjectPara1 = '<br><br>Dear ' . $dearText . ',<br><p>Has request to borrow equipment.Here is the request detail</p>' .
				'<table>
				<tr>
				<td style="text-align: right;color: #000000;">Request Date : </td>
				<td>' . DateTimeUtil::getDateFormat ( $requestBorrow->from_date, "dd MM yyyy" ) . ' - ' . DateTimeUtil::getDateFormat ( $requestBorrow->thru_date, "dd MM yyyy" ) .'</td>
						</tr>
						<tr>
						<td style="text-align: right;color: #000000;">Location Type : </td>
						<td>' . ($requestBorrow->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC') .'</td>
								</tr>
								<tr>
								<td style="text-align: right;color: #000000;">Type of event : </td>
								<td>' . $requestBorrow->event_type->name .'</td>
										</tr>
										<tr>
										<td style="text-align: right;color: #000000;">Important Notes :</td>
										<td>' . $requestBorrow->description . '</td>
												</tr>
												<tr>
												<td style="text-align: right;color: #000000;">Status : </td>
												<td>' . $requestBorrow->status->name .'</td>
														</tr>
														</table>';

		$subjectPara2 = '<table border="1">';

		$returnPriceList = array ();
		$brokenList = array ();
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id = '" . $requestBorrow->id . "'"
		) );
		if (count ( $requestBorrowEquipmentTypes ) > 0) {
			foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

				$subjectPara2 = $subjectPara2 . '<tr><th width="400" align="left">' . $requestBorrowEquipmentType->equipment_type_list->name . '</th><th width="100">' . $requestBorrowEquipmentType->quantity . '</th></tr>';
				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
				$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
				if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
					foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
						if ($requestBorrowEquipmentTypeItem->return_price > 0) {
							$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
						}
						if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
							$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
						}
						$subjectPara2 = $subjectPara2 . '<tr><td>' . $requestBorrowEquipmentTypeItem->equipment->barcode . '</td><td>' . ($requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : '') . '</td></tr>';
					}
				}
			}
		} else {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><i>- no item found -</i></td></tr>';
		}
		$subjectPara2 = $subjectPara2 . '</table></fieldset></td></tr>';
		if (count ( $returnPriceList ) > 0) {
			$subjectPara2 = $content . '<tr><td colspan="2"><fieldset><legend>Return Late List</legend>' . '<div class="simple-grid"><table class="items"><tr>' . '<th width="200">Equipment</th>	<th width="100">Price</th></tr>';
			$subjectPara2 = 1;
			$sum = 0;
			foreach ( $returnPriceList as $returnPrice ) {
				$sum = $sum + $returnPrice->return_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $returnPrice->equipment->barcode . '</td><td align="right">' . number_format ( $returnPrice->return_price ) . '</td></tr>';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		if (count ( $brokenList ) > 0) {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><fieldset><legend>Broken List</legend><div class="simple-grid">' . '<table class="items"><tr><th width="200">Equipment</th><th width="100">Price</th></tr>';

			$counter = 1;
			$sum = 0;
			foreach ( $brokenList as $broken ) {
				$sum = $sum + $broken->broken_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $broken->equipment->barcode . '</td><td align="right">' . number_format ( $broken->broken_price ) . '</td></tr>	';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}

		$subjectPara3 = $link.'<br>'.$dlink;
		$subjectPara4 = NULL;
		$subjectPara5 = NULL;

		$message = '<!DOCTYPE HTML>'.
				'<head>'.
				'<meta http-equiv="content-type" content="text/html">'.
				'<title>Email notification</title>'.
				'</head>'.
				'<body style="background-color: #F9F9F9;">'.
				'<div id="header" style="width: 100%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #0b162b;font-family: Open Sans,Arial,sans-serif;">'.
				'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'">'.
				'</div>'.

				'<div id="outer" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;margin-top: 10px;">'.
				'<div id="inner" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'.
				'<p>'.$subjectPara1.'</p>'.
				'<p>'.$subjectPara2.'</p>'.
				// 				'<p>'.$subjectPara3.'</p>'.
		//'<p>'.$subjectPara4.'</p>'.
		//'<p>'.$subjectPara5.'</p>'.
		'<br><br></div>'.
		'</div>'.

		'<div id="footer" style="width: 100%;height: 40px;margin: 0 auto;text-align: center;padding: 8px;font-family: Verdena;background-color: #F9F9F9;color: #000000;">'.
		'Mahidol University International College 999 Phutthamonthon 4 Road, Salaya,Nakhonpathom, Thailand 73170 '.
		'</div>'.
		'</body>';

		/*EMAIL TEMPLATE ENDS*/
// 		echo $message;
		return $message;
		/*
		 $content = '<table>' . '<tr><td><img alt=""	src="https://ed.muic.mahidol.ac.th/itech/images/logo.png"></td></tr><tr>' . '<td>Dear "' . $requestBorrow->user_login->user_information->first_name . '" <br> You are request to borrow equipment.<br>' . 'Here is the request detail<br> <br>' . '<table class="simple-form"><tr>' . '<td class="column-left" width="150">Request Date</td>' . '<td class="column-right">' . DateTimeUtil::getDateFormat ( $requestBorrow->from_date, "dd MM yyyy" ) . ' - ' . DateTimeUtil::getDateFormat ( $requestBorrow->thru_date, "dd MM yyyy" ) . '</td></tr><tr><td class="column-left" valign="top">Location Type</td><td class="column-right">' . ($requestBorrow->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC') . '</td></tr><tr><td class="column-left">Type of event</td><td class="column-right">' . $requestBorrow->event_type->name . '</td></tr><tr><td class="column-left">Important Notes</td>' . '<td class="column-right">' . $requestBorrow->description . '</td></tr><tr>' . '<td class="column-left">Status</td><td class="column-right">' . $requestBorrow->status->name . '</td>	</tr><tr><td colspan="2"><fieldset><legend>Equipment List</legend><table>';
		$returnPriceList = array ();
		$brokenList = array ();
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id = '" . $requestBorrow->id . "'"
		) );
		if (count ( $requestBorrowEquipmentTypes ) > 0) {
		foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

		$content = $content . '<tr><th width="200" align="left">' . $requestBorrowEquipmentType->equipment_type_list->name . '</th><th width="100">' . $requestBorrowEquipmentType->quantity . '</th></tr>';
		$criteria = new CDbCriteria ();
		$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
		$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
		if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
		foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
		if ($requestBorrowEquipmentTypeItem->return_price > 0) {
		$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
		}
		if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
		$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
		}
		$content = $content . '<tr><td>' . $requestBorrowEquipmentTypeItem->equipment->barcode . '</td><td>' . ($requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : '') . '</td></tr>';
		}
		}
		}
		} else {
		$content = $content . '<tr><td colspan="2"><i>- no item found -</i></td></tr>';
		}
		$content = $content . '</table></fieldset></td></tr>';
		if (count ( $returnPriceList ) > 0) {
		$content = $content . '<tr><td colspan="2"><fieldset><legend>Return Late List</legend>' . '<div class="simple-grid"><table class="items"><tr>' . '<th width="200">Equipment</th>	<th width="100">Price</th></tr>';
		$counter = 1;
		$sum = 0;
		foreach ( $returnPriceList as $returnPrice ) {
		$sum = $sum + $returnPrice->return_price;
		$content = $content . '<tr><td align="left">' . $returnPrice->equipment->barcode . '</td><td align="right">' . number_format ( $returnPrice->return_price ) . '</td></tr>';
		}
		$content = $content . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		if (count ( $brokenList ) > 0) {
		$content = $content . '<tr><td colspan="2"><fieldset><legend>Broken List</legend><div class="simple-grid">' . '<table class="items"><tr><th width="200">Equipment</th><th width="100">Price</th></tr>';

		$counter = 1;
		$sum = 0;
		foreach ( $brokenList as $broken ) {
		$sum = $sum + $broken->broken_price;
		$content = $content . '<tr><td align="left">' . $broken->equipment->barcode . '</td><td align="right">' . number_format ( $broken->broken_price ) . '</td></tr>	';
		}
		$content = $content . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		$content = $content . '</table></td></tr></table><br>Best Regards.';

		return $content;
		*/
	}

	public static function getBorrowStatusChangeMailContent($requestBorrow) {

		/*EMAIL TEMPLATE BEGINS*/

		$imgSrc   = 'https://ed.muic.mahidol.ac.th/itech/images/logo.png'; // Change image src to your site specific settings
		$imgDesc  = 'muic search logo'; // Change Alt tag/image Description to your site specific settings
		$imgTitle = 'MUIC Logo'; // Change Alt Title tag/image title to your site specific settings

		// 		$link = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/ApproveExternal/key/' . $key . '">>>Click Here to Approve this request.<<</a>';
		// 		$dlink = '<a href="' . ConfigUtil::getSiteName () . '/index.php/RequestBorrowNew/DisapproveExternal/key/' . $key . '">>>Click Here to Disapprove this request.<<</a>';
		/*
		 Change your message body in the given $subjectPara variables.
		$subjectPara1 means 'first paragraph in message body', $subjectPara2 means'first paragraph in message body',
		if you don't want more than 1 para, just put NULL in unused $subjectPara variables.
		*/
		$dearText = "User";
		if( $requestBorrow->user_login->isApprover_1="1" ||  $requestBorrow->user_login->isApprover_2="1"){
		    $dearText="Approver";
		}
		
		
		$dearUser = UserLogin::model ()->findByPk ( $requestBorrow->approve_by );
		$subjectPara1 = '<br><br>Dear ' . $dearText . ',<br><p>Has request to borrow equipment.Here is the request detail</p>' .
				'<table>
				<tr>
				<td style="text-align: right;color: #000000;">Request Date : </td>
				<td>' . DateTimeUtil::getDateFormat ( $requestBorrow->from_date, "dd MM yyyy" ) . ' - ' . DateTimeUtil::getDateFormat ( $requestBorrow->thru_date, "dd MM yyyy" ) .'</td>
						</tr>
						<tr>
						<td style="text-align: right;color: #000000;">Location Type : </td>
						<td>' . ($requestBorrow->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC') .'</td>
								</tr>
								<tr>
								<td style="text-align: right;color: #000000;">Type of event : </td>
								<td>' . $requestBorrow->event_type->name .'</td>
										</tr>
										<tr>
										<td style="text-align: right;color: #000000;">Important Notes :</td>
										<td>' . $requestBorrow->description . '</td>
												</tr>
												<tr>
												<td style="text-align: right;color: #000000;">Status : </td>
												<td>' . $requestBorrow->status->name .'</td>
														</tr>
														</table>';

		$subjectPara2 = '<table border="1">';

		$returnPriceList = array ();
		$brokenList = array ();
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id = '" . $requestBorrow->id . "'"
		) );
		if (count ( $requestBorrowEquipmentTypes ) > 0) {
			foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

				$subjectPara2 = $subjectPara2 . '<tr><th width="400" align="left">' . $requestBorrowEquipmentType->equipment_type_list->name . '</th><th width="100">' . $requestBorrowEquipmentType->quantity . '</th></tr>';
				$criteria = new CDbCriteria ();
				$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
				$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
				if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
					foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
						if ($requestBorrowEquipmentTypeItem->return_price > 0) {
							$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
						}
						if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
							$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
						}
						$subjectPara2 = $subjectPara2 . '<tr><td>' . $requestBorrowEquipmentTypeItem->equipment->barcode . '</td><td>' . ($requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : '') . '</td></tr>';
					}
				}
			}
		} else {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><i>- no item found -</i></td></tr>';
		}
		$subjectPara2 = $subjectPara2 . '</table></fieldset></td></tr>';
		if (count ( $returnPriceList ) > 0) {
			$subjectPara2 = $content . '<tr><td colspan="2"><fieldset><legend>Return Late List</legend>' . '<div class="simple-grid"><table class="items"><tr>' . '<th width="200">Equipment</th>	<th width="100">Price</th></tr>';
			$subjectPara2 = 1;
			$sum = 0;
			foreach ( $returnPriceList as $returnPrice ) {
				$sum = $sum + $returnPrice->return_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $returnPrice->equipment->barcode . '</td><td align="right">' . number_format ( $returnPrice->return_price ) . '</td></tr>';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		if (count ( $brokenList ) > 0) {
			$subjectPara2 = $subjectPara2 . '<tr><td colspan="2"><fieldset><legend>Broken List</legend><div class="simple-grid">' . '<table class="items"><tr><th width="200">Equipment</th><th width="100">Price</th></tr>';

			$counter = 1;
			$sum = 0;
			foreach ( $brokenList as $broken ) {
				$sum = $sum + $broken->broken_price;
				$subjectPara2 = $subjectPara2 . '<tr><td align="left">' . $broken->equipment->barcode . '</td><td align="right">' . number_format ( $broken->broken_price ) . '</td></tr>	';
			}
			$subjectPara2 = $subjectPara2 . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}

		$subjectPara3 = $link.'<br>'.$dlink;
		$subjectPara4 = NULL;
		$subjectPara5 = NULL;

		$message = '<!DOCTYPE HTML>'.
				'<head>'.
				'<meta http-equiv="content-type" content="text/html">'.
				'<title>Email notification</title>'.
				'</head>'.
				'<body style="background-color: #F9F9F9;">'.
				'<div id="header" style="width: 100%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #0b162b;font-family: Open Sans,Arial,sans-serif;">'.
				'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'">'.
				'</div>'.

				'<div id="outer" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;margin-top: 10px;">'.
				'<div id="inner" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'.
				'<p>'.$subjectPara1.'</p>'.
				'<p>'.$subjectPara2.'</p>'.
				// 				'<p>'.$subjectPara3.'</p>'.
		//'<p>'.$subjectPara4.'</p>'.
		//'<p>'.$subjectPara5.'</p>'.
		'<br><br></div>'.
		'</div>'.

		'<div id="footer" style="width: 100%;height: 40px;margin: 0 auto;text-align: center;padding: 8px;font-family: Verdena;background-color: #F9F9F9;color: #000000;">'.
		'Mahidol University International College 999 Phutthamonthon 4 Road, Salaya,Nakhonpathom, Thailand 73170 '.
		'</div>'.
		'</body>';

		/*EMAIL TEMPLATE ENDS*/
// 		echo $message;
		return $message;
		/*
		 $content = '<table>' . '<tr><td><img alt=""	src="https://ed.muic.mahidol.ac.th/itech/images/logo.png"></td></tr><tr>' . '<td>Hi "' . $requestBorrow->user_login->user_information->first_name . '" <br> You are request to borrow equipment.<br> And now your request status has been changed.<br>' . 'Here is the request detail<br> <br>' . '<table class="simple-form"><tr>' . '<td class="column-left" width="150">Request Date</td>' . '<td class="column-right">' . DateTimeUtil::getDateFormat ( $requestBorrow->from_date, "dd MM yyyy" ) . ' - ' . DateTimeUtil::getDateFormat ( $requestBorrow->thru_date, "dd MM yyyy" ) . '</td></tr><tr><td class="column-left" valign="top">Location Type</td><td class="column-right">' . ($requestBorrow->location == 'WHITHIN_MUIC' ? 'Within MUIC' : 'Without MUIC') . '</td></tr><tr><td class="column-left">Type of event</td><td class="column-right">' . $requestBorrow->event_type->name . '</td></tr><tr><td class="column-left">Important Notes</td>' . '<td class="column-right">' . $requestBorrow->description . '</td></tr><tr>' . '<td class="column-left">Status</td><td class="column-right">' . $requestBorrow->status->name . '</td>	</tr><tr><td colspan="2"><fieldset><legend>Equipment List</legend><table>';
		$returnPriceList = array ();
		$brokenList = array ();
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
				'condition' => "request_borrow_id = '" . $requestBorrow->id . "'"
		) );
		if (count ( $requestBorrowEquipmentTypes ) > 0) {
		foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {

		$content = $content . '<tr><th width="200" align="left">' . $requestBorrowEquipmentType->equipment_type_list->name . '</th><th width="100">' . $requestBorrowEquipmentType->quantity . '</th></tr>';
		$criteria = new CDbCriteria ();
		$criteria->condition = "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'";
		$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( $criteria );
		if (isset ( $requestBorrowEquipmentTypeItems ) && count ( $requestBorrowEquipmentTypeItems ) > 0) {
		foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
		if ($requestBorrowEquipmentTypeItem->return_price > 0) {
		$returnPriceList [count ( $returnPriceList )] = $requestBorrowEquipmentTypeItem;
		}
		if ($requestBorrowEquipmentTypeItem->broken_price > 0) {
		$brokenList [count ( $brokenList )] = $requestBorrowEquipmentTypeItem;
		}
		$content = $content . '<tr><td>' . $requestBorrowEquipmentTypeItem->equipment->barcode . '</td><td>' . ($requestBorrowEquipmentTypeItem->return_date != '' ? ' ( Returned ) ' : '') . '</td></tr>';
		}
		}
		}
		} else {
		$content = $content . '<tr><td colspan="2"><i>- no item found -</i></td></tr>';
		}
		$content = $content . '</table></fieldset></td></tr>';
		if (count ( $returnPriceList ) > 0) {
		$content = $content . '<tr><td colspan="2"><fieldset><legend>Return Late List</legend>' . '<div class="simple-grid"><table class="items"><tr>' . '<th width="200">Equipment</th>	<th width="100">Price</th></tr>';
		$counter = 1;
		$sum = 0;
		foreach ( $returnPriceList as $returnPrice ) {
		$sum = $sum + $returnPrice->return_price;
		$content = $content . '<tr><td align="left">' . $returnPrice->equipment->barcode . '</td><td align="right">' . number_format ( $returnPrice->return_price ) . '</td></tr>';
		}
		$content = $content . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		if (count ( $brokenList ) > 0) {
		$content = $content . '<tr><td colspan="2"><fieldset><legend>Broken List</legend><div class="simple-grid">' . '<table class="items"><tr><th width="200">Equipment</th><th width="100">Price</th></tr>';

		$counter = 1;
		$sum = 0;
		foreach ( $brokenList as $broken ) {
		$sum = $sum + $broken->broken_price;
		$content = $content . '<tr><td align="left">' . $broken->equipment->barcode . '</td><td align="right">' . number_format ( $broken->broken_price ) . '</td></tr>	';
		}
		$content = $content . '<tr><td align="right">Total</td><td align="right">' . number_format ( $sum ) . '</td></tr></table></div></fieldset></td></tr>';
		}
		$content = $content . '</table></td></tr></table><br>Best Regards.';
		return $content;
		*/
	}

	public static function getBorrowNotification($requestBorrow) {

		/*EMAIL TEMPLATE BEGINS*/

		$imgSrc   = 'https://ed.muic.mahidol.ac.th/itech/images/logo.png'; // Change image src to your site specific settings
		$imgDesc  = 'muic search logo'; // Change Alt tag/image Description to your site specific settings
		$imgTitle = 'MUIC Logo'; // Change Alt Title tag/image title to your site specific settings

		$dearUser = UserLogin::model ()->findByPk ( $requestBorrow->approve_by );
		$subjectPara1 = '<br><br>Dear ' . $dearUser->user_information->first_name . ',';
		$subjectPara2 ='Your equipment will due date '.$requestBorrow->thru_date;


		$message = '<!DOCTYPE HTML>'.
				'<head>'.
				'<meta http-equiv="content-type" content="text/html">'.
				'<title>Email notification</title>'.
				'</head>'.
				'<body style="background-color: #F9F9F9;">'.
				'<div id="header" style="width: 100%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #0b162b;font-family: Open Sans,Arial,sans-serif;">'.
				'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'">'.
				'</div>'.

				'<div id="outer" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;margin-top: 10px;">'.
				'<div id="inner" style="width: 80%;margin: 0 auto;background-color: #F9F9F9;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'.
				'<p>'.$subjectPara1.'</p>'.
				'<p>'.$subjectPara2.'</p>'.

				'<br><br></div>'.
				'</div>'.

				'<div id="footer" style="width: 100%;height: 40px;margin: 0 auto;text-align: center;padding: 8px;font-family: Verdena;background-color: #F9F9F9;color: #000000;">'.
				'Mahidol University International College 999 Phutthamonthon 4 Road, Salaya,Nakhonpathom, Thailand 73170 '.
				'</div>'.
				'</body>';

		/*EMAIL TEMPLATE ENDS*/
		return $message;

	}
}
?>
