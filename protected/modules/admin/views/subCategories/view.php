<?php
$this->breadcrumbs = array(
	'Sub Categories'=>array('index'),
	$model->Name,
);

$this->menu = array(
	array('label'=>'Список ПодКатегорий', 'url'=>array('index')),
	array('label'=>'Создать ПодКатегорию', 'url'=>array('create')),
	array('label'=>'Изменить ПодКатегорию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить ПодКатегорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Просмотр ПодКатегорий #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
	'attributes'=>array(
		'id',
		'Name',
		'Description',

        'catID'=>array(
             'name'=>'catID',
             'type'=>'raw',
             'value'=>CHtml::link($model->Category->name.'('.$model->Category->id.')', array('Categories/view', 'id'=>$model->Category->id)),
        ),
	),
)); ?>
