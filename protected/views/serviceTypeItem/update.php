<div class="module-head">
	<span>Update Service Type Item</span>
</div>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<table class="simple-form">
		<tr>
			<td class="column-left">Service Type</td>
			<td class="column-right">
				<select name="RequestServiceTypeDetail[request_service_type_id]">
					<option value="">--Select--</option>
					<?php 
					$serviceTypes = RequestServiceType::model()->findAll();
					foreach($serviceTypes as $serviceType){
						echo '<option value="'.$serviceType->id.'" '.($model->request_service_type->id == $serviceType->id ? 'selected="selected"' : '').'>'.$serviceType->name.'</option>';
					}
					?>
				</select>
			
			</td>
		</tr>
		<tr>
			<td class="column-left">Name</td>
			<td class="column-right"><?php echo $form->textField(RequestServiceTypeDetail::model(), 'name', array('size' => 20, 'maxlength' => 255, 'value'=>$model->name)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left">Description</td>
			<td class="column-right"><?php echo $form->textArea(RequestServiceTypeDetail::model(), 'description', array('value'=>$model->description)); ?>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /><?php echo CHtml::link('Cancel',array('ServiceTypeItem/'), array('class' => 'button_cancel'))?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




