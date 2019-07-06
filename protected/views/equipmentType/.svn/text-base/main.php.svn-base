<div class="module-head">Equipment Type</div>
<div>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_USER"))){
		echo CHtml::link('Create New',array('EquipmentType/create'), array('class'=>'add'));
	}
	?>

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'equipment-type-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>
<br>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Code</th>
				<th>Name</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->search();
			foreach ($dataProvider->data as $equipmentType) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?></td>
				<td class="center"><?php echo $equipmentType->equipment_type_code?>
				</td>
				<td><?php echo $equipmentType->name?></td>
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('equipmentType/view/id/'.$equipmentType->id)?>"></a>
					<a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('equipmentType/update/id/'.$equipmentType->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('equipmentType/delete/id/'.$equipmentType->id)?>"></a>
				</td>
			</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>


<?php
/*
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
						'name'=>'equipment_type_code',
 						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
 				array(
						'name'=>'name',
				),
 				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
 						'template'=>'{view} {update} {delete}',
 						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
 						'buttons'=>array
 						(
 								'view' => array
 								(
 										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_EQUIPMENT_TYPE"))',
 								),
 								'update' => array
 								(
 										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_EQUIPMENT_TYPE"))',
 								),
 								'delete' => array
 								(
 										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_EQUIPMENT_TYPE"))',
 								),
 						),
				),
		),
));
*/
?>
