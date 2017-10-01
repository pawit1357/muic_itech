<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"
	media="screen, projection" />
	
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-lightness/jquery-ui-1.10.1.custom.css"
	media="screen, projection" />
	
	<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
		<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.1.custom.js"></script>
					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>- AV Online -</title>

</head>

<body>
	<div id="body-wrapper-outside">
		<div id="body-wrapper">
			<div id="wrapper">
				<div id="top-menu">
					<?php include 'protected/views/layouts/_top_login.php'; ?>
				</div>
				<div id="content">
					<!-- content -->
					<?php echo $content; ?>
				</div>
				<div class="clear"></div>
				<div id="footer">Copyright © 2010 Mahidol University. All rights
					reserved.</div>
			</div>
		</div>
	</div>
</body>
</html>
