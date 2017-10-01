<h2>Test Page</h2>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model' => $model,
)); 
?>
</div><!-- search-form -->

<div style="width:500px">
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'my-model-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
		array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),
	'ajaxUpdate' => true, 
));
?>
</div>

</form>
