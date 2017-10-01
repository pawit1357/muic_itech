<link
	rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/css/jquery.fancybox.css">
	
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.fancybox.pack.js"></script>
</script>
<script type="text/javascript">
$(document).ready(function() {

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
</script>
<div class="module-head">Equipment</div>

<div>
	<br>
	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'equipment-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
	<br> <br>
</div>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="5%">Barcode</th>
				<th width="50%">name</th>
				<th width="10%">Type</th>
				<th width="20%">Room</th>
				<th width="10%">Preview</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$counter = 1;
			$dataProvider = $data->search();
			foreach ($dataProvider->data as $data) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
				<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?>
				</td>
								<td class="left"><?php echo $data->barcode?></td>
				<td class="left"><?php echo $data->name?></td>
				<td class="left"><?php echo $data->equipment_type->name?></td>
				<td class="left"><?php echo $data->room->name?></td>
				
				<td class="center"><?php if($data->img_path!=''){?><a id="single_image" title="View" class="ico-s-view" href="<?php echo Yii::app()->request->baseUrl.'/upload'.$data->img_path?>"/><?php }?></td>

			
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






