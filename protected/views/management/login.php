<div class="module-head">User Login</div>
<div>
	<?php 
	// Start create form
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'users-form',
        'enableAjaxValidation' => false      )); ?>
	<table class="simple-form">
		<tr class="fail-message">
			<td class="column-left" width="15%"></td>
			<td class="column-right"><?php 
			if(isset($_SESSION['FAIL_MESSAGE'])){
				echo $_SESSION['FAIL_MESSAGE'];
				unset($_SESSION['FAIL_MESSAGE']);
			}
			?>
			</td>
		</tr>

		</table>
	<?php $this->endWidget(); ?>
</div>

