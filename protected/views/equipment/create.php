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

function changeTypeOfEvent() {
//		$('#EquipmentTypeQty').val(0)
//		$('#equipment_type_span').html('');
	$('#equipment_group_span').html('');
	ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/ChageEquipmentTypeListByType/id")?>/'
					+ $('#equipment_type_id').val(),	'equipment_group_span', null);

	
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
                $('#f_path').val('/files/' + time + '/' + file.name);
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

<div class="module-head">
	<span>Create New Equipment</span>
</div>
<div>
	<?php
	$equipmentTypes = EquipmentType::model ()->findAll ();
	$rooms = Room::model ()->findAll ();
	$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'users-form',
			'enableAjaxValidation' => true,
			'htmlOptions' => array (
					'enctype' => 'multipart/form-data' 
			) 
	) );
	?>
	<table class="simple-form">
		
		<tr>
			<td class="column-left">Type</td>
			<td class="column-right"><select id="equipment_type_id"  onchange="changeTypeOfEvent()" name="Equipment[equipment_type_id]">
					<option value="">--Select--</option>
					<?php foreach ($equipmentTypes as $equipmentType) {?>
					<option value="<?php echo $equipmentType->id?>">
						<?php echo $equipmentType->name?>
					</option>
					<?php }?>
			</select></td>
		</tr>
		<tr>
			<td class="column-left">Equipment Group:</td>
			<td class="column-right">
			<span id="equipment_group_span"><select
					name="Equipment[equipment_type_list_id]" id="equipment_type_list_id">
						<option value="">-Select-</option>
				</select><span><font color="red">*</font> </span> </span></td>
		</tr>
		<tr>
			<td class="column-left">Room</td>
			<td class="column-right"><select name="Equipment[room_id]">
					<option value="">--Select--</option>
					<?php foreach ($rooms as $room) {?>
					<option value="<?php echo $room->id?>">
						<?php echo $room->name?>
					</option>
					<?php }?>
			</select></td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'name', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Equipment::model(), 'description', array()); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">IP Address</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'ip_address', array('size' => 20, 'maxlength' => 255)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Mac Address</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'mac_address', array('size' => 20, 'maxlength' => 255)); ?>
				<span>format XX:XX:XX:XX:XX:XX</span></td>
		</tr>
		<tr>
			<td class="column-left">Client User</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'client_user', array('size' => 20, 'maxlength' => 255)); ?>
				<!-- 			<span>format XX:XX:XX:XX:XX:XX</span> --></td>
		</tr>
		<tr>
			<td class="column-left">Client Password</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'client_pass', array('size' => 20, 'maxlength' => 255)); ?>
				<!-- 			<span>format XX:XX:XX:XX:XX:XX</span> --></td>
		</tr>
		<tr>
			<td class="column-left">Barcode</td>
			<td class="column-right"><?php echo $form->textField(Equipment::model(), 'barcode', array('size' => 40, 'maxlength' => 255)); ?>
				<!-- 			<span>format XX:XX:XX:XX:XX:XX</span> --></td>
		</tr>
		<tr>
			<td class="column-left">Image</td>
			<td class="column-right"><span> <input id="fileupload" type="file"
					name="files[]">
			</span> <br> <br> <!-- The global progress bar -->
				<div id="progress"
					class="progress progress-success progress-striped">
					<div class="bar"></div>
				</div> <!-- The container for the uploaded files -->
				<div id="files"></div> <input type="hidden" id="f_path"
				name="Equipment[img_path]" value=""></td>
		</tr>
		<tr>
			<td class="column-left">Status</td>
			<td class="column-right"><select name="Equipment[status]">
					<option value="">-Select-</option>
					<option value="A">Normal</option>
					<option value="D">Cracked</option>
					<option value="I">Delete</option>
			</select></td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /> <?php echo CHtml::link('Cancel',array('Equipment/'), array('class' => 'button_cancel'))?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




