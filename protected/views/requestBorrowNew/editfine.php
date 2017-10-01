<fieldset>
	<legend>Adjust fine.</legend>
	<div class="simple-grid">
		<table class="items">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="30%">Name</th>
					<th width="10%">return_date</th>
					<th width="10%">return_price</th>
					<th width="10%">broken_price</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$counter = 1;
			foreach ( $data as $request ) {
				?>
			<tr>

					<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
					<td class="left"><?php echo $request->equipment->name?>
				</td>
					<td class="center"><?php echo $request->return_date?>
				</td>
					<td class="left"><?php echo $request->return_price?>
				</td>
					<td class="center"><?php echo $request->broken_price?>

				
					
					<td class="center"><a title="Edit" class="ico-s-edit"
						href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/updatefine/id/'.$request->id)?>"></a>
					</td>
				</tr>
			<?php
			}
			if ($counter == 1) {
				?>
			<tr>
					<td colspan="9"><i>-No item found-</i></td>
				</tr>
			<?php }?>
		</tbody>
		</table>
	</div>
</fieldset>

