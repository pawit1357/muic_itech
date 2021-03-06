<div class="module-head">
	<span>Request</span>
</div>
<?php
if (isset ( $_SESSION ['OPERATION_RESULT'] )) {
	$result = $_SESSION ['OPERATION_RESULT'];
	echo '<div class="' . $result ['class'] . '">' . $result ['message'] . '</div>';
	unset ( $_SESSION ['OPERATION_RESULT'] );
}
?>
<div>
	<link rel="stylesheet"
		href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css">
	<!-- Generic page styles -->
	<link rel="stylesheet"
		href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/style.css">
	<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
	<link rel="stylesheet"
		href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/jquery.fileupload-ui.css">
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.fileupload.js"></script>

	<script type="text/javascript">
		function loadAjaxUpload() {
		    'use strict';
		    // Change this to the location of your server-side upload handler:
		    var time = '<?php echo time()?>';
		    var url2 = '<?php echo Yii::app()->request->baseUrl;?>/upload/?folder=' + time;
		    $('#fileupload').fileupload({
		        url: url2,
		        dataType: 'json',
		        done: function (e, data) {
		            $.each(data.result.files, function (index, file) {
		                $('<p/>').text(file.name).appendTo('#files');
		                $('#f_path').val('upload/files/' + time + '/' + file.name);
		            });
		            $('#fileupload').hide();		            
		        },
		        progressall: function (e, data) {
		            var progress = parseInt(data.loaded / data.total * 100, 10);
		            $('#progress .bar').css(
		                'width',
		                progress + '%'
		            );
		        }
		    });
		}
		
	$(function(){
		$('#users-form').submit(function(){
			return (validateForm() && confirm('Do you want to booking ?'));
			});
	});
	function validateForm() {
		var requestType = $('#request-type');
		
		if(requestType.val() == '1') {			
			if(!validateRoom()) return false;
			if(!validateEquipmentInRoom()) return false;
			if(!validateCourseName()) return false;
		} else if (requestType.val() == '2') {
			if(!validateRoom()) return false;
			if(!validateEquipmentInRoom()) return false;
			if(!validateCourseName()) return false;
		} else if (requestType.val() == '3') {
			if(!validateRoom()) return false;
			if(!validateEquipmentInRoom()) return false;
// 			if(!validateEquipmentInRoomCount()) return false;
			if(!validateEventType()) return false;
			if(!validateRoomType()) return false;
			if(!validatePresentType()) return false;
		}
		return true;
	}
	function validateRoom(){
		var roomId = $('#room_id');
		if(roomId.val() == '') {
			alert('Please select room.');
			roomId.focus();
			return false;
		}
		return true;
	}

	function validateEquipmentInRoom(){
		var objs = document.getElementsByName('equipments[]');
		if(typeof(objs) != "undefined" && objs.length > 0) {
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
		}
		return true;
	}
	
