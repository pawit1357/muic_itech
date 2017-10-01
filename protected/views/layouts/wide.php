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
	<div class="content-wide">
		<div class="admin-content">
			<?php echo $content; ?>
		</div>
		<!-- content -->
	</div>
	<div class="clear"></div>
</div>
<?php $this->endContent(); ?>