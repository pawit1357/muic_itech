﻿<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
$(function(){

	loadDatePicker('startDateFrom');
	loadDatePicker('startDateTo');
	loadDatePicker('endDateFrom');
	loadDatePicker('endDateTo');
	
});

function filter(){
	
	var data = '';
	
}
</script>

<?php 
$status = Status::model()->findAll(array('condition'=>"status_group_id ='REQUEST_BORROW_STATUS_NEW'"));
?>
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
			<td>Approve</td>
			<td></td>

			<td><?php echo CHtml::image('/itech/images/disapproved.png', 'Dis Apporve.'); ?>
			</td>
			<td>DisApprove</td>
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

<fieldset>
	<legend>Search Criteria</legend>

	<?php
	$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'frm1',
			'method' => 'get',
			'action' => '',
			'enableAjaxValidation' => false
	) );
	?>
	<table>

		<tr>
			<td align="right">Receive date:</td>
			<td><input type="text" name="startDateFrom" id="startDateFrom"
				value="<?php echo $_GET['startDateFrom']?>"></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td align="right">Return date:</td>
			<td><input type="text" name="endDateFrom" id="endDateFrom"
				value="<?php echo $_GET['endDateFrom']?>">
			</td>
			<td align="right">Over:</td>
			<td align="left"><select id="isOverReturnDate"
				name="isOverReturnDate">
					<option value="0">--No--</option>
					<option value="1"
					<?php echo 1 == $_GET['isOverReturnDate'] ? 'selected="selected"' : ''?>>Yes</option>
			</select>
			</td>

		</tr>
		<tr>
			<td align="right">DocumentNo,User:</td>
			<td><input type="text" name="search_text"
				value="<?php echo $_GET['search_text']?>">
			</td>
			<td align="right">Status:</td>
			<td><select id="search_status" name="search_status">
					<option value="">--Select--</option>
					<?php foreach($status as $status) {?>
					<option value="<?php echo $status->status_code?>"
					<?php echo $status->status_code == $_GET['search_status'] ? 'selected="selected"' : ''?>>
						<?php echo $status->name?>
					</option>
					<?php }?>
			</select>
			</td>
		</tr>
	</table>
	<div align="center">
		<input type="submit" id="broken-save" value="Search" " />
	</div>
	<?php $this->endWidget(); ?>
</fieldset>

<br>

<?php 
if(UserLoginUtil::isBlackList(UserLoginUtil::getUserLoginId()) && !UserLoginUtil::areUserRole ( array (UserRoles::ADMIN,UserRoles::STAFF_AV))){
	?>

<div>
	<?php echo CHtml::image('/itech/images/info.png', 'Infomation.'); ?>
	<font color="red"><b>You cannot borrow because you return equipment
			delay more than 2 time.</b> </font><br>
</div>

<?php } ?>
<br>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="10%">Doc No.</th>
				<th width="11%">Name</th>
				<th width="14%">Receive date</th>
				<th width="14%">Return Date</th>
				<th width="10%">Status</th>
				<th width="13%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			$dataProvider = $data->search ();
			foreach ( $dataProvider->data as $request ) {
				?>
			<tr
				class="line-<?php echo ( (getRemainDay(date("Y-m-d"), $request->thru_date) >= 0) ? ($counter%2 == 0 ? '1' : '2') : '3' )?>">

				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
				<td class="center"><?php echo $request->DocumentNo?>
				</td>
				<td class="left"><?php echo $request->user_login->username ?>
				</td>
				<td class="center"><?php echo DateTimeUtil::getDateFormat($request->from_date, "dd MM yyyy")?>
				</td>
				<td class="center">
				<?php 
				

				
// 				 if(UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV))) {
// 				 	echo DateTimeUtil::getDateFormat($request->thru_date, "dd MM yyyy");
// 				 }else{
					echo date('d M Y',strtotime('0 day', strtotime($request->thru_date)));
// 				 }
				?>

				<!-- <td class="center"><?//php echo getRemainContent(date("Y-m-d"), $request->thru_date)?></td> -->
				<td class="center"><?php
				switch ($request->status_code) {
					case 'R_B_NEW_WAIT_APPROVE_1' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array (
						'width' => 20,
						'height' => 20
						) )."<br> ( ".UserLoginUtil::getUserById($request->approver1)->user_information->first_name." )";

						break;
					case 'R_B_NEW_WAIT_APPROVE_2' :
						echo CHtml::image ( Yii::app ()->request->baseUrl . "/images/waiting.png", "", array (
						'width' => 20,
						'height' => 20
						) )."<br> ( ".UserLoginUtil::getUserById($request->approver2)->user_information->first_name." )";

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

				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/view/id/'.$request->id)?>"></a>
					<?php if(UserLoginUtil::areUserRole(array(UserRoles::ADMIN, UserRoles::STAFF_AV))) {
						switch($request->status_code)
						{
							case 'R_B_NEW_PREPARE':
							case 'R_B_NEW_READY_MISSING':
								?> <a title="Prepare" class="ico-s-prepare"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/prepare/id/'.$request->id)?>"></a>
					<?php
					break;
					case 'R_B_NEW_READY':
					case 'R_B_NEW_RETURNED_MISSING':
						?> <a title="Return" class="ico-s-return"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/return/id/'.$request->id)?>"></a>
					<?php
					break;
					default:
					
						break;
						}
						?> <a title="Delete" class="ico-s-delete"
					onclick="return confirm('Are you sure to delete?')"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/delete/id/'.$request->id)?>"></a>
					<a title="Edit" class="ico-s-update"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/edit/id/'.$request->id)?>"></a>
					<a title="Edit-Fine" class="ico-s-editfine"
					href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/editfine/id/'.$request->id)?>"></a>
					<?php }else{
						switch($request->status_code)
						{
							case 'R_B_NEW_WAIT_APPROVE_1':
								?> <a title="Delete" class="ico-s-delete"
								onclick="return confirm('Are you sure to delete?')"
								href="<?php echo Yii::app()->CreateUrl('RequestBorrowNew/delete/id/'.$request->id)?>"></a>
							<?php
							break;
						}
						?> <?php }?>
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
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>

<?php
function  getRemainDay($startDate, $endDate) {
	$remain = DateTimeUtil::getDayRemain ( $startDate, $endDate );
	return $remain;
}
function getRemainContent($startDate, $endDate) {
	$class = "";
	$remain = DateTimeUtil::getDayRemain ( $startDate, $endDate );
	if ($remain == 0) {
		$class = "text-orange";
	} else if ($remain < 0) {
		$class = "text-red";
	} else if ($remain == 1) {
		$class = "text-yellow";
	}
	return '<span class="' . $class . '"><b>' . $remain . "</b></span>";
}
?>
