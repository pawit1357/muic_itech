<div class="module-head">Gallery</div>
<div>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_USER"))){
		echo CHtml::link('Create New',array('gallery/create'),array('class'=>'add'));
	}
	?>

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'gallery-form',
				'method'=>'get',
				'action'=>'gallery',
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
						'header'=>'Name',
						'value'=>'$data->name',
				),
				array(
						'header'=>'File',
						'value'=>'$data->file_path',
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'template'=>'{view} {update} {delete}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'view' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_GALLERY"))',
								),
								'update' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_GALLERY"))',
								),
								'delete' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_GALLERY"))',
								),
						),
				),
		),
));
?>
