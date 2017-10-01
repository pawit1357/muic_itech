<?php $this->beginContent('/layouts/main'); ?>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
$(function(){
	loadDatePicker('date_filter');	
});

</script>
<div id="header">
	<div id="logo">
		<img alt=""
			src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" />
	</div>
	<!-- 	<div id="head-text">Mahidol University</div> -->
	<div id="top-menu">
		<a href="http://www.muic.mahidol.ac.th/av/handbook/index.php">Handbook</a>
		<span></span> <a href="#">FAQ</a><span></span> <a
			href="http://www.muic.mahidol.ac.th/av/qtn/index.php">Questionaire</a><span></span>
		<a href="http://www.muic.mahidol.ac.th/muicclub/elearning">e-Learning</a><span></span>
		<a href="#">m-Learning</a><span></span> <a
			href="http://www.muic.mahidol.ac.th/muicclub/elearning">e-Learning
			Club</a><span></span> <a href="#">Contact</a>
	</div>
</div>
<div id="post">
	<div id="home-content-top">
		<div class="content-slide">
			<div class="right">
				<div class="head">
					<div class="head-text">
						<i>Mahidol</i>
					</div>
					<div>
						<i>audiovisual</i>
					</div>
				</div>
				<?php 
				$form = $this->beginWidget('CActiveForm', array(
					'id' => 'users-form',
					'enableAjaxValidation' => true
				));
				?>
				<table class="simple-form">
					<tr>
						<td class="column-left" width="40%">Equipment</td>
						<td class="column-right"><select class="input-short"
							id="equipment_type_id" name="equipment_type_id"
							class="time-period">
								<option value="">- Select -</option>
								<?php 
								$periods = Period::model()->findAll(array('condition'=>"period_group_id = '1'"));
								$equipmentTypes = EquipmentType::model()->findAll();
								foreach($equipmentTypes as $equipmentType) {
					echo '<option value="'.$equipmentType->id.'">'.$equipmentType->name.'</option>';
				}
				?>
						</select>
						</td>
					</tr>
					<tr>
						<td class="column-left">From</td>
						<td class="column-right"><input class="date-picker"
							type="text" id="date_filter" name="date_filter">
						</td>
					</tr>
					<tr>
						<td class="column-left">Time</td>
						<td class="column-right"><select id="start_period"
							name="start_period" class="time-period input-short">
								<option value="">- Select -</option>
								<?php 
								foreach($periods as $period){
				echo '<option value="'.$period->id.'">'.$period->name.'</option>';
			}
			?>
						</select>
						</td>
					</tr>
					<tr>
						<td class="column-left"></td>
						<td class="column-right"><input type="submit" name="submit-search"
							value="Submit" /></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="home-main-content">
		<!-- content -->
		<div id="main-content">
			<?php echo $content; ?>
		</div>
		<div id="main-menu">
			<?php include 'protected/views/layouts/_home_main_menu_form_download.php'; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php $this->endContent(); ?>