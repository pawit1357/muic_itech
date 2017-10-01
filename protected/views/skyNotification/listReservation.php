<div class="module-head">Equipment Type</div>
<div>
	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'equipment-type-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>
<br><br>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">User</th>
				<!-- 				<th>request_booking_type_id</th> -->
				<th>room</th>
				<!-- 				<th>semester_id</th> -->
				<th>request_date</th>
				<!-- 				<th>request_day_in_week</th> -->
				<th>Start</th>
				<th>End</th>
				<th>Remark</th>
				<!-- 				<th>status</th> -->
				<!-- 				<th>crate_date</th> -->
				<th>course_name</th>
			</tr>
		</thead>
		<tbody>
			<?php 

		
			$counter = 1;
			$dataProvider = $data->searchSkyeData();
			foreach ($dataProvider->data as $reqBooking) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
			<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?></td>
				<td class="center"><?php echo $reqBooking->user_login_id?></td>
				<td class="center"><?php echo $reqBooking->room_id?></td>
				<td class="center"><?php echo $reqBooking->request_date?></td>
				<td class="center"><?php echo $reqBooking->period_start?></td>
				<td class="center"><?php echo $reqBooking->period_end?></td>
				<td class="left"><?php echo $reqBooking->description?></td>
				<td class="center"><?php echo $reqBooking->course_name?></td>
			</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>
<?php 
if ($data->searchSkyeData()->data != null){
	echo CHtml::link('Back',array('SkyNotification/')).' | ';
	echo CHtml::link('Approved',array('SkyNotification/Approved','id'=>$dataProvider->data[0]->request_sky_noti_id));
} ?>

