<span class="module-head">Approve</span>
<br>
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
<br>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Service Type</th>
				<th width="20%">Requested Date</th>
				<th width="13%">Due Date</th>
				<th width="10%">Status</th>
				<th width="10%">Action</th>
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

				<td class="center"><?php echo RequestUtil::getAllRequestServiceTypeName($request->id); ?>
				
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->create_date, "dd MM yyyy"); ?>
				
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->due_date, "dd MM yyyy"); ?>
				
				<td class="center"><?php 
				switch ($request->status_code) {
					case 'REQUEST_ISERVICE_WAIT_APPROVE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array ('width' => 20,'height' => 20) );
						break;
					default:
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/approved.png", "", array ('width' => 20,'height' => 20) );
						break;
				}
				?></td>

				<td class="center"><?php if( UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_REQUEST_SERVICE",)) ){?>
					<a title="Approve"
					href="<?php echo Yii::app()->CreateUrl('RequestService/ApproveRequest/id/'.$request->id)?>"><?php echo CHtml::image('/itech/images/approved.png', 'Waiting apporve.'); ?>
				</a> <a title="DisApprove"
					href="<?php echo Yii::app()->CreateUrl('RequestService/DisapproveRequest/id/'.$request->id)?>"><?php echo CHtml::image('/itech/images/disapproved.png', 'Waiting apporve.'); ?>
				</a> <?php }?>
				</td>

			</tr>

			<?php }?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>
