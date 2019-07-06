<div class="module-head">Service Type Item</div>
<div>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_SERVICE_TYPE_ITEM"))){
		echo CHtml::link('Create New',array('ServiceTypeItem/Create'),array('class'=>'add'));
	}
	?>

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'room-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text" value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Name</th>
				<th width="15%">Service Type</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->search();


			foreach ($dataProvider->data as $data) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
			<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?></td>
				<td class="center"><?php echo $data->name?></td>
				<td class="center"><?php echo $data->request_service_type->name?></td>
				
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('ServiceTypeItem/view/id/'.$data->id)?>"></a>
					<a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('ServiceTypeItem/update/id/'.$data->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('ServiceTypeItem/delete/id/'.$data->id)?>"></a>
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