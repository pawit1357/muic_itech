<span class="module-head">Check Status</span>
<script type="text/javascript">
function checkStatus(){
	var data = '';
	if($('#date_filter').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'date_filter='+$('#date_filter').val();
	}
	$('#my-model-grid').yiiGridView('update', {url : '<?php echo Yii::app()->createUrl('RequestBorrow/CheckStatus')?>/ajax/my-model-grid', data: data});
}
</script>
<div>
	<div class="filter">
		<b>Filter</b> Date <input class="date-picker" onchange="checkStatus()"
			type="text" id="date_filter" name="date_filter">
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
						'header'=>'Use Date',
						'value'=>'"'.$request_find_date.'"',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Equipment',
						'value'=>'$data->name',
				),
				array(
						'header'=>'Availble Qty',
						'value'=>'(RequestUtil::getMaxEquipmentType($data->id) - RequestUtil::getCurrentEquipmentTypeUse($data->id, "'.$request_find_date.'"))',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header'=>'Total Qty',
						'value'=>'RequestUtil::getMaxEquipmentType($data->id)',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'header'=>'Action',
						'class'=>'CButtonColumn',
						'template'=>'{request}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'request' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_REQUEST_BORROW"))',
										'url'=>'"request/id/".$data->id',
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
