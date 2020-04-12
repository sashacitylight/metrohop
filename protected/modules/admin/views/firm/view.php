<?php
$this->breadcrumbs = array(
	'Firms'=>array('index'),
	$model->id,
);

$this->menu = array(
    array('label'=>'Журнал Поставщиков', 'url'=>array('index')),
	array('label'=>'Создать Поставщика', 'url'=>array('create')),
	array('label'=>'Изменить Поставщика', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Поставщика', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр Поставщика #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
		'firmName',
		'firmState',
		'firmFio',
		'firmTime',
		'firmPrice',
		'firmService',
		'firmInfo',
	),
)); ?>
