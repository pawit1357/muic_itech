<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
var mode = '<?php echo $_GET['mode']?>';
var month_filter = '<?php echo $_GET['month_filter']?>';
var year_filter = '<?php echo $_GET['year_filter']?>';
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
		window.location = "<?php echo Yii::app()->createUrl('Report/EquipmentCrackStatisticReport')?>" + "/mode/yearly";
	}
}
function filter() {
	if($('#mode').val() == 'daily') {
		if($('#month_filter').val() != '' && $('#year_filter').val() != '') {
			window.location = "<?php echo Yii::app()->createUrl('Report/EquipmentCrackStatisticReport')?>" + "/mode/daily/month_filter/" + $('#month_filter').val() + "/year_filter/" + $('#year_filter').val();
		}
	} else if ($('#mode').val() == 'monthly') {
		if($('#year_filter').val() != '') {
			window.location = "<?php echo Yii::app()->createUrl('Report/EquipmentCrackStatisticReport')?>" + "/mode/monthly/year_filter/" + $('#year_filter').val();
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

	if(month_filter != '') {
		select.val(month_filter);
	}
	if(year_filter != '') {
		select2.val(year_filter);
	}
	
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
<?php 
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
if($_GET['mode'] == 'monthly') {
	$head = 'Monthly Request Booking Statistic';
	$fDate = "".$_GET['year_filter'];
	$dataX = "[";
	foreach($months as $month) {
		$dataX = $dataX."'".$month."'".',';
	}
	$dataX = $dataX."]";
	$dataXs = $months;
} else if ($_GET['mode'] == 'yearly') {
	$head = 'Yearly Request Booking Statistic';
	$dataX = "[";
	$year = date("Y");
	for($i = $year - 5; $i <= $year; $i++) {
		$dataXs[count($dataXs)] = $i;
		$dataX = $dataX."'".$i."',";
	}
	$dataX = $dataX."]";
} else {
	$head = 'Daily Request Booking Statistic';
	$fDate = "".$months[$_GET['month_filter'] - 1]." ".$_GET['year_filter'];
	$dataXs = array();
	$dataX = "[";
	$monthValues = array(31, $_GET['year_filter']%4 == 0 ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	for($i = 1; $i <= $monthValues[$_GET['month_filter'] - 1]; $i++) {
		if($i < 10) {
			$str = "0".$i;
		} else {
			$str = $i;
		}
		$dataX = $dataX."'".$str."',";
		$dataXs[count($dataXs)] = $str;
	}
	$dataX = $dataX."]";
}

?>
<span class="module-head">Equipment Cracked Statistic Report</span>
<div>
	<form>
		Mode : <select id="mode" name="mode" onchange="changeMode()">
			<option value="daily"
			<?php echo $_GET['mode'] == 'daily' ? 'selected="selected"' : '' ?>>Daily</option>
			<option value="monthly"
			<?php echo $_GET['mode'] == 'monthly' ? 'selected="selected"' : '' ?>>Monthly</option>
			<option value="yearly"
			<?php echo $_GET['mode'] == 'yearly' ? 'selected="selected"' : ''?>>Yearly</option>
		</select> | <span id="date-period"></span>

	</form>
</div>
<br>
<div>
	<table class="report">
		<tr>
			<th width="20%">#</th>
			<th width="60%">Equipment</th>
			<th>Cracked Count</th>
		</tr>
		<?php 
		$mode = $_GET['mode'];
		if($mode == '') $mode = 'daily';

		if($mode == 'daily') {
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
		} else if ($mode == 'monthly') {
			$year = $_GET['year_filter'];
			$fromDate = date("Y-m-d", strtotime($year."-1-1"));
			$thruDate = date("Y-m-d", strtotime($year."-12-31"));
		}
		if(($mode == 'daily' || $mode == 'monthly' || $mode == 'yearly') && ($fromDate == '' || strtotime($fromDate) > 0) && ($thruDate == '' || strtotime($thruDate) > 0)) {
			mysql_connect(ConfigUtil::getHostName(), ConfigUtil::getUsername(), ConfigUtil::getPassword());
			mysql_select_db(ConfigUtil::getDbName());

			$sql = "SELECT count(equipment_cracked_log.id) as count_id, equipment_type.name as name, ";
			if($mode == 'daily') {
		$sql = $sql." DATE_FORMAT(equipment_cracked_log.cracked_date,'%d') as c_date ";
	} else if ($mode == 'monthly') {
		$sql = $sql." DATE_FORMAT(equipment_cracked_log.cracked_date,'%b') as c_date ";
	} else if ($mode == 'yearly') {
		$sql = $sql." DATE_FORMAT(equipment_cracked_log.cracked_date,'%Y') as c_date ";
	}
	$sql = $sql." FROM equipment_cracked_log INNER JOIN equipment ON equipment.id = equipment_cracked_log.equipment_id INNER JOIN equipment_type ON equipment.equipment_type_id = equipment_type.id";
	if($fromDate != '' && $thruDate != '' && strtotime($fromDate) > 0 && strtotime($thruDate) > 0) {
		$sql = $sql." WHERE equipment_cracked_log.cracked_date between '".$fromDate."' AND '".$thruDate."'";
	}
	$sql = $sql." group by c_date, name ORDER BY c_date";
	$result = mysql_query($sql);
	$count = 0;
	$data_chart = "";
	$data_array = array();
	$data_array2 = array();
	while($item = mysql_fetch_assoc($result)){
		$count = $count +1;
		echo '<tr>';
		echo '<td>'.$item['c_date'].'</td>';
		echo '<td align="center">'.$item['name'].'</td>';
		echo '<td align="right">'.$item['count_id'].'</td>';
		echo '<tr>';
		$data_array[$item['name']] = $data_array[$item['name']] + $item['count_id'];
		$data_array2[$item['name']][$item['c_date']] = $item['count_id'];
	}
	if($count == 0) {
		echo '<tr><td colspan="3" align="center"><i>- Item Not Found -</i></td></tr>';
	} else {
		foreach($data_array as $key => $value) {
$data_chart = $data_chart."['".$key."', ".$value."], ";
	}
	$data_chart2 = "";
	foreach($data_array2 as $key => $value){
		$data_chart2 = $data_chart2."{name : '".$key."', data : [";
		foreach($dataXs as $x) {
			if($value[$x] == '') {
				$qty = 0;
			} else {
				$qty = $value[$x];
			}
			$data_chart2 = $data_chart2.$qty.',';
		}
		$data_chart2 = $data_chart2."]},";
	}

	}
		} else {
			echo '<tr><td colspan="3" align="center"><i>- Invalid Parameter -</i></td></tr>';
		}
		?>
	</table>



	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/Highcharts-3.0.2/js/highcharts.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/Highcharts-3.0.2/js/modules/exporting.js"></script>

	<script type="text/javascript">
function pieChart() {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '<?php echo $head?>'
            },
            <?php if($fDate != '') {?>
            subtitle: {
                text: '<?php echo $fDate?>'
            },
            <?php }?>
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [<?php echo $data_chart ?>],
                
            }]
        });
    }


function lineChart() {
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '<?php echo $head?>'
        },
        <?php if($fDate != '') {?>
        subtitle: {
            text: '<?php echo $fDate?>'
        },
        <?php }?>
        xAxis: {
            categories: <?php echo $dataX?>
        },
        yAxis: {
            title: {
                text: 'Using'
            }
        },
        tooltip: {
            enabled: false,
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+
                    this.x +': '+ this.y;
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
        	<?php echo $data_chart2?>
        ]
    });
}

function barChart() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $head?>'
        },
        <?php if($fDate != '') {?>
        subtitle: {
            text: '<?php echo $fDate?>'
        },
        <?php }?>
        xAxis: {
            categories: <?php echo $dataX?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Using'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">Day {point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
<?php echo $data_chart2?>
                 ]
    });
}
    

		</script>
	<br>
	<div>
		<input type="button" value="Pie Chart" onclick="pieChart()"> <input
			type="button" value="Line Chart" onclick="lineChart()"> <input
			type="button" value="Bar Chart" onclick="barChart()">
	</div>
	<div id="container" style="margin-top: 20px"></div>

</div>
