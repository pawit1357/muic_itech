<div class="module-head">Room</div>
<div>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_USER"))){
		echo CHtml::link('Create New',array('room/create'),array('class'=>'add'));
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
				<th width="15%">Room Code</th>
				<th width="15%">Room Type</th>
				<th width="15%">Name</th>
				<th width="15%">Staff</th>
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
				<td class="center"><?php echo $data->room_code?></td>
				<td class="center"><?php echo $data->room_group->name?></td>
				<td class="center"><?php echo $data->name?></td>
				<td>
				<a title="permissions" href="<?php echo Yii::app()->CreateUrl('Room/manageStaff/id/'.$data->id)?>">Staffs</a>
				</td>
				
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('Room/view/id/'.$data->id)?>"></a>
					<a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('Room/update/id/'.$data->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('Room/delete/id/'.$data->id)?>"></a>
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
