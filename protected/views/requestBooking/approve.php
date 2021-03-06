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
				<th width="10%">User</th>
				<th width="15%">Booking Type</th>
				<!-- 				<th width="15%">Request Date</th> -->
				<th width="15%">Use Date</th>
				<th width="15%">Use Time</th>
				<th width="10%">Room</th>
				<th width="10%">Status</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			foreach ($data->searchAllBooking()->data as $request) {
			?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo $counter++?></td>
				<td class="center"><?php echo $request->user_login->user_information->first_name?>
				
				<td class="center"><?php echo $request->request_booking_type->name?>
					<!-- 				<td class="center"><?php// echo DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");?> -->
				
				<td class="center"><?php echo $request->request_date == null ? $request->day_in_week->name : DateTimeUtil::getDateFormat($request->request_date, "dd MM yyyy");?>
				
				<td class="center"><?php echo DateTimeUtil::getTimeFormat($request->period_s->start_hour, $request->period_s->start_min)." - ".DateTimeUtil::getTimeFormat($request->period_e->end_hour, $request->period_e->end_min); ?>
				
				<td class="center"><?php echo $request->room->room_code?></td>
				<td class="center"><?php 
				switch ($request->status_code) {
					case 'REQUEST_WAIT_APPROVE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array ('width' => 20,'height' => 20) );
						break;
					default:
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/approved.png", "", array ('width' => 20,'height' => 20) );
						break;
				}
				?></td>
				<td>
				<a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('RequestBooking/view/id/'.$request->id)?>"></a>
				<a title="Approve"
					href="<?php echo Yii::app()->CreateUrl('RequestBooking/ApproveRequest/id/'.$request->id)?>"><?php echo CHtml::image('/itech/images/approved.png', 'Waiting apporve.'); ?>
				</a> <a title="DisApprove"
					href="<?php echo Yii::app()->CreateUrl('RequestBooking/DisapproveRequest/id/'.$request->id)?>"><?php echo CHtml::image('/itech/images/disapproved.png', 'Waiting apporve.'); ?>
				</a>
				</td>

			</tr>

			<?php }?>
		</tbody>
	</table>
</div>

<br>

