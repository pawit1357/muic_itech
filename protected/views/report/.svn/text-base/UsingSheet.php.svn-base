<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
var mode = '<?php echo $_GET['mode']?>';
var month_filter = '<?php echo $_GET['month_filter']?>';
var year_filter = '<?php echo $_GET['year_filter']?>';
var equipment_filter = '<?php echo $_GET['equipment_filter']?>';
var spanTime = null;
function changeMode() {
	if($('#mode').val() == 'daily') {
		if($('#mode').val() != mode) {
			month_filter = '';
			year_filter = '';
		}
		loadDaily();
	} else if ($('#mode').val() == 'monthly') {
		if($('#mode').val() != mode) {
			year_filter = '';
		}
		loadMonthly();
	} else if ($('#mode').val() == 'yearly' && mode != 'yearly') {
		window.location = "<?php echo Yii::app()->createUrl('Report/UsingSheet')?>" + "/mode/yearly";
	}
}
function filter() {
	if($('#mode').val() == 'daily') {
		if($('#month_filter').val() != '' && $('#year_filter').val() != '' && $('#equipment_filter').val() != '') {
			window.location = "<?php echo Yii::app()->createUrl('Report/UsingSheet')?>" + "/mode/daily/month_filter/" + $('#month_filter').val() + "/year_filter/" + $('#year_filter').val()+"/equipment_filter/"+ $('#equipment_filter').val();
		}else if($('#month_filter').val() != '' && $('#year_filter').val() != '') {
			window.location = "<?php echo Yii::app()->createUrl('Report/UsingSheet')?>" + "/mode/daily/month_filter/" + $('#month_filter').val() + "/year_filter/" + $('#year_filter').val();
		}
	} else if ($('#mode').val() == 'monthly') {
		if($('#year_filter').val() != '') {
			window.location = "<?php echo Yii::app()->createUrl('Report/UsingSheet')?>" + "/mode/monthly/year_filter/" + $('#year_filter').val();
		}
	}
}
function loadDaily() {
	
	spanTime.html('');
	var select = $('<select onchange="filter()" id="month_filter" name="month_filter">' +
			'<option value="">- Month -</option>' + 
			'<option value="1">January</option>' + 
			'<option value="2">February</option>' + 
			'<option value="3">March</option>' + 
			'<option value="4">April</option>' + 
			'<option value="5">May</option>' + 
			'<option value="6">June</option>' + 
			'<option value="7">July</option>' + 
			'<option value="8">August</option>' + 
			'<option value="9">September</option>' + 
			'<option value="10">October</option>' + 
			'<option value="11">November</option>' + 
			'<option value="12">December</option>' + 
						'</select>');
	spanTime.append(select);
	var select2 = $('<select onchange="filter()" id="year_filter" name="year_filter">' +
			'<option value="">- Year -</option>' + 
			'<option value="<?php echo date("Y") - 3?>"><?php echo date("Y") - 3?></option>' + 
			'<option value="<?php echo date("Y") - 2?>"><?php echo date("Y") - 2?></option>' + 
			'<option value="<?php echo date("Y") - 1?>"><?php echo date("Y") - 1?></option>' + 
			'<option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>' + 
						'</select>');
	
	spanTime.append(select2);
	
	


			var str = '<select onchange="filter()" id="equipment_filter" name="equipment_filter">' +
			'<option value="">- Equipment -</option>';
			<?php $equipments = EquipmentType::model()->findAll();
			foreach($equipments as $equipment) {
				?>
				str = str + '<option value="<?php echo $equipment->id?>"><?php echo $equipment->name?></option>';
				<?php
			}
			?>
			str = str + '</select>';
	var select3 = $(str);
	spanTime.append(select3);
	
	if(month_filter != '') {
		select.val(month_filter);
	}
	if(year_filter != '') {
		select2.val(year_filter);
	}
	if(equipment_filter != '') {
		select3.val(equipment_filter);
	}
		
}
function exportExcel() {
	window.location = "<?php echo Yii::app()->createUrl('Report/ExportUsingSheetExcel')?>" + "/mode/daily/month_filter/" + $('#month_filter').val() + "/year_filter/" + $('#year_filter').val()+"/equipment_filter/"+ $('#equipment_filter').val();
}
function loadMonthly() {
	spanTime.html('');
	var select2 = $('<select onchange="filter()" id="year_filter" name="year_filter">' +
			'<option value="">- Year -</option>' + 
			'<option value="<?php echo date("Y") - 3?>"><?php echo date("Y") - 3?></option>' + 
			'<option value="<?php echo date("Y") - 2?>"><?php echo date("Y") - 2?></option>' + 
			'<option value="<?php echo date("Y") - 1?>"><?php echo date("Y") - 1?></option>' + 
			'<option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>' + 
						'</select>');
	
	spanTime.append(select2);

	if(year_filter != '') {
		select2.val(year_filter);
	}
}
$(function(){
	spanTime = $('#date-period');
	changeMode();	
});

</script>
<span class="module-head">Using Sheet</span>
<div>
	<form>
		<input type="hidden" id="mode" value="daily"> <span id="date-period"></span>

	</form>
	
