<div class="head">Ed Tech News</div>
<div id="news">
	<?php foreach($model as $news) {?>
	<div class="news-detail">
		<div class="pic">
			<img src="<?php echo Yii::app()->request->baseUrl.'/'.$news->pic ?>"
				width="40%" height="40%" />
		</div>
		<div class="detail">
			<div class="news-head">
			<a href="<?php echo Yii::app()->createUrl('Site/News/id/'.$news->id)?>"><?php echo $news->name?></a>
			<img src="<?php echo Yii::app()->request->baseUrl.'/images/icons_new.gif' ?>" />
			</div>
			<?php echo $news->short_description?>
		</div>
		<div class="clear"></div>
	</div>
	<?php }?>
	<div class="clear"></div>
	<div style="margin-top: 20px; text-align: right;"><a href="<?php echo Yii::app()->createUrl('Site/AllNews/')?>">>> All News <<</a></div>
</div>
