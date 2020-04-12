<?php
$this->breadcrumbs = array(
	'Product Properties Lists'=>array('index'),
	'Журнал',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-properties-list-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Списка Характеристик</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-properties-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(
		'id',
		'ProductID',
		'propertiesID',
		'number',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
