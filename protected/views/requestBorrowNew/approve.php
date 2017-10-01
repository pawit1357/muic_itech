<span class="module-head">Approve</span>
<div>
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

				<td><?php echo CHtml::image('/itech/images/status_prepare.png', 'Prepare equipment.'); ?>
				</td>
				<td>Prepare</td>
				<td></td>

				<td><?php echo CHtml::image('/itech/images/status_ready.png', 'Equipment already for borrow.'); ?>
				</td>
				<td>Ready</td>
				<td></td>

				<td><?php echo CHtml::image('/itech/images/status_return.png', 'Returned.'); ?>
				</td>
				<td>Returnned</td>
				<td></td>

				<td><?php echo CHtml::image('/itech/images/missing.png', 'Equipment have some Problem.'); ?>
				</td>
				<td>Problem</td>
				<td></td>

			</tr>
		</table>
	</div>
	<div class="search-box">
		<?php
		$form = $this->beginWidget ( 'CActiveForm', array (
				'id' => 'room-form',
				'method' => 'get',
				'action' => '',
				'enableAjaxValidation' => false
		) );
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
		<br>
	</div>
</div>
<br>
<br>
<br>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="10%">Doc No.</th>
				<th>Name</th>
				<th width="14%">Request Date</th>
				<th width="13%">Return Date</th>
				<th width="10%">Status</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			$dataProvider = $data->searchWattingApprove ();
			foreach ( $dataProvider->data as $request ) {
				?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++) ?>
				</td>
				<td class="center"><?php echo $request->DocumentNo?>
				</td>
				<td class="left"><?php echo $request->user_login->username?>
				</td>
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->from_date, "dd MM yyyy")?>
				</td>
				<td class="center"><?php 
				if(UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV))) {
					echo date('d M Y',strtotime($request->thru_date));//

				}else{
					echo date('d M Y',strtotime('0 day', strtotime($request->thru_date)));
				}
				?> <?//php echo DateTimeUtil::getDateFormat($request->thru_date, "dd MM yyyy")?>
				</td>
				<td class="center"><?php
				switch ($request->status_code) {
					case 'R_B_NEW_WAIT_APPROVE_1' :
					case 'R_B_NEW_WAIT_APPROVE_2' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_DISAPPROVE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/disapproved.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_DO_NOT_RECEIVE':
					case 'R_B_NEW_CANCELLED' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/cancel.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_PREPARE' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/status_prepare.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_READY' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/status_ready.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_RETURNED' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/status_return.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_READY_MISSING' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/missing.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
					case 'R_B_NEW_RETURNED_MISSING' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/missing.png", "", array (
						'width' => 20,
						'height' => 20
						) );
						break;
				}
				?>
				</td>
				<td class="center"><?php
				switch ($request->status_code) {
					case 'R_B_NEW_WAIT_APPROVE_1' :
						if($request->approver1 == UserLoginUtil::getUserLoginId()) {
							?> <a title="Approve"
												href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/Approve/id/'.$request->id)?>">Process</a>
												<?php
						}else{
							?> <a title="View" class="ico-s-view" href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/view/id/'.$request->id)?>"></a>
					<?php
						}
						break;
case 'R_B_NEW_WAIT_APPROVE_2' :
	if($request->approver2 == UserLoginUtil::getUserLoginId()) {
		?> <a title="Approve"
							href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/Approve/id/'.$request->id)?>">Process</a>
							<?php
	}else{
		?> <a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/view/id/'.$request->id)?>"></a>
					<?php
	}




					break;

				}
				?>
				</td>
			</tr>
			<?php
			}
			if ($counter == 1) {
				echo '<tr><td colspan="5"><i>- No item found -</i></td></tr>';
			}
			?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>



