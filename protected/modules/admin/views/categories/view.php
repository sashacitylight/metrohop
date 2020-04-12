<?php
$this->breadcrumbs = array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu = array(
	array('label'=>'Журнал Категорий', 'url'=>array('index')),
	array('label'=>'Создать Категорию', 'url'=>array('create')),
	array('label'=>'Изменить Категорию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Категорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр категорий #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions'=>array('class'=>'ViewTable'),
    'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
