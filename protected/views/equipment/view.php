<div class="module-head">Equipment</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Code</td>
		<td class="column-right"><?php echo $model->id ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Type</td>
		<td class="column-right"><?php echo $model->equipment_type->name ?></td>
	</tr>
		<tr>
		<td class="column-left">Room</td>
		<td class="column-right"><?php echo $model->room->name ?></td>
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
		<td class="column-left">IP Address</td>
		<td class="column-right"><?php echo $model->ip_address ?></td>
	</tr>
	<tr>
		<td class="column-left">MAC Address</td>
		<td class="column-right"><?php echo $model->mac_address ?></td>
	</tr>	
	<tr>
		<td class="column-left">Client User</td>
		<td class="column-right"><?php echo $model->client_user ?></td>
	</tr>	
	<tr>
		<td class="column-left">Client Password</td>
		<td class="column-right"><?php echo $model->client_pass ?></td>
	</tr>			
	<tr>
		<td class="column-left">Status</td>
		<td class="column-right"><?php echo $model->status == 'A' ? 'Normal' : 'Cracked' ?></td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('equipment/')).' | '; echo
		CHtml::link('Edit',array('equipment/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

