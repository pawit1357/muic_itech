
<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/css/jquery.fancybox.css">
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript">
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.fancybox.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.fancybox.pack.js"></script>
</script>
<script type="text/javascript">
$(document).ready(function() {

	loadDatePicker('date_filter');
	var yyy = '<?php echo isset($_GET['date_filter']) ? $_GET['date_filter'] : '-1' ?>';	
// 	if(yyy == '-1') {
// 		var dt = new Date();
// 		$('#date_filter').val(dt.getDate()+'-'+(dt.getMonth()+1)+'-'+dt.getFullYear());
// 	}else{
// 		$('#date_filter').val(yyy);
// 	}
	
	/* This is basic - uses default settings */
	
	$("a#single_image").fancybox();
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */
	
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	
});
function filter(){
	var data = '';
	
	if($('#date_filter').val() != '' ) {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'date_filter='+$('#date_filter').val();
		date_filter = $('#date_filter').val();
	} else {
		if(data != ''){
			data = data + '&';
		}
		data = data + 'date_filter=';
	}
	$('#frm1').submit();	
}	
</script>
<div class="module-head">Equipment</div>
<form id="frm1" action="" method="get">
	<div>
		<br>
		<div class="search-box">
			<?php
			$form = $this->beginWidget ( 'CActiveForm', array (
					'id' => 'equipment-form',
					'method' => 'get',
					'action' => '',
					'enableAjaxValidation' => false 
			) );
			?>
			Recieve Date:<input type="text" name="date_filter" id="date_filter"
				onchange="filter();"> Name:<input type="text" name="search_text"
				value="<?php echo $_GET['search_text']?>" onchange="filter();">
			<?php $this->endWidget(); ?>
		</div>
		<br> <br>
	</div>
</form>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="5%">ID</th>
				<th width="50%">Name</th>
				<th width="50%">Remain/Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (! $_GET ['date_filter'] == "") {
				$counter = 1;
				$dataProvider = $data->search ();
				foreach ( $dataProvider->data as $data ) {
					?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
				<td class="left"><?php echo $data->id?></td>
				<td class="left"><?php echo $data->name?></td>
				<td class="left"><?php
					$use = CommonUtil::getEdtechEquipRemain ( $data->id, $_GET ['date_filter'] );
					$total = CommonUtil::getEdtechEquipTotal ( $data->id );
					echo ($total - $use) . "/" . $total?></td>
			</tr>
			<?php
				}
			}else {
				
// 				echo "NULL!!";
			}
			?>
		</tbody>
	</table>
	<div class="paging">
		<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
	</div>
</div>






