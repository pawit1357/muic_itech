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

<div class="module-head">Equipment</div>

<div>
	<br>
	<?php 
	if(UserLoginUtil::hasPermission(array("FULL_ADMIN", "CREATE_USER"))){
		echo CHtml::link('Create New',array('equipment/create'), array('class'=>'add'));
	}
	?>

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'equipment-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
	<br> <br>
</div>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<!--<th width="15%">Code</th> -->
				<th width="45%">name</th>
				<th width="10%">ip_address</th>
				<th width="10%">Type</th>
				<th width="20%">Room</th>
				<th width="20%">Barcode</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->search();
			foreach ($dataProvider->data as $data) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
				<!-- <td class="center"><?php //echo $data->equipment_code?></td> -->
				<td class="left"><?php echo $data->name?></td>
				<td class="center"><?php echo $data->ip_address?></td>
				<td class="center"><?php echo $data->equipment_type->name?></td>
				<td class="left"><?php echo $data->room->name?></td>
					<td class="left"><?php echo $data->barcode?></td>
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('Equipment/view/id/'.$data->id)?>"></a>
					<a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('Equipment/update/id/'.$data->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('Equipment/delete/id/'.$data->id)?>"></a>
				</td>
			</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>
<?php 
$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true,
			'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
	?>
<!-- 
<table>
	<tr>
		<td class="column-left">File</td>
		<td class="column-right"><span> <input id="fileupload" type="file"
				name="files[]">
		</span> <br> <br> 
			<div id="progress" class="progress progress-success progress-striped">
				<div class="bar"></div>
			</div> 
			<div id="files"></div> <input type="hidden" id="f_path"
			name="Equipment[file_path]" value="">
		</td>
		<td><input type="submit" value="Import" /></td>
	</tr>
</table>
 -->
<?php $this->endWidget(); ?>






