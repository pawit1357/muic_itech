<?php
return array(
		'name'=>'MUIC AV Online',
		'defaultController'=>'site',
		'import'=>array(
				'application.models.*',
				'application.components.*',
				'application.extensions.smtpmail.PHPMailer',
				'application.extensions.PHPPDO.CPdoDbConnection',
				'application.extensions.htmltableui.htmlTableUi.php'
		),

		'components'=>array(
				'urlManager'=>array(
						'urlFormat'=>'path'
				),
				'log'=>array(
						'class'=>'CLogRouter',
						'routes'=>array(
								array(
										'class'=>'CWebLogRoute',
										'categories'=>'system.db.CDbCommand',
										'showInFireBug'=>true,
								),
						),
				),				
				'db'=>array(
						'class'=>'application.extensions.PHPPDO.CPdoDbConnection',
						'pdoClass' => 'PHPPDO',
//  						'connectionString' => 'mysql:host=localhost;dbname=prdappne_mvonline_x',
						'connectionString' => 'mysql:host=localhost;dbname=av_itech',
						'emulatePrepare' => true,
 						'username' => 'root',
 						'password' => 'P@ssw0rd',
// 						'username' => 'hui1usr',
// 						'password' => 'h1ip1i01',
						'charset' => 'utf8',					
				),
				/*
				 * UNCOMMENT extension=php_openssl.dll
				 * */
				'Smtpmail'=>array(
						'class'=>'application.extensions.smtpmail.PHPMailer',
						'Host'=>"sawebmail.mahidol.ac.th",						
						'Username'=>'chayanon.poo',
						'Password'=>'11111ccccc',						
						'Port'=>587,
						'SMTPAuth'=>true,
						'SMTPSecure'=>'tls',
						'SMTPDebug'=>2
				),					
		),


);
?>



<!-- 				// -->
<!-- 				// 		'db'=>array( -->
<!-- 				// 			'class'=>'CDbConnection', -->
<!-- 				// 			'connectionString' => 'mysql:host=localhost;dbname=private_avonline', -->
<!-- 				// 			'emulatePrepare' => true, -->
<!-- 				// 			'username' => 'private_avonline', -->
<!-- 				// 			'password' => 'password', -->
<!-- 				// 			'charset' => 'utf8', -->
<!-- 				// 		) -->
<!-- 'username' => 'prdappne_user', -->
<!-- 'password' => 'mvonline', -->
