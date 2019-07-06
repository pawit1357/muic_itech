
<span class="module-head">My Booking</span>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
$(function(){

	loadDatePicker('date_filter');
	var yyy = '<?php echo isset($_GET['date_filter']) ? $_GET['date_filter'] : '-1' ?>';	
	if(yyy == '-1') {
		var dt = new Date();
		$('#date_filter').val(dt.getDate()+'-'+(dt.getMonth()+1)+'-'+dt.getFullYear());
	}else{
		$('#date_filter').val(yyy);
	}

});

function filter(){
	
	var data = '';
	
	if($('#date_filter').val() != '' ) {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'date_filter='+$('#date_filter').val();
		date_filter = $('#date_filter').val();
	} else {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'date_filter=';
	}	

	
	
	
// 	alert($("#date_all_filter").is(':checked'));

	
// 	if( $("#date_all_filter").is(':checked') ) {
// 		if(data != ''){
// 			data = data + '&';
// 		}
// 		data = data + 'date_all_filter='+$("#date_all_filter").is(':checked');
// 		date_all_filter = $("#date_all_filter").is(':checked').val();
// 	} else {
// 		if(data != ''){
// 			data = data + '&';
// 		}
// 		data = data + 'date_all_filter=';
// 	}	

	

	
	if($('#status_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'status_filter='+$('#status_filter').val();			

	}
	if($('#room_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'room_filter='+$('#room_filter').val();			
	}
	$('#frm1').submit();	
	//$('#my-model-grid').yiiGridView('update', {url : '<?//php echo Yii::app()->createUrl('RequestBooking/Index')?>/ajax/my-model-grid', data: data});
}
</script>
<?php 
$requestTypes = RequestBookingType::model()->findAll();
$requestStatuses = Status::model()->findAll(array('condition'=>"t.status_group_id='REQUEST_STATUS'"));
?>
<div>
	<table>
		<tr>
			<td><h3>Status:</h3></td>
			<td><?php echo CHtml::image('/itech/images/waiting.png', 'Waiting Apporve.'); ?>
			</td>
			<td>Waiting</td>
			<td></td>

			<td><?php echo CHtml::image('/itech/images/approved.png', 'Apporve.'); ?>
			</td>
			<td>Apporve</td>
			<td></td>

			<td><?php echo CHtml::image('/itech/images/disapproved.png', 'Dis Apporve.'); ?>
			</td>
			<td>Disapporve</td>
			<td></td>

			<td><?php echo CHtml::image('/itech/images/cancel.png', 'Cancel.'); ?>
			</td>
			<td>Cancel</td>
			<td></td>
		</tr>
	</table>
</div>
<div>
	<div class="filter">
		<form id="frm1" action="" method="get">
			<b>Filter</b> Date:<input type="text" name="date_filter"
				id="date_filter" onchange="filter()"> 
<!-- 				<input type="checkbox" id="date_all_filter" name="date_all_filter"> -->
				<select
				name="status_filter" id="status_filter" onchange="filter()"><option
					value="">- All Status -</option>
				<?php 
				foreach($requestStatuses as $requestStatus) {
				?>
				<option value="<?php echo $requestStatus->status_code?>"
				<?php echo $requestStatus->status_code == $_GET['status_filter'] ? 'selected="selected"' : ''?>>
					<?php echo $requestStatus->name?>
				</option>
				<?php }?>
			</select> <select name="room_filter" id="room_filter"
				onchange="filter()">
				<?php 
				$rooms = RequestBooking::model()->findAll(array(
				    'select'=>'t.room_id',
				    'group'=>'t.room_id',
    		'distinct'=>true,));
		?>
				<option value="">- All Room -</option>
				<?php foreach($rooms as $room) {?>
				<option value="<?php echo $room->room->id?>"
				<?php echo $room->room->id == $_GET['room_filter'] ? 'selected="selected"' : ''?>>
					<?php echo $room->room->name.','.$room->room->status;?>
				</option>
				<?php }?>
			</select>

		</form>
	</div>

	<div class="clear"></div>
</div>
<br>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">User</th>
				<th width="14%">Booking Type</th>
				<th width="13%">Equipments</th>
				<th width="10%">Use Date</th>
				<th width="10%">Use Time</th>
				<th width="10%">Room</th>
				<th width="10%">Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->searchMyBooking();


			foreach ($dataProvider->data as $request) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
				<td class="center"><?php echo $request->user_login->username?>
				
				<td class="center"><?php echo $request->request_booking_type->name?>
				
				<td class="center"><?php echo CommonUtil::getEquipmentList($request->id);?>
				
				<td class="center"><?php echo $request->request_date == null ? $request->day_in_week->name : DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");?>
				
				<td class="center"><?php echo DateTimeUtil::getTimeFormat($request->period_s->start_hour, $request->period_s->start_min)." - ".DateTimeUtil::getTimeFormat($request->period_e->end_hour, $request->period_e->end_min); ?>
				
				<td class="center"><?php echo $request->room->room_code?></td>
				<td class="center"><?php
				switch ($request->status_code) {
					case 'REQUEST_APPROVE':
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/approved.png", "", array ('width' => 20,'height' => 20) );
					break;
					case 'REQUEST_CANCEL':
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/cancel.png", "", array ('width' => 20,'height' => 20) );
					break;
					case 'REQUEST_COMPLETED':
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/complete.png", "", array ('width' => 20,'height' => 20) );
					break;
					case 'REQUEST_WAIT_APPROVE':
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array ('width' => 20,'height' => 20) );
					break;
				}
				?>
				</td>

				<td class="center"><?php if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BOOKING", "VIEW_ALL_REQUEST_BOOKING"))){?>
					<a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('RequestBooking/view/id/'.$request->id)?>"></a>
					
					<?php }?> <?php if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BOOKING")) || UserLoginUtil::areUserRole(array(UserRoles::STAFF_AV)) ){?>
					<a title="edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('RequestBooking/update/id/'.$request->id)?>"></a>
					<?php }?> <?php 
					if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BOOKING")) && RequestUtil::hasRequestBookingActivityFile("$request->id")){
					?> <a title="edit" class="ico-s-download"
					href="<?php echo Yii::app()->request->baseUrl."/".RequestUtil::getActivityFilePath($request->id)?>"></a>
					<?php }?>
				</td>

			</tr>

			<?php }?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>

<br>


