
<script type="text/javascript">
$(function(){
	$('#month_filter').val('<?php echo date('m') *1?>');
	$('#day_filter').val('<?php echo date('d') *1?>');
	//filter();	
});
function filter(){
	var data = '';
	if($('#year_filter').val() != '') {
		data = 'year_filter='+$('#year_filter').val();
		if($('#month_filter').html() == '<option value="">- All Month -</option>') {
			$('#month_filter').html('');
			$('#month_filter').append('<option value="">- All Month -</option>');
			$('#month_filter').append('<option value="1">January</option>');
			$('#month_filter').append('<option value="2">February</option>');
			$('#month_filter').append('<option value="3">March</option>');
			$('#month_filter').append('<option value="4">April</option>');
			$('#month_filter').append('<option value="5">May</option>');
			$('#month_filter').append('<option value="6">June</option>');
			$('#month_filter').append('<option value="7">July</option>');
			$('#month_filter').append('<option value="8">August</option>');
			$('#month_filter').append('<option value="9">September</option>');
			$('#month_filter').append('<option value="10">October</option>');
			$('#month_filter').append('<option value="11">November</option>');
			$('#month_filter').append('<option value="12">December</option>');
		}
	} else {
		$('#month_filter').html('<option value="">- All Month -</option>');
		$('#day_filter').html('<option value="">- All Day -</option>');
		data = 'year_filter=';
	}
	var dayValue = '';
	if($('#day_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		//data = data + 'day_filter='+$('#day_filter').val();
		dayValue = $('#day_filter').val();
	}
	
	if($('#month_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'month_filter='+$('#month_filter').val();
		$('#day_filter').html('<option value="">- All Day -</option>');

		var endDayOfMonth = 31;
		if($('#month_filter').val() == '4' || $('#month_filter').val() == '6' || $('#month_filter').val() == '9' || $('#month_filter').val() == '11') {
			endDayOfMonth = 30;
		}
		if($('#month_filter').val() == '2') {
			var year = parseInt($('#year_filter').val());
			if(year % 4 == 0) {
				endDayOfMonth = 29;
			} else {
				endDayOfMonth = 28;
			}
		}
		for(var i = 1; i <= endDayOfMonth; i++) {
			$('#day_filter').append('<option value="' + i + '">' + i + '</option>');
		}		
	} else {
		$('#day_filter').html('<option value="">- All Day -</option>');
		dayValue = '';
		if(data != ''){
			data = data + '&';
		}
		data = data + 'month_filter=';
	}

	if(dayValue != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'day_filter='+dayValue;
		$("#day_filter option[value='" + dayValue + "']").attr("selected", "selected");
	} else {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'day_filter=';
	}

	if($('#status_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'status_filter='+$('#status_filter').val();			
	}
	$('#my-model-grid').yiiGridView('update', {url : '<?php echo Yii::app()->createUrl('RequestBorrow/Index')?>/ajax/my-model-grid', data: data});
	$('#my-model-grid2').yiiGridView('update', {url : '<?php echo Yii::app()->createUrl('RequestBorrow/Index')?>/ajax/my-model-grid2', data: data});
	}
</script>
<?php 
$requestTypes = RequestBookingType::model()->findAll();
$requestStatuses = Status::model()->findAll(array('condition'=>"t.status_group_id='REQUEST_BORROW_STATUS'"));
?>
<div>
	<div class="filter">
		<b>Filter</b> <select name="year_filter" id="year_filter"
			onchange="filter()">
			<option value="">All Year</option>
			<?php 
			for($i = date("Y"); $i < (date("Y") + 5); $i++) {
			?>
			<option value="<?php echo $i?>"
			<?php echo $i == date("Y") ? 'selected="selected"' : ''?>>
				<?php echo $i?>
			</option>
			<?php }?>
		</select> <select name="month_filter" id="month_filter"
			onchange="filter()"><option value="">- All Month -</option>
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>

		</select>
		

			
		<select name="day_filter" id="status_filter"
			onchange="filter()"><option value="">- All Status -</option>
			<?php 
			foreach($requestStatuses as $requestStatus) {
				?>
			<option value="<?php echo $requestStatus->status_code?>">
				<?php echo $requestStatus->name?>
			</option>
			<?php }?>
		</select>
	</div>

	<div class="clear"></div>
</div>
<br>

<span class="module-head">On going Request</span>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'my-model-grid2',
		'dataProvider' => $data2->search(),
		'ajaxUpdate'=>true,
		'columns' => array(
				array(
						'header'=>'#',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
						'htmlOptions'=>array('width'=>'5%', 'align'=>'center'),
				),
				array(
						'header'=>'User',
						'value'=>'$data->user_login->user_information->first_name',
				),
				array(
						'header'=>'Requested Date',
						'value'=>'DateTimeUtil::getDateFormat($data->create_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Use Date',
						'value'=>'DateTimeUtil::getDateFormat($data->from_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Return Date',
						'value'=>'DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Equipment',
						'value'=>'RequestUtil::getRequestBookingEquipmentNames($data->id)',
				),
				array(
						'header'=>'Status',
						'value'=>'$data->status->name',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'template'=>'{view} {update}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'view' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BORROW", "VIEW_ALL_REQUEST_BORROW"))',
								),
								'update' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))',
								),
						),
				),
		),
));
?>





<span class="module-head">Completed Request</span>
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
						'header'=>'User',
						'value'=>'$data->user_login->user_information->first_name',
				),
				array(
						'header'=>'Requested Date',
						'value'=>'DateTimeUtil::getDateFormat($data->create_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Use Date',
						'value'=>'DateTimeUtil::getDateFormat($data->from_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Return Date',
						'value'=>'DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Equipment',
						'value'=>'RequestUtil::getRequestBookingEquipmentNames($data->id)',
				),
				array(
						'header'=>'Status',
						'value'=>'$data->status->name',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'template'=>'{view} {update}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'view' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_BORROW", "VIEW_ALL_REQUEST_BORROW"))',
								),
								'update' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_BORROW"))',
								),
						),
				),
		),
));
?>
