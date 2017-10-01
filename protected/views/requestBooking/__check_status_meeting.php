<span class="module-head">Check Status</span>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.1.custom.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
	$(function(){
		loadDatePicker('date_filter');
		ajaxUpdateArea('<?php echo Yii::app()->createUrl('AjaxRequest/AvailableRoomScheduleMeeting'); ?>?','available-room-schedule', ' $( ".description" ).tooltip({ track: true });' );
	});

</script>

<script type="text/javascript">
function viewBookingDetail(requestId){
	var element = $('<div title="เธฃเธฒเธขเธฅเธฐเน€เธญเธตเธขเธ”เธ�เธฒเธฃเธ�เธญเธ�เธซเน�เธญเธ�" id="viewBookingDialog"></div>');
	element.html('Loading...').dialog({
		width:500,
		height:300,
		modal: true
		}).dialog('open');
	loadRoomSchedule(requestId, element);
}
function loadBookingDetail(requestId, element) {
	$.ajax({
		url: '<?php echo Yii::app()->createUrl('AjaxRequest/BookingDetail/requestId/'); ?>' + requestId,
		success: function(data) {
			$('#'+elementId).html(data);
		},
	});	
}


function loadRoomSchedule(elementId){
	 $.ajax({
			url: '<?php echo Yii::app()->createUrl('AjaxRequest/AvailableRoomScheduleMeeting'); ?>',
			success: function(data) {
				$('#'+elementId).html(data);
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
	if($('#room_id').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'room_id='+$('#room_id').val();
	}
	if($('#equipment_type_id').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'equipment_type_id='+$('#equipment_type_id').val();
	}
		ajaxUpdateArea('<?php echo Yii::app()->createUrl('AjaxRequest/AvailableRoomScheduleMeeting'); ?>?'+data,'available-room-schedule', ' $( ".description" ).tooltip({ track: true, });' );
}
var period_start = 0;
var period_end = 0;
var room_id = 0;
function chkPeriodChange(element){
	var itemValue = $(element).val().split('**');
	roomId = itemValue[0];
	period = itemValue[1];
	if(period_start == 0) {
		room_id = parseInt(roomId);
		period_start = parseInt(period);
		period_end = parseInt(period);
		//alert(period_start + '  ' + period_end);
	} else {
		if(room_id != roomId){
			for(var i = period_start; i <= period_end; i++) {
				var eId = room_id+'**'+i;
				document.getElementById(eId).checked = false;
				checkElementProperty(document.getElementById(eId));
			}			
			period_start = parseInt(period);
			period_end = parseInt(period);
			room_id = parseInt(roomId);
		} else {		
			if(parseInt(period) > period_end) {		
				var availableBook = true;
				var tmpPeriodEnd = 0;
				for(var i = period_start + 1; i < parseInt(period); i++) {
					var eId = room_id+'**'+i;
					if (typeof(document.getElementById(eId)) != 'undefined' && document.getElementById(eId) != null)
					{
						document.getElementById(eId).checked = true;
						checkElementProperty(document.getElementById(eId));
					} else {
						tmpPeriodEnd = i - 1;
						availableBook = false;
						alert("You can't book the period over another booking.");
						element.checked = false;
						break;
					}

					
				}
				if(availableBook) {
					period_end = parseInt(period);
				} else {
					period_end = tmpPeriodEnd;
				}
			} else if(parseInt(period) < period_end && parseInt(period) >= period_start){
				for(var i = parseInt(period) + 1; i <= period_end; i++) {
					var eId = room_id+'**'+i;
					document.getElementById(eId).checked = false;
					checkElementProperty(document.getElementById(eId));
				}
				period_end = parseInt(period);
				
			} else if(parseInt(period) < period_start){
				for(var i = period_start; i <= period_end; i++) {
					var eId = room_id+'**'+i;
					document.getElementById(eId).checked = false;
					checkElementProperty(document.getElementById(eId));
				}
				period_start = parseInt(period);
				period_end = parseInt(period);
			}
		}
	}
	checkElementProperty(element)
}
function booking(roomId) {
	requestDate = $('#date_filter').val();
	var periodStart = null;
	var periodEnd = null;
	if(roomId == room_id) {
		periodStart = period_start;
		periodEnd = period_end;
	}
	 $.ajax({
			url: '<?php echo Yii::app()->createUrl('AjaxRequest/SetBookingAttr'); ?>/type/3/room_id/'+roomId+'/period_start/'+periodStart+'/period_end/'+periodEnd+'/request_date/'+requestDate,
			success: function(data) {
				window.location.href="<?php echo Yii::app()->createUrl('RequestBooking/Request'); ?>/room/"+roomId;
			},
		});
	
}
function checkElementProperty(element){
	if(element.checked) {
		element.parentNode.style.background = '#CCCCCC';
	} else {
		element.parentNode.style.background = 'none';
	}
}

</script>
<br>
<div><a href="<?php echo Yii::app()->createUrl("RequestBooking/CheckStatus")?>" class="button_link">Daily / Semester</a> | 
<a href="<?php echo Yii::app()->createUrl("RequestBooking/CheckStatusMeeting")?>" class="button_link">Avtivity / Meeting</a></div>
<br>
<?php 
$equipmentTypes = EquipmentType::model()->findAll();
$periods = Period::model()->findAll(array('condition'=>"period_group_id='2' and status_code='PERIOD_ACTIVE'"));
?>
<div class="top-panel2">
	<div class="filter">
		<b>Filter</b> Room <select id="room_id" name="room_id"
			class="time-period2" onchange="checkStatus()">
			<option value="">- All Room -</option>
			<?php 
			$rooms = Room::model()->findAll(array('condition' => "room_group_id = '2'"));
			foreach($rooms as $room) {
					echo '<option value="'.$room->id.'">'.$room->room_code.'-'.$room->name.'</option>';
				}
				?>
		</select> 
		 Equipment <select id="equipment_type_id" name="equipment_type_id"
			class="time-period" onchange="checkStatus()">
			<option value="">- All -</option>
			<?php 
			$equipmentTypes = EquipmentType::model()->findAll();
			foreach($equipmentTypes as $equipmentType) {
					echo '<option value="'.$equipmentType->id.'">'.$equipmentType->name.'</option>';
				}
				?>
		</select> <div style="margin-left:45px;">Date <input class="date-picker" onchange="checkStatus()"
			type="text" id="date_filter" name="date_filter"
			value="<?php echo date("d-m-Y")?>"> <select id="start_period"
			name="start_period" class="time-period2" onchange="checkStatus()">
			<option value="">- Start -</option>
			<?php 
			foreach($periods as $period){
				echo '<option value="'.$period->id.'">'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
			}
			?>
		</select> - <select id="end_period" name="end_period"
			class="time-period2" onchange="checkStatus()">
			<option value="">- End -</option>
			<?php 
			foreach($periods as $period){
				echo '<option value="'.$period->id.'">'.DateTimeUtil::getTimeFormat($period->end_hour, $period->end_min).'</option>';
			}
			?>
		</select>
		</div>
	</div>

	<div class="clear"></div>
</div>
<div id="available-room-schedule"></div>
<br>
<br>