// 	function validateEquipmentInRoomCount(){
// 		var objs = document.getElementsByName('equipments[]');
// 		if(typeof(objs) != "undefined" && objs.length > 0) {
// 			var hasChecked = false;
// 			for (var i = 0; i < objs.length; i++) {
// 				if (objs[i].checked) {
// 					var qtys = document.getElementsByName('qtys[]');
// 					if(typeof(qtys) != "undefined" && qtys.length > 0) {
// 						for (var i = 0; i < qtys.length; i++) {
// 							alert(objs[i]);
// 						}
// 					}
// 					hasChecked = true;
// 					break;
// 				}
// 			}
// 			if(!hasChecked) {
// 				alert('Please select equipment.');
// 				return false;
// 			}
// 		}
// 		return true;
// 	}

	function validateCourseName() {
		var courseName = $('#course_name');
		if(courseName.val() == '') {
			alert('Please enter your course name.');
			courseName.focus();
			return false;
		}
		return true;
	}
	function validateEventType() {
		var obj = $('#event_type');
		if(obj.val() == '') {
			alert('Please select event type.');
			obj.focus();
			return false;
		}
		return true;
	}
	function validateRoomType() {
		var obj = $('#room_type');
		if(obj.val() == '') {
			alert('Please select room type.');
			obj.focus();
			return false;
		}
		return true;
	}
	function validatePresentType() {
		var objs = document.getElementsByName('present_type[]');
		var hasChecked = false;
		for (var i = 0; i < objs.length; i++) {
			if (objs[i].checked) {
				hasChecked = true;
				break;
			}
		}
		if(!hasChecked) {
			alert('Please select present type.');
			return false;
		}
		return true;
	}
	
	
	
	function resetForm() {
		
		document.getElementById('request-type').value = '';
		$('#classroom-request-booking-form-area').html('');
		
	}
	
	function loadSpinner() {
		
		
		//alert(request_date);
		<?php
		
		$models = EquipmentType::model ()->findAll ();
		if (count ( $models ) > 0) {
			foreach ( $models as $model ) {
				
				
				echo '$total = $("#hTotal_' . $model->id . '").val();';
				echo '$remain = $("#hRemain_' . $model->id . '").val();';
				echo '$("#qtys_' . $model->id . '").spinner({min: 0, max: $remain, stop: function(event, ui) {$(this).change();}    });';
			}
		} else {
			echo "Not found equipment.";
		}
		
		?>

	}
	
	function qtyChange(element){
		var checkboxId = 'C' + element.id;
		if(parseInt(element.value) > 0) {
			document.getElementById(checkboxId).checked = true;
		} else {
			document.getElementById(checkboxId).checked = false;
		}
	}



	
	<?php
	if (isset ( $_SESSION ['request_room'] )) {
		$afterScript = "ajaxUpdateArea(\'" . Yii::app ()->createUrl ( "AjaxRequest/EquipmentInRoom/room" ) . "/\' + $(\'#room_id\').val(), \'equipment-area\');";
	} else {
		$afterScript = '';
	}
	?>
			
			function checkRequestBookingDate() {
				
				if($('#datepicker').val() != '' && $('#time-end').val() != '' && $('#time-start').val()  != '') {
					  
					var selectedDate = $('#datepicker').val() .split("-");
					var dt = new Date();
					var curTime = (parseInt(dt.getFullYear()+''+(dt.getMonth()+1)+''+dt.getDate()+''+dt.getHours() +''+ dt.getMinutes()));
					
					var timeEnd = $('#time-end option:selected').text();
					var arrEnd = timeEnd.split(".");
					var selectTimeEnd = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrEnd[0]+''+arrEnd[1]);
					
					var timeStart = $('#time-start option:selected').text();
					var arrStart = timeStart.split(".");
					var selectTimeStart = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrStart[0]+''+arrStart[1]);
				
					
					if( selectTimeStart >= curTime && (selectTimeEnd > selectTimeStart)  ){
						ajaxUpdateArea(
								'<?php echo Yii::app()->createUrl("AjaxRequest/AvailableClassroomBookingPeriod/RequestType")?>/'
										+ $('#request-type').val() 
										+ '/Date/'
										+ $('#datepicker').val()
										+ '/Start/'
									+ $('#time-start').val() + '/End/' + $('#time-end').val(),
									'available-request-room', '<?php echo $afterScript ?>' + 'checkRequestBookingSemesterDate(); ' + 'checkRequestBookingActivityDate();');
								
					}else{
						//ajaxUpdateArea('','available-request-room',null);
						alert('Must booking before start time 30 minutes.');
					}
				}
			}
			
			function checkRequestBookingSemesterDate() {
				if($('#request-type').val() == '1') {
					if($('#datepicker').val() != '' && $('#time-end').val() != '' && $('#time-start').val()  != '') {  
						var selectedDate = $('#datepicker').val() .split("-");
						var dt = new Date();
						var curTime = (parseInt(dt.getFullYear()+''+(dt.getMonth()+1)+''+dt.getDate()+''+dt.getHours() +''+ dt.getMinutes()));
						
						var timeEnd = $('#time-end option:selected').text();
						var arrEnd = timeEnd.split(".");
						var selectTimeEnd = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrEnd[0]+''+arrEnd[1]);
						
						var timeStart = $('#time-start option:selected').text();
						var arrStart = timeStart.split(".");
						var selectTimeStart = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrStart[0]+''+arrStart[1]);
					
						
						if( selectTimeStart >= curTime && (selectTimeEnd > selectTimeStart)  ){
						ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/AvailableClassroomBookingPeriod/RequestType")?>'
								 + '/' + $('#request-type').val()
								 + '/Date/'	+ $('#datepicker').val()
								 +'/Start/' + $('#time-start').val() 
								 + '/End/' + $('#time-end').val(), 'available-request-room', '<?php echo $afterScript ?>');
						}else{
							alert('Must booking before start time 30 minutes.');
						}
					}
				}
				if($('#request-type').val() == '2') {
					if($('#day-in-week').val() != '' && $('#semester').val() != '' && $('#time-end').val() != '' && $('#time-start').val()  != '') {  
						ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/AvailableClassroomBookingPeriod/RequestType")?>' + '/' + $('#request-type').val() + '/Day/' + $('#day-in-week').val() + '/Semester/'+ $('#semester').val() +'/Start/' + $('#time-start').val() + '/End/' + $('#time-end').val(), 'available-request-room', '<?php echo $afterScript ?>');
					}
				}
			}
			
			function checkRequestBookingActivityDate() {
				
				if($('#request-type').val() == '3') {
					
					if($('#datepicker').val() != '' && $('#time-end').val() != '' && $('#time-start').val()  != '') {
						var selectedDate = $('#datepicker').val() .split("-");
						var dt = new Date();
						var curTime = (parseInt(dt.getFullYear()+''+(dt.getMonth()+1)+''+dt.getDate()+''+dt.getHours() +''+ dt.getMinutes()));
						
						var timeEnd = $('#time-end option:selected').text();
						var arrEnd = timeEnd.split(".");
						var selectTimeEnd = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrEnd[0]+''+arrEnd[1]);
						
						var timeStart = $('#time-start option:selected').text();
						var arrStart = timeStart.split(".");
						var selectTimeStart = parseInt(selectedDate[2]+''+selectedDate[1]+''+selectedDate[0]+''+arrStart[0]+''+arrStart[1]);
					

						if( selectTimeStart >= curTime && (selectTimeEnd > selectTimeStart)  ){
							
							ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/AvailableClassroomBookingPeriod/RequestType/3/Date")?>/' + $('#datepicker').val() + '/Start/' + $('#time-start').val() + '/End/' + $('#time-end').val(), 'available-request-room', 'loadSpinner(); loadAjaxUpload();')

						}else{
							alert('Must booking before start time 30 minutes.');
						}
						
					}
				}
			}
						