</div>
<br>
<div>
	<table class="report2" width="100%">
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Request Date</th>
			<th rowspan="2">Section / Name</th>
			<th rowspan="2">Purpose</th>
			<!-- <th colspan="3">User Type</th> -->
			<th colspan="2">Period of Use</th>
			<th rowspan="2">Return Date</th>
			<!-- <th rowspan="2">Signature of User</th> -->
		</tr>
		<tr>
			<!-- <th>Student</th>
			<th>Lecturer</th>
			<th>Staff</th> -->
			<th>Since</th>
			<th>Until</th>
		</tr>
		<?php 
		$mode = $_GET['mode'];
		if($mode == '') $mode = 'daily';

		$month = $_GET['month_filter'];
		$year = $_GET['year_filter'];
		$eq = $_GET['equipment_filter'];
		if($eq == '') {
			$eq = 0;
		}
		$fromDate = date("Y-m-d", strtotime($year."-".$month."-1"));
		if($month == 12) {
				$nextMonth = 1;
				$year = $year + 1;
			} else {
				$nextMonth = $month + 1;
			}
			$thruDate = date("Y-m-d", (strtotime($year."-".$nextMonth."-1") - (60 * 60 * 24)));

			if(($mode == 'daily' || $mode == 'monthly' || $mode == 'yearly') &&
			($fromDate == '' || strtotime($fromDate) > 0) &&
			($thruDate == '' || strtotime($thruDate) > 0)) {
			mysql_connect(ConfigUtil::getHostName(), ConfigUtil::getUsername(), ConfigUtil::getPassword());
			mysql_select_db(ConfigUtil::getDbName());

			$sql = "SELECT * FROM (SELECT DATE_FORMAT(request_booking.create_date,'%d %b %Y ') as request_date, CONCAT(user_information.first_name, ' ', user_information.last_name) as name, ";
			$sql = $sql."'For Classroom' as purpose, user_login.role_id as user_type, DATE_FORMAT(request_booking.request_date,'%d %b %Y ') as start_date, ";
			$sql = $sql."DATE_FORMAT(request_booking.request_date,'%d %b %Y ') as end_date, '-' as return_date ";
			$sql = $sql."FROM request_booking INNER JOIN user_login ON request_booking.user_login_id = user_login.id ";
			$sql = $sql."INNER JOIN user_information ON user_login.id = user_information.id ";
			if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."' and (".$eq." in (select equipment_type_id from request_booking_equipment_type where request_booking_id = request_booking.id) or ".$eq." = 0)";
			}
			$sql = $sql."UNION ";
			$sql = $sql."SELECT DATE_FORMAT(request_service.create_date,'%d %b %Y ') as request_date, CONCAT(user_information.first_name, ' ', user_information.last_name) as name, ";
			$sql = $sql."'Request Service' as purpose, user_login.role_id as user_type, DATE_FORMAT(request_service.due_date,'%d %b %Y ') as start_date, ";
			$sql = $sql."DATE_FORMAT(request_service.due_date,'%d %b %Y ') as end_date, '-' as return_date ";
			$sql = $sql."FROM request_service INNER JOIN user_login ON request_service.user_login_id = user_login.id ";
			$sql = $sql."INNER JOIN user_information ON user_login.id = user_information.id ";
			if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."' and '".$eq."' = ''";
			}
			$sql = $sql."UNION ";
			$sql = $sql."SELECT DATE_FORMAT(request_borrow.create_date,'%d %b %Y ') as request_date, CONCAT(user_information.first_name, ' ', user_information.last_name) as name, ";
			$sql = $sql."event_type.name as purpose, user_login.role_id as user_type, DATE_FORMAT(request_borrow.from_date,'%d %b %Y ') as start_date, ";
			$sql = $sql."DATE_FORMAT(request_borrow.thru_date,'%d %b %Y ') as end_date, DATE_FORMAT(request_borrow.thru_date,'%d %b %Y ') as return_date ";
			$sql = $sql."FROM request_borrow INNER JOIN user_login ON request_borrow.user_login_id = user_login.id ";
			$sql = $sql."INNER JOIN user_information ON user_login.id = user_information.id INNER JOIN event_type ON request_borrow.event_type_id = event_type.id ";
			if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."'  and (".$eq." in (select equipment_type_id from request_borrow_equipment_type where request_borrow_id = request_borrow.id) or ".$eq." = 0)";
			}
			$sql = $sql.") AS a ORDER BY request_date";
			
			$result = mysql_query($sql);
			$count = 0;
			$data_chart = "";
			$data_array = array();
			$data_array2 = array();
			while($item = mysql_fetch_assoc($result)){
		$count = $count +1;
		echo '<tr>';
		echo '<td align="center" width="3%">'.$count.'</td>';
		echo '<td align="center" width="10%">'.$item['request_date'].'</td>';
		echo '<td align="left">'.$item['name'].'</td>';
		echo '<td align="center">'.$item['purpose'].'</td>';
		/*
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '4' ? 'X' : '').'</b></td>';
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '3' ? 'X' : '').'</b></td>';
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '2' ? 'X' : '').'</b></td>';
		*/
		echo '<td align="center" width="10%">'.$item['start_date'].'</td>';
		echo '<td align="center" width="10%">'.$item['end_date'].'</td>';
		echo '<td align="center" width="10%">'.$item['return_date'].'</td>';
		//echo '<td align="center"></td>';
		echo '<tr>';
		$data_array[$item['c_date']] = $data_array[$item['c_date']] + $item['count_id'];
		$data_array2['Request Service'][$item['c_date']] = $item['count_id'];
	}
	if($count == 0) {
		echo '<tr><td colspan="11" align="center"><i>- Item Not Found -</i></td></tr>';
	}
		} else {
			echo '<tr><td colspan="11" align="center"><i>- Invalid Parameter -</i></td></tr>';
		}
		?>
	</table>
</div>
<br>
<input type="button" onclick="exportExcel()" value="Export to Excel">
