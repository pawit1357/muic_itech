
	<table x:str BORDER="1">
		<tr>
			<th colspan="11" align="center">Using Sheet <?php echo $_GET['month_filter']?> / <?php echo $_GET['year_filter']?></th>
		</tr>
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Request Date</th>
			<th rowspan="2">Section / Name</th>
			<th rowspan="2">Purpose</th>
			<th colspan="3">User Type</th>
			<th colspan="2">Period of Use</th>
			<th rowspan="2">Return Date</th>
			<th rowspan="2">Signature of User</th>
		</tr>
		<tr>
			<th>Student</th>
			<th>Lecturer</th>
			<th>Staff</th>
			<th>Since</th>
			<th>Until</th>
		</tr>
		<?php 
		$mode = $_GET['mode'];
		if($mode == '') $mode = 'daily';

		$month = $_GET['month_filter'];
		$year = $_GET['year_filter'];
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
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."' ";
			}
			$sql = $sql."UNION ";
			$sql = $sql."SELECT DATE_FORMAT(request_service.create_date,'%d %b %Y ') as request_date, CONCAT(user_information.first_name, ' ', user_information.last_name) as name, ";
			$sql = $sql."'Request Service' as purpose, user_login.role_id as user_type, DATE_FORMAT(request_service.due_date,'%d %b %Y ') as start_date, ";
			$sql = $sql."DATE_FORMAT(request_service.due_date,'%d %b %Y ') as end_date, '-' as return_date ";
			$sql = $sql."FROM request_service INNER JOIN user_login ON request_service.user_login_id = user_login.id ";
			$sql = $sql."INNER JOIN user_information ON user_login.id = user_information.id ";
			if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."' ";
			}
			$sql = $sql."UNION ";
			$sql = $sql."SELECT DATE_FORMAT(request_borrow.create_date,'%d %b %Y ') as request_date, CONCAT(user_information.first_name, ' ', user_information.last_name) as name, ";
			$sql = $sql."event_type.name as purpose, user_login.role_id as user_type, DATE_FORMAT(request_borrow.from_date,'%d %b %Y ') as start_date, ";
			$sql = $sql."DATE_FORMAT(request_borrow.thru_date,'%d %b %Y ') as end_date, DATE_FORMAT(request_borrow.thru_date,'%d %b %Y ') as return_date ";
			$sql = $sql."FROM request_borrow INNER JOIN user_login ON request_borrow.user_login_id = user_login.id ";
			$sql = $sql."INNER JOIN user_information ON user_login.id = user_information.id INNER JOIN event_type ON request_borrow.event_type_id = event_type.id ";
			if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
				$sql = $sql." WHERE create_date between '".$fromDate."' AND '".$thruDate."' ";
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
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '4' ? 'X' : '').'</b></td>';
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '3' ? 'X' : '').'</b></td>';
		echo '<td align="center" width="6%"><b>'.($item['user_type'] == '2' ? 'X' : '').'</b></td>';
		echo '<td align="center" width="10%">'.$item['start_date'].'</td>';
		echo '<td align="center" width="10%">'.$item['end_date'].'</td>';
		echo '<td align="center" width="10%">'.$item['return_date'].'</td>';
		echo '<td align="center"></td>';
		echo '</tr>';
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
