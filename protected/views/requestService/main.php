<script type="text/javascript"
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
	
// 	if($('#year_filter').val() != '') {
// 		data = 'year_filter='+$('#year_filter').val();
// 		if($('#month_filter').html() == '<option value="">- All Month -</option>') {
// 			$('#month_filter').html('');
// 			$('#month_filter').append('<option value="">- All Month -</option>');
// 			$('#month_filter').append('<option value="1">January</option>');
// 			$('#month_filter').append('<option value="2">February</option>');
// 			$('#month_filter').append('<option value="3">March</option>');
// 			$('#month_filter').append('<option value="4">April</option>');
// 			$('#month_filter').append('<option value="5">May</option>');
// 			$('#month_filter').append('<option value="6">June</option>');
// 			$('#month_filter').append('<option value="7">July</option>');
// 			$('#month_filter').append('<option value="8">August</option>');
// 			$('#month_filter').append('<option value="9">September</option>');
// 			$('#month_filter').append('<option value="10">October</option>');
// 			$('#month_filter').append('<option value="11">November</option>');
// 			$('#month_filter').append('<option value="12">December</option>');
// 		}
// 	} else {
// 		$('#month_filter').html('<option value="">- All Month -</option>');
// 		$('#day_filter').html('<option value="">- All Day -</option>');
// 		data = 'year_filter=';
// 	}
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
	
	if($('#request_type_filter').val() != '') {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'request_type_filter='+$('#request_type_filter').val();			
	}
	$('#frm1').submit();	
	//$('#my-model-grid').yiiGridView('update', {url : '<?php// echo Yii::app()->createUrl('RequestService/Index')?>/ajax/my-model-grid', data: data});
	//$('#my-model-grid2').yiiGridView('update', {url : '<?php// echo Yii::app()->createUrl('RequestService/Index')?>/ajax/my-model-grid2', data: data});
	}
</script>
<div>
	<?php 
	$requestTypes = RequestServiceType::model()->findAll();
	$requestStatuses = Status::model()->findAll(array('condition'=>"t.status_group_id='REQUEST_ISERVICE_STATUS'"));
	?>
	<div class="filter">
		<form id="frm1" action="" method="get">
			<b>Filter</b> <select name="request_type_filter"
				id="request_type_filter" onchange="filter()"><option value="">- All
					Type -</option>
				<?php 
				foreach($requestTypes as $requestType) {
				?>
				<option value="<?php echo $requestType->id?>">
					<?php echo $requestType->name?>
				</option>
				<?php }?>
			</select> Date:<input type="text" name="date_filter" id="date_filter"
				onchange="filter()">
		</form>
	</div>
	<div class="clear"></div>
</div>
<br>
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

			<td><?php echo CHtml::image('/itech/images/complete.png', 'Cancel.'); ?>
			</td>
			<td>Complete</td>
			<td></td>

			<td><?php echo CHtml::image('/itech/images/inprogress.png', 'Cancel.'); ?>
			</td>
			<td>In Progress</td>
			<td></td>
		</tr>
	</table>
</div>
<br>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Request By</th>
				<th width="15%">Service Type</th>
				<th width="20%">Requested Date</th>
				<th width="13%">Due Date</th>
				<th width="10%">Status</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->search();


			foreach ($dataProvider->data as $request) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>

				<td class="center"><?php echo $request->user_login->username ?>
				
				<td class="center"><?php echo RequestUtil::getAllRequestServiceTypeName($request->id); ?>
				
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->create_date, "dd MM yyyy"); ?>
				
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->due_date, "dd MM yyyy"); ?>
				
				<td class="center"><?php 
				//echo $request->status->name;
				switch ($request->status_code) {
					case 'REQUEST_ISERVICE_WAIT_APPROVE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'REQUEST_ISERVICE_APPROVE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/approved.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'REQUEST_ISERVICE_CANCEL' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/cancel.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'REQUEST_ISERVICE_COMPLETED' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/complete.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'REQUEST_ISERVICE_PROCESSING' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/inprogress.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;

				}

				?>
				</td>

				<td class="center"><?php if( UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_SERVICE", "VIEW_ALL_REQUEST_SERVICE")) ){?>
					<a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('RequestService/view/id/'.$request->id); ?>"></a>
					<?php }?> <?php if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_SERVICE"))){?>
					<a title="edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('RequestService/update/id/'.$request->id); ?>"></a>
					<?php }?> <?php if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_REQUEST_SERVICE"))){?>
					<a title="download" class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('RequestService/delete/id/'.$request->id); ?>"></a>
					<?php }?> <?php 
					if( UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_REQUEST_SERVICE")) && RequestUtil::hasRequestServiceFile("$data->id") ){
					?> <a title="edit" class="ico-s-download"
					href="<?php echo Yii::app()->request->baseUrl."/".RequestUtil::getRequestServiceFilePath($data->id); ?>"></a>
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

