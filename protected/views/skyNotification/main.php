<div class="module-head">SKY Notification</div>
<div>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN"))){
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
		</tr>
	</table>
</div>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
			
			
			<tr>
				<th width="5%">#</th>
				<th width="35%">Token</th>
				<th width="20%">Create Date</th>
				<th width="10%">Status</th>
				<th width="10%">Action</th>
			</tr>
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
				<td class="center"><?php echo $request->request_key; ?>
				
				<td class="center"><?php echo $request->create_date; ?>
				
				<td class="center"><?php
				switch ($request->status) {
					case 0 :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array ('width' => 20,'height' => 20) );
						break;
					case 1 :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/approved.png", "", array ('width' => 20,'height' => 20) );
						break;
					}
				 ?>
				
				<td class="center"><?php if( UserLoginUtil::hasPermission(array("FULL_ADMIN")) ){
					if ($request->status != 1) {
					?> <a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('SkyNotification/LoadData/id/'.$request->id); ?>"></a>
					<?php }
				}?></td>

			</tr>

			<?php }?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>