</script>
	<?php
	$requestTypes = RequestBookingType::model ()->findAll ();
	$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'users-form',
			'htmlOptions' => array (
					'enctype' => 'multipart/form-data',
					'name' => 'form1'
			)
	)
	);

	?>
	<div style="color: darkred">
		<?php
		if (isset ( $_SESSION ['error'] )) {
			echo $_SESSION ['error'] . '<br />';
			unset ( $_SESSION ['error'] );
		}
		// echo $_SESSION['request_type'];
		?>
	</div>
	<div>
		<table class="simple-form">
			<tr>
				<td class="column-left" width="20%">Request Type</td>
				<td class="column-right"><select name="request-type"
					id="request-type"
					onchange="ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/ClassroomRequestBooking/RequestType")?>/' + this.value, 'classroom-request-booking-form-area', 'loadDatePicker(\'datepicker\'); checkRequestBookingDate()')">
						<option value="">-- Select --</option>
						<?php

						foreach ( $requestTypes as $requestType ) {
							if (UserLoginUtil::areUserRole ( array (
									UserRoles::ADMIN,
									UserRoles::STAFF_AV,
									UserRoles::LECTURER,
									UserRoles::STAFF
							) )) {
								?>
						<option value="<?php echo $requestType->id?>"
						<?php echo $_SESSION['request_type'] == $requestType->id ? 'selected="selected"' : '' ?>>
							<?php echo $requestType->name?>
						</option>
						<?php
							} else {
								if ($requestType->id == 3) {
									?>
						<option value="<?php echo $requestType->id?>"
						<?php echo $_SESSION['request_type'] == $requestType->id ? 'selected="selected"' : '' ?>>
							<?php echo $requestType->name?>
						</option>
						<?php
								}
							}
						}
						?>
				</select></td>
			</tr>
		</table>
	</div>
	<div id="classroom-request-booking-form-area"></div>
	<?php $this->endWidget(); ?>
</div>
<?php

if ($_SESSION ['request_type'] != '') {
	?>
<script type="text/javascript">
	ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/ClassroomRequestBooking/RequestType")?>/' + $('#request-type').val() + '&tmp=<?php echo time()?>', 'classroom-request-booking-form-area', 'loadDatePicker(\'datepicker\'); checkRequestBookingDate()')
</script>
<?php
unset ( $_SESSION ['request_type'] );
}
?>
