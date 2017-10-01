<div class="module-head">Staff</div>
<div>

</div>

<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Username</th>
				<th width="15%">Title</th>
				<th width="15%">FirstName</th>
				<th width="15%">LastName</th>
				<th width="15%">Email</th>
				<th width="15%">Status</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			foreach ($data->search()->data as $data) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo $counter++?></td>
				<td class="center"><?php echo $data->username?></td>
				<td class="center"><?php echo $data->user_information->personal_title?></td>
				<td class="center"><?php echo $data->user_information->first_name?></td>
				<td class="center"><?php echo $data->user_information->last_name?></td>
				<td class="center"><?php echo $data->user_information_email_search?></td>
				<td class="center"><?php echo $data->user_status->name?></td>
				<td>
				<a title="Assign Rooms"" href="<?php echo Yii::app()->CreateUrl('User/AssignRoom/id/'.$data->id)?>">Assign Rooms</a>
				</td>
				
			</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
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
						'header' => 'Status',
						'name'=>'status_name_search',
						'value'=>'$data->user_status->name',
						'htmlOptions'=>array('width'=>'8%', 'align'=>'center'),
				),
				array(
						'class'=>'CButtonColumn',
						'header'=>'',
						'template'=>'{Assign Rooms}',
						'htmlOptions'=>array('width'=>'15%', 'align'=>'center'),
						'buttons'=>array
						(
								'Assign Rooms' => array
								(
										'visible'=>'UserLoginUtil::hasPermission(array("FULL_ADMIN"))',
										'url'=>'Yii::app()->createUrl("User/AssignRoom/id/".$data->id)',
								),
						),
				),
		),
));
*/
?>
