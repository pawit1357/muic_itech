<?php $this->beginContent('/layouts/main'); ?>
<div id="header">
	<div id="logo">
		<img alt=""
			src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" />
	</div>
</div>
<div id="sub-header">
	<div>
		<i>Education Technology Section</i>
	</div>
</div>
<div id="post">
	<?php 
	// include Top menu
	if(UserLoginUtil::isLogin()) {
	?>
	<div class="management-top-menu">
		<?php include 'protected/views/layouts/_management_top_menu.php'; ?>
	</div>
	<?php }?>
	<div class="side-left">
		<div id="sidebar">
			<?php 
			// Get action id to include menu.
			$actionId = strtolower(Yii::app()->controller->id);
			switch($actionId){
				case 'requestbooking':
					include 'protected/views/layouts/_i_booking_menu.php';
					break;
				case 'requestborrow':
					include 'protected/views/layouts/_i_borrow_menu.php';
					break;
				case 'requestborrownew':
					include 'protected/views/layouts/_i_borrow_menu_new.php';
					break;
				case 'requestservice':
					include 'protected/views/layouts/_i_service_menu.php';
					break;
				case 'solution':
					include 'protected/views/layouts/_i_solution_menu.php';
					break;
				case 'report':
					include 'protected/views/layouts/_i_report_menu.php';
					break;
				default:
					include 'protected/views/layouts/_admin_menu.php';
					break;
			}
			?>
		</div>
		<!-- sidebar -->
	</div>
	<div class="content-right">
		<div class="admin-content">
			<?php echo $content; ?>
		</div>
		<!-- content -->
	</div>
	<div class="clear"></div>
</div>
<?php $this->endContent(); ?>