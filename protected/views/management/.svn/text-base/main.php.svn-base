<span class="module-head">Request Booking</span>
<div>
	&nbsp;

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
						'htmlOptions'=>array('width'=>'15%'),
				),
				array(
						'header'=>'วันที่จอง',
						'value'=>'DateTimeUtil::getDateFormat($data->create_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%'),
				),
				array(
						'header'=>'วันที่ใช้',
						'value'=>'DateTimeUtil::getDateFormat($data->request_date, "dd MM yyyy");',
						'htmlOptions'=>array('width'=>'15%'),
				),
				array(
						'header'=>'ห้อง',
						'value'=>'$data->room->room_code',
						'htmlOptions'=>array('width'=>'10%'),
				),
				array(
						'header'=>'อุปกรณ์',
						'value'=>'$data->equipment->name',
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'template'=>'{view} {update} {delete}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'view' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_USER"))',
								),
								'update' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_USER"))',
								),
								'delete' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_USER"))',
								),
						),
				),
		),
));
?>
