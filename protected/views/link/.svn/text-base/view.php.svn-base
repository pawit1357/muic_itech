<div class="module-head">R2R</div>
<table class="simple-form">
	<tr>
		<td class="column-left" width="15%">Name</td>
		<td class="column-right"><?php echo $model->name ?>
		</td>
	</tr>
	<tr>
		<td class="column-left">Description</td>
		<td class="column-right"><?php echo $model->description ?></td>
	</tr>
	<tr>
		<td class="column-left">File</td>
		<td class="column-right"><?php if(isset($model->url)) {?>
						<a href="<?php echo Yii::app()->request->baseUrl.'/'.$model->url?>">Download</a>
					<?php } else { echo '-';}?>
		</td>
	</tr>
	<tr>
		<td class="column-left"></td>
		<td class="column-right"><?php 
		echo CHtml::link('Back',array('Link/')).' | '; echo
		CHtml::link('Edit',array('Link/update','id'=>$model->id)); ?>
		</td>
	</tr>
</table>

