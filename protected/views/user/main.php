<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>

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

<div class="module-head">User</div>
<div>
	<br>
	<?php
	if (UserLoginUtil::hasPermission ( array (
			"FULL_ADMIN",
			"CREATE_USER" 
	) )) {
		echo CHtml::link ( 'Create New', array (
				'user/create' 
		), array (
				'class' => 'add' 
		) );
	}
	?>



	<div class="search-box">
	<?php
	$form = $this->beginWidget ( 'CActiveForm', array (
				'id' => 'frm1',
				'method' => 'get',
				'action' => '',
				'enableAjaxValidation' => false
		) );
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Role</th>
				<th width="15%">Username</th>
				<th width="15%">Under</th>
				<!-- <th width="15%">Title</th> -->
				<th width="15%">FirstName</th>
				<!-- 				<th width="15%">LastName</th> -->
				<!--<th width="15%">Email</th>-->

				<th width="15%">Status</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			$dataProvider = $data->search ();
			
			foreach ( $dataProvider->data as $data ) {
				?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="left"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
								<td class="left"><?php echo $data->role->name?></td>
				<td class="left"><?php echo $data->username?></td>
				<td class="left"><?php echo ($data->parent == -1)? "":UserLoginUtil::getUserById($data->parent)->username?>
				</td>
				<td class="left"><?php echo $data->user_information->first_name?>
				</td>
				<!--<<td class="center"><?php echo $data->user_information->last_name?></td>-->
				<!--<td class="center"><?php// echo $data->user_information_email_search?></td>-->
				<td class="center"><?php echo $data->user_status->name?></td>
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('User/view/id/'.$data->id)?>"></a>
					<a title="Edit" class="ico-s-edit"
					href="<?php echo Yii::app()->CreateUrl('User/update/id/'.$data->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('User/delete/id/'.$data->id)?>"></a>
					<?php 
					if($data->role->name == "StudentFAA"){
					?>
					
<a title="Reset Password"
					onclick="return confirm('Are you sure to Reset Password?')"
					class="ico-s-password"
					href="<?php echo Yii::app()->CreateUrl('User/ResetPassword/id/'.$data->id)?>"></a>
					<?php }?>
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
$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'users-form',
		'enableAjaxValidation' => true,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data' 
		) 
) );
?>
<table>
	<tr>
		<td class="column-left">File</td>
		<td class="column-right"><span> <input id="fileupload" type="file"
				name="files[]">
		</span> <br> <br> <!-- The global progress bar -->
			<div id="progress" class="progress progress-success progress-striped">
				<div class="bar"></div>
			</div> <!-- The container for the uploaded files -->
			<div id="files"></div> <input type="hidden" id="f_path"
			name="User[file_path]" value=""></td>
		<td><input type="submit" value="Import" /></td>
	</tr>
</table>
<?php $this->endWidget(); ?>

<?php
/*
 * $this->widget('zii.widgets.grid.CGridView', array(
 * 'id' => 'my-model-grid',
 * 'dataProvider' => $data->search(),
 * 'ajaxUpdate'=>true,
 * 'columns' => array(
 * array(
 * 'header'=>'#',
 * 'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1', // row is zero based
 * 'htmlOptions'=>array('width'=>'5%', 'align'=>'center'),
 * ),
 * array(
 * 'name'=>'username',
 * 'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
 * ),
 * array(
 * 'header' => 'Title',
 * 'name'=>'user_information_personal_title_search',
 * 'value'=>'$data->user_information->personal_title',
 * 'htmlOptions'=>array('width'=>'10%'),
 * ),
 * array(
 * 'header' => 'First Name',
 * 'name'=>'user_information_first_name_search',
 * 'value'=>'$data->user_information->first_name',
 * 'htmlOptions'=>array('width'=>'15%'),
 * ),
 * array(
 * 'header' => 'Last Name',
 * 'name'=>'user_information_last_name_search',
 * 'value'=>'$data->user_information->last_name',
 * 'htmlOptions'=>array('width'=>'15%'),
 * ),
 * array(
 * 'header' => 'Email',
 * 'name'=>'user_information_email_search',
 * 'value'=>'$data->email',
 * ),
 * array(
 * 'header' => 'Role',
 * 'name'=>'role_name_search',
 * 'value'=>'$data->role->name',
 * 'htmlOptions'=>array('width'=>'8%', 'align'=>'center'),
 * ),
 * array(
 * 'header' => 'Status',
 * 'name'=>'status_name_search',
 * 'value'=>'$data->user_status->name',
 * 'htmlOptions'=>array('width'=>'8%', 'align'=>'center'),
 * ),
 * array( // display a column with "view", "update" and "delete" buttons
 * 'class'=>'CButtonColumn',
 * 'template'=>'{view} {update} {delete}',
 * 'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
 * 'buttons'=>array
 * (
 * 'view' => array
 * (
 * 'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_USER"))',
 * ),
 * 'update' => array
 * (
 * 'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "UPDATE_USER"))',
 * ),
 * 'delete' => array
 * (
 * 'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_USER"))',
 * ),
 * ),
 * ),
 * ),
 * ));
 */
?>
