<div class="module-head">
	<span>Update R2R</span>
</div>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/style.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/jquery.fileupload-ui.css">
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
<!--
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
//-->
</script>

<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%">Name</td>
			<td class="column-right"><?php echo $form->textField(Link::model(), 'name', array('size' => 20, 'maxlength' => 255, 'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(Link::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left" valign="top">File</td>
			<td class="column-right">
					<?php if(isset($model->url)) {?>
						<a href="<?php echo Yii::app()->request->baseUrl.'/'.$model->url?>">Download</a>
					<?php }?>
					<br>
					<br>
				<span>
        <input id="fileupload" type="file" name="files[]">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files"></div>
    <input type="hidden" id="f_path" name="Link[url]" value="">
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('Link/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




