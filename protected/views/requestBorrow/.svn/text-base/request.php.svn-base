<div class="module-head">
	<span>Request Borrow</span>
</div>
<?php 
if(isset($_SESSION['OPERATION_RESULT'])) {
	$result = $_SESSION['OPERATION_RESULT'];
	echo '<div class="'.$result['class'].'">'.$result['message'].'</div>';
	unset($_SESSION['OPERATION_RESULT']);
}
?>
<div>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
	<script type="text/javascript">
	$(function(){
		$('#users-form').submit(function(){
			return (validateForm() && confirm('Do you want to borrow ?'));
			});
	});
	function validateForm() {			
		if(!validateEquipment()) return false;
		if(!validateFromDate()) return false;
		if(!validateThruDate()) return false;
		if(!validateLocationEvent()) return false;
		if(!validateCheifEmail()) return false;
		if(!validateTypeOfEvent()) return false;
		return true;
	}
	function validateEquipment() {
		var objs = document.getElementsByName('equipments[]');
		var hasChecked = false;
		for (var i = 0; i < objs.length; i++) {
			if (objs[i].checked) {
				hasChecked = true;
				break;
			}
		}
		if(!hasChecked) {
			alert('Please select equipment.');
			return false;
		}
		return true;
	}
	function validateFromDate() {
		var obj = $('#date_picker_1');
		if(obj.val() == '') {
			alert('Please select from date.');
			obj.focus();
			return false;
		}
		return true;
	}
	function validateThruDate() {
		var obj = $('#date_picker_2');
		if(obj.val() == '') {
			alert('Please select to date.');
			obj.focus();
			return false;
		}
		return true;
	}
	function validateLocationEvent() {
		var obj = $('#location');
		if(obj.val() == '') {
			alert('Please select location event.');
			obj.focus();
			return false;
		}
		if(obj.val() == 'WITHOUT_MUIC') {
			var obj2 = $('#approve_by');
			if(obj2.val() == '') {
				alert('Please enter appove email.');
				obj2.focus();
				return false;
			}
		}
		return true;
	}
	function validateCheifEmail() {
		var obj = $('#staff-email');
		if(obj.val() == '') {
			alert('Please enter chef email.');
			obj.focus();
			return false;
		}
		return true;
	}
	function validateTypeOfEvent() {
		var obj = $('#type_of_event');
		if(obj.val() == '') {
			alert('Please select type of event.');
			obj.focus();
			return false;
		}
		return true;
	}


	
	$(function(){
		loadDatePicker('date_picker_1');
		loadDatePicker('date_picker_2');

		var availableTags = [
		             		<?php 
		             		$userLogins = UserLogin::model()->findAll(array('condition'=>"role_id = '2'"));
							if($userLogins != null) {
								foreach($userLogins as $userLogin) {
									echo '"'.$userLogin->email.'",';
								}
							}
		             		?>
		                   ];
		                   $( "#staff-email" ).autocomplete({
		                     source: availableTags
		                   });
		
				});
	function qtyChange(element){
		var checkboxId = 'C' + element.id;
		if(parseInt(element.value) > 0) {
			document.getElementById(checkboxId).checked = true;
		} else {
			document.getElementById(checkboxId).checked = false;
		}
	}
	function locationChange() {

			var availableTags = [
				             		<?php 
$emails = EmailForApprove::model()->findAll();
							if($emails != null) {

								foreach($emails as $email) {
									echo '"'.$email->email.'",';
																		
								}
							}
				             		?>
				                   ];
			$( "#approve_by" ).val(availableTags[0]);
				                   $( "#approve_by" ).autocomplete({
				                     source: availableTags
				                   });
	}
</script>
	<?php 
	$eventTypes = EventType::model()->findAll();
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" valign="top"></td>
			<td class="column-right">
				<table>
					<tr>
						<td></td>
						<td align="center" width="30%"><b>Equipment</b></td>
						<td align="center"><b>Unit</b></td>
					</tr>
					<?php 
					$equipmentTypes = EquipmentType::model()->findAll();
					foreach ($equipmentTypes as $equipmentType){
						$equipments = Equipment::model()->findAll(array('condition'=>"(room_id = '7') and equipment_type_id = '".$equipmentType->id."'"));
						$requestBorrows = RequestBorrow::model()->findAll(array('condition'=>"status_code != 'REQUEST_BORROW_COMPLETED' AND status_code != 'REQUEST_BORROW_CANCELLED'"));
						$used = 0;
						foreach($requestBorrows as $requestBorrow) {
							$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id = '".$requestBorrow->id."' and equipment_type_id='".$equipmentType->id."'"));
							if($requestBorrowEquipmentTypes != null && count($requestBorrowEquipmentTypes) > 0 ) {
								$requestBorrowEquipmentType = $requestBorrowEquipmentTypes[0];
								$used = $used + $requestBorrowEquipmentType->quantity;
							}
						}
						$max = count($equipments) - $used;




						echo '<script type="text/javascript">$(function() {$( "#EquipmentType'.$equipmentType->id.'").spinner({min: 0, max: '.($max * 1).', stop: function(event, ui) {$(this).change();}    });}); </script>';
						echo '<tr><td><input type="checkbox" class="hidebox" onclick="this.checked=!this.checked;" id="CEquipmentType'.$equipmentType->id.'" name="equipments[]" value="'.$equipmentType->id.'" '.($_GET['id'] == $equipmentType->id ? 'checked="checked"' : '').'></td><td>'.$equipmentType->name.'</td><td><input type="text" readonly="readonly" onchange="qtyChange(this)" id="EquipmentType'.$equipmentType->id.'" name="EquipmentType['.$equipmentType->id.']" '.($_GET['id'] == $equipmentType->id ? 'value="1"' : '').' /><span> Available : '.$max.'</span></td>';
 					}?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="column-left" width="25%">From Date</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[from_date]" id="date_picker_1">
			</td>
		</tr>
		<tr>
			<td class="column-left">To Date</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[thru_date]" id="date_picker_2">
			</td>
		</tr>
		<tr>
			<td class="column-left" valign="top">Location Event</td>
			<td class="column-right"><select id="location"
				name="RequestBorrow[location]"
				onchange="ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/RequestBorrowExecutiveApprove/Location")?>/' + this.value, 'executive_approve', 'locationChange()')">
					<option value="">--Select--</option>
					<option value="WHITHIN_MUIC">Within MUIC</option>
					<option value="WITHOUT_MUIC">Without MUIC</option>
			</select>
				<div id="executive_approve"></div>
			</td>
		</tr>
		<tr>
			<td class="column-left">Executive / Chef Email</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[chef_email]" id="staff-email">
			</td>
		</tr>
		<tr>
			<td class="column-left">Type of Event</td>
			<td class="column-right"><select id="type_of_event"
				name="RequestBorrow[event_type_id]">
					<option value="">--Select--</option>
					<?php foreach($eventTypes as $eventType) {?>
					<option value="<?php echo $eventType->id?>">
						<?php echo $eventType->name?>
					</option>
					<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="column-left">Important Note</td>
			<td class="column-right"><textarea name="RequestBorrow[description]"></textarea>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" name="add_request"
				value="Submit" /><input type="reset" name="reset_request"
				value="Reset" onclick="$('#executive_approve').html('')" /></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




