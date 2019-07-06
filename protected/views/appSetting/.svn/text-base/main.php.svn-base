<div class="module-head">App Setting</div>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Printer Type</th>
				<th width="15%">Fine</th>
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
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
				<td class="center"><?php echo (($data->print_format==0)? 'Normal':'Themal')?></td>
				<td class="center"><?php echo $data->returnLatePricePerDay?></td>
				<td class="center"><a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('AppSetting/update/id/'.$data->id)?>"></a>
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

