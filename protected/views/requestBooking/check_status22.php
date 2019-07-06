<span class="module-head">Check Status</span>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script type="text/javascript">
function viewSchedule(roomId, month, year){
	var element = $('<div title="ตารางการใช้ห้อง"></div>');
	element.html('Loading...').dialog({
		width:1000,
		height:600,
		modal: true
		}).dialog('open');
	loadRoomSchedule(element, roomId, month, year);
}
function loadRoomSchedule(element, roomId, month, year){
	 $.ajax({
			url: '<?php echo Yii::app()->createUrl('AjaxRequest/RoomSchedule'); ?>?room_id=' + roomId + '&month=' + month + '&year=' + year,
			success: function(data) {
				element.html(data);
			},
		});	
}
function checkStatus(){
	var data = '';
	//if($('#equipment_type').val() != '') {
	//	data = 'equipment_type='+$('#equipment_type').val();
	//}
	if($('#date_filter').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'date_filter='+$('#date_filter').val();
	}
	if($('#start_period').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'start_period='+$('#start_period').val();
	}
	if($('#end_period').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'end_period='+$('#end_period').val();
	}
	$('#my-model-grid').yiiGridView('update', {url : '<?php echo Yii::app()->createUrl('RequestBooking/CheckStatus')?>/ajax/my-model-grid', data: data});
}
</script>

<?php 
$equipmentTypes = EquipmentType::model()->findAll();
$periods = Period::model()->findAll();
?>
<div>
	<div class="filter">
		<b>Filter</b> Date <input class="date-picker" onchange="checkStatus()"
			type="text" id="date_filter" name="date_filter"> <select
			id="start_period" name="start_period" class="time-period"
			onchange="checkStatus()">
			<option value="">- Start -</option>
			<?php 
			foreach($periods as $period){
				echo '<option value="'.$period->id.'">'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
			}
			?>
		</select> - <select id="end_period" name="end_period"
			class="time-period" onchange="checkStatus()">
			<option value="">- End -</option>
			<?php 
			foreach($periods as $period){
				echo '<option value="'.$period->id.'">'.DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min).'</option>';
			}
			?>
		</select>
	</div>

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'room-form',
				'method'=>'get',
				'action'=>'room',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text">
		<?php $this->endWidget(); ?>
	</div>
	<div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'my-model-grid',
		'dataProvider' => $data->search(),
		'ajaxUpdate'=>true,
		'columns' => array(
				array(
						'header'=>'#',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
						'htmlOptions'=>array('width'=>'5%', 'align'=>'center'),
				),
				array(
						'header'=>'ผู้จอง',
						'value'=>'$data->user_login->user_information->first_name',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'ประเภทการจอง',
						'value'=>'$data->request_booking_type->name',
						'htmlOptions'=>array('width'=>'14%', 'align'=>'center'),
				),
				array(
						'header'=>'วันที่จอง',
						'value'=>'DateTimeUtil::getDateFormat($data->create_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'11%', 'align'=>'center'),
				),
				array(
						'header'=>'วันที่ใช้',
						'value'=>'$data->request_date == null ? $data->day_in_week->name : DateTimeUtil::getDateFormat($data->request_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'12%', 'align'=>'center'),
				),
				array(
						'header'=>'เวลา',
						'value'=>'DateTimeUtil::getTimeFormat($data->period_s->start_hour, $data->period_s->start_min)." - "'.
						'.DateTimeUtil::getTimeFormat($data->period_e->end_hour, $data->period_e->end_min)',
						'htmlOptions'=>array('width'=>'12%', 'align'=>'center'),
				),
				array(
						'header'=>'ห้อง',
						'value'=>'$data->room->room_code',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
// 				array(
// 						'header'=>'ตารางการใช้ห้อง',
// 						'class'=>'CButtonColumn',
// 						'template'=>'{view}',
// 						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
// 						'buttons'=>array
// 						(
// 								'view' => array
// 								(
// 										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BOOKING"))',
// 										'url'=>'"javascript:viewSchedule(".$data->id.", ".Date("m").",".Date("Y").")"',
// 								),
// 						),
// 				),
				array(            // display a column with "view", "update" and "delete" buttons
						'header'=>'Action',
						'class'=>'CButtonColumn',
						'template'=>'{request}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'request' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_USER"))',
										'url'=>'"Request/room/".$data->room->id',
								),
						),
				),
		),
));
?>

<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.1.custom.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
	$(function(){
		loadDatePicker('date_filter');
	});
</script>
