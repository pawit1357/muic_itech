<div class="module-head">User</div>
<div>
	&nbsp;

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'users-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text" value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Username</th>
				<th width="15%">Under</th>
				
				<!--<th width="15%">Title</th>
				<th width="15%">FirstName</th>
				<th width="15%">LastName</th>
				<th width="15%">Email</th>-->
				
				<th width="15%">Role</th>
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
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?></td>
				<td class="center"><?php echo $data->username?></td>
				<td class="center"><?php echo ($data->parent == -1)? "":UserLoginUtil::getUserById($data->parent)->username?></td>
				<!--<td class="center"><?php //echo $data->user_information->personal_title?></td>
				<td class="center"><?php //echo $data->user_information->first_name?></td>
				<td class="center"><?php //echo $data->user_information->last_name?></td>
				<td class="center"><?php //echo $data->user_information_email_search?></td>-->
				<td class="center"><?php echo $data->user_status->name?></td>
				<td class="center"><a title="View" class="ico-s-view"
					href="<?php echo Yii::app()->CreateUrl('ConfirmUser/view/id/'.$data->id)?>"></a>
					<a title="Delete"
					onclick="return confirm('Are you sure to delete?')"
					class="ico-s-delete"
					href="<?php echo Yii::app()->CreateUrl('ConfirmUser/delete/id/'.$data->id)?>"></a>
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
/*
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'my-model-grid',
		'dataProvider' => $data->search(),
		'ajaxUpdate'=>true,
		'columns' => array(
				array(
						'header'=>'#',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
						'htmlOptions'=>array('width'=>'5%', 'align'=>'center'),
				),
				array(
						'name'=>'username',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
				),
				array(
						'header' => 'Title',
						'name'=>'user_information_personal_title_search',
						'value'=>'$data->user_information->personal_title',
						'htmlOptions'=>array('width'=>'10%'),
				),
				array(
						'header' => 'First Name',
						'name'=>'user_information_first_name_search',
						'value'=>'$data->user_information->first_name',
						'htmlOptions'=>array('width'=>'15%'),
				),
				array(
						'header' => 'Last Name',
						'name'=>'user_information_last_name_search',
						'value'=>'$data->user_information->last_name',
						'htmlOptions'=>array('width'=>'15%'),
				),
				array(
						'header' => 'Email',
						'name'=>'user_information_email_search',
						'value'=>'$data->email',
				),
				array(
						'header' => 'Role',
						'name'=>'role_name_search',
						'value'=>'$data->role->name',
						'htmlOptions'=>array('width'=>'8%', 'align'=>'center'),
				),
				array(            // display a column with "view", "update" and "delete" buttons
						'class'=>'CButtonColumn',
						'template'=>'{view} {delete}',
						'htmlOptions'=>array('width'=>'10%', 'align'=>'center'),
						'buttons'=>array
						(
								'view' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "VIEW_USER"))',
								),
								'delete' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN", "DELETE_USER"))',
								),
						),
				),
		),
));
*/
?>
