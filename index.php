<?php
session_start();
// include Yii bootstrap file
require_once(dirname(__FILE__).'/framework/yii.php');
$config=dirname(__FILE__).'/protected/config/main.php';

// include custom class
require_once dirname(__FILE__).'/protected/external/util/UserLoginUtil.php';
require_once dirname(__FILE__).'/protected/external/util/UserInfoUtil.php';
require_once dirname(__FILE__).'/protected/external/util/DateTimeUtil.php';
require_once dirname(__FILE__).'/protected/external/util/RequestUtil.php';
require_once dirname(__FILE__).'/protected/external/util/RoomUtil.php';
require_once dirname(__FILE__).'/protected/external/util/MailUtil.php';
require_once dirname(__FILE__).'/protected/external/util/SocialMediaUtil.php';
require_once dirname(__FILE__).'/protected/external/util/ConfigUtil.php';
require_once dirname(__FILE__).'/protected/external/util/HardwareUtil.php';
require_once dirname(__FILE__).'/protected/external/util/HttpRequestUtil.php';
require_once dirname(__FILE__).'/protected/external/util/LogUtil.php';
require_once dirname(__FILE__).'/protected/external/util/CommonUtil.php';
require_once dirname(__FILE__).'/protected/external/util/gcm.php';
require_once dirname(__FILE__).'/protected/external/util/GridUtil.php';
require_once dirname(__FILE__).'/protected/external/util/LDAPUtil.php';

// create a Web application instance and run
// Yii::createWebApplication($config)->run();
$app = Yii::createWebApplication($config);
Yii::app()->setTimeZone('UTC');
$app->run();