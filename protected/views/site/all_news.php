<div class="head">Ed Tech News</div>
<div id="news">
	<?php foreach($model as $news) {?>
	<div class="news-detail">
		<div class="pic">
			<img src="<?php echo Yii::app()->request->baseUrl.'/'.$news->pic ?>"
				width="60%" height="60%" />
		</div>
		<div class="detail">
			<div class="news-head"><a href="<?php echo Yii::app()->createUrl('Site/News/id/'.$news->id)?>"><?php echo $news->name?></a>
			</div>
			<?php echo $news->short_description?>
		</div>
		<div class="clear"></div>
	</div>
	<?php }?>
	<div class="clear"></div>
</div>
<div class="clear"></div>