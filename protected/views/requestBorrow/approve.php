<span class="module-head">Approve</span>

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
						'header'=>'Approve',
						'template'=>'{Approve}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'Approve' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "EDIT_REQUEST_BOOKING"))',
										'url' => 'Yii::app()->createUrl("/RequestBorrow/ApproveRequest/")."/id/".$data->id',
								),
						),
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'header'=>'Disapprove',
						'template'=>'{Disapprove}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'Disapprove' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "EDIT_REQUEST_BOOKING"))',
										'url' => 'Yii::app()->createUrl("/RequestBorrow/DisapproveRequest/")."/id/".$data->id',
								),
						),
				),
		),
));
?>
<br>

