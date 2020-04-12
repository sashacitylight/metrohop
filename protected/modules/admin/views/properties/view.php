<?php
$this->breadcrumbs = array(
	'Product Properties'=>array('index'),
	$model->id,
);

$this->menu = array(
    array('label'=>'Журнал Характеристик', 'url'=>array('index')),
    array('label'=>'Создать Характеристику', 'url'=>array('create')),
	array('label'=>'Изменить Характеристику', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Характеристику', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Просмотр Характеристики #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
		'feature1',
		'feature2',
	),
)); ?>
