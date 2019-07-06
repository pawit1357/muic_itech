<div class="module-head">
	<span>Request Service</span>
</div>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>

<link
	rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css">
<!-- Generic page styles -->
<link
	rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/style.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link
	rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/jquery.fileupload-ui.css">
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/vendor/jquery.ui.widget.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.iframe-transport.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.fileupload.js"></script>

<script type="text/javascript">
		$(function(){
				$('#users-form').submit(function(){
					return (validateForm() && confirm('คุณต้องการยืนยันที่จะสร้างหรือไม่ ?'));
					});
			});
			function validateForm() {			
				if(!validateServiceType()) return false;
				if(!validateServiceTypeDetail()) return false;
				if(!validateFile()) return false;
				if(!validateUnit()) return false;
				if(!validateDueDate()) return false;
				if(!validateTime()) return false;
				return true;
			}
			function validateServiceType() {
				var obj = $('#service_type');
				if(obj.val() == '') {
					alert('Please select service type.');
					obj.focus();
					return false;
				}
				return true;
			}
			function validateServiceTypeDetail() {
				var obj = $('#service_type_detail');
				if(obj.val() == '') {
					alert('Please select service type detail.');
					obj.focus();
					return false;
				}
				return true;
			}
// 			function validateFile() {
// 				var obj = $('#f_path');
// 				if(obj.val() == '') {
// 					alert('Please select file.');
// 					obj.focus();
// 					return false;
// 				}
// 				return true;
// 			}
			function validateUnit() {
				var obj = $('#unit');
				if(obj.val() == '') {
					alert('Please select unit.');
					obj.focus();
					return false;
				}
				return true;
			}
			function validateDueDate() {
				var obj = $('#date_picker_1');
				if(obj.val() == '') {
					alert('Please select due date.');
					obj.focus();
					return false;
				}
				return true;
			}
			function validateTime() {
				var obj = $('#request_time');
				if(obj.val() == '') {
					alert('Please select time.');
					obj.focus();
					return false;
				}
				return true;
			}
			

		
		$(function() {
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
		            alert('Upload Complete.');
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
		});
		</script>




<script type="text/javascript">
	$(function(){
		loadDatePicker('date_picker_1');
				});

	function changeServiceType() {
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/RequestServiceTypeDetail/id")?>/'
						+ $('#service_type').val(),	'type_detail', null);
	}
</script>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true,
			'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Service Type</td>
			<td class="column-right">
				<table>
					<tr>
						<td><select name="service_type" id="service_type"
							onchange="changeServiceType()">
								<option value="">-Type-</option>
								<?php 
								$serviceTypes = RequestServiceType::model()->findAll();
								foreach($serviceTypes as $serviceType) {
								?>
								<option value="<?php echo $serviceType->id?>"><?php echo $serviceType->name?></option>
								<?php
								}
								?>
						</select>
						</td>
						<td><span id="type_detail"></span>
						</td>
					</tr>
					<?php 
					// 					$serviceTypes = RequestServiceType::model()->findAll();
					// 					foreach($serviceTypes as $serviceType){
// 						echo '<tr><td><div><input type="checkbox" name="serviceTypes[]" value="'.$serviceType->id.'">'.$serviceType->name.'</div></td><td>';
// 						$serviceTypeDetails = RequestServiceTypeDetail::model()->findAll(array('condition'=>"request_service_type_id = '".$serviceType->id."'"));
// 						foreach($serviceTypeDetails as $serviceTypeDetail) {
// 							echo '<div style="float:left; width:120px"><input type="checkbox" name="serviceTypeDetails[]" value="'.$serviceTypeDetail->id.'">'.$serviceTypeDetail->name.'</div>';
// 						}

// 						echo '</td></tr>';
// 					}
					?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="column-left">Important Note</td>
			<td class="column-right"><textarea name="RequestService[description]"></textarea>
			</td>
		</tr>
		<tr>
			<td class="column-left">File</td>
			<td class="column-right"><span> <input id="fileupload" type="file"
					name="files[]">
			</span> <br> <br> <!-- The global progress bar -->
				<div id="progress"
					class="progress progress-success progress-striped">
					<div class="bar"></div>
				</div> <!-- The container for the uploaded files -->
				<div id="files"></div> <input type="hidden" id="f_path"
				name="RequestService[file_path]" value="">
			</td>
		</tr>
		<tr>
			<td class="column-left">Unit</td>
			<td class="column-right"><input type="text" id="unit"
				name="RequestService[quantity]">
			</td>
		</tr>
		<tr>
			<td class="column-left">Due Date</td>
			<td class="column-right"><input type="text"
				name="RequestService[due_date]" id="date_picker_1">
			</td>
		</tr>
		<tr>
			<td class="column-left">Time</td>
			<td class="column-right"><select id="request_time"
				name="RequestService[time_period]">
					<option value="">--Select--</option>
				<?php 
					$periods = Period::model()->findAll();
					foreach ($periods as $period){
					echo '<option value="'.$period->id.'">'.DateTimeUtil::getTimeFormat($period->start_hour, $period->start_min).'</option>';
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><input
				type="reset" value="Cancel" /></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




