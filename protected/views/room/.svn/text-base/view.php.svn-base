<div class="module-head">Room</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Code</td>
		<td class="column-right"><?php echo $model->room_code ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Room Type</td>
		<td class="column-right"><?php echo $model->room_group->name ?></td>
	</tr>
		<tr>
		<td class="column-left">Name</td>
		<td class="column-right"><?php echo $model->name ?></td>
	</tr>
		<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<tr>
		<td class="column-left">Staffs</td>
		<td class="column-right">
	<?php 
	$rss = RoomStaff::model()->findAll(array('condition'=>"room_id='".$model->id."'"));
	if($rss != null && count($rss) > 0) {
		foreach($rss as $rs) {
			echo '<div>'.$rs->staff->username.'</div>';
		}
	} else {
		echo '-';
	}
	?>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('room/')).' | '; echo
		CHtml::link('Edit',array('room/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

