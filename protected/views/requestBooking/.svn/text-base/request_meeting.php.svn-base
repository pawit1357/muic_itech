<div class="module-head">
	<span>Request</span>
</div>
<div>
	<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
			'enableAjaxValidation' => true
	));
	?>
	<div class="request-tab">
		<div class="classroom "><a href="<?php echo Yii::app()->createUrl('RequestBooking/Request')?>">Classroom</a></div>
		<div class="act current"><a href="<?php echo Yii::app()->createUrl('RequestBooking/RequestMeeting')?>">Meeting &amp; Activity</a></div>
	</div>
	<table class="simple-form">
		<tr>
			<td class="column-left" width="15%" valign="top">Equipment</td>
			<td class="column-right"><input type="checkbox" name="">LCD<br> <input
				type="checkbox" name="">Micropone<br> <input type="checkbox" name="">Slide<br>
				<input type="checkbox" name="">Tape<br> <input type="checkbox"
				name="">Video<br> <input type="checkbox" name="">Visualizer<br> <input
				type="checkbox" name="">Computer<br>
			</td>
		</tr>
		<tr>
			<td class="column-left">Date</td>
			<td class="column-right"><input>
			</td>
		</tr>
		<tr>
			<td class="column-left">Time Period</td>
			<td class="column-right"><select>
					<option value="">--Start Time--</option>
					<option value="2">08.00</option>
			</select><select>
					<option value="">--End Time--</option>
					<option value="2">09.30</option>
			</select></td>
		</tr>
		<tr>
			<td class="column-left">Class Room</td>
			<td class="column-right"><select>
					<option value="">--Room--</option>
					<option value="2">2100</option>
			</select>
			</td>
		</tr>
		<tr>
			<td class="column-left">Course</td>
			<td class="column-right"><input>
			</td>
		</tr>
		<tr>
			<td class="column-left"></td>
			<td class="column-right"><input type="submit" value="Submit" /></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>




