<?php
$this->breadcrumbs = array(
	'Product Properties'=>array('index'),
	'Журнал',
);

$this->menu = array(

	array('label'=>'Создать Характеристику', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-properties-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Характеристик</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-properties-grid',
	'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(
		'id',
		'feature1',
		'feature2',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
