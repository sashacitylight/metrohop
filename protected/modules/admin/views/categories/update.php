<?php
$this->breadcrumbs = array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
	array('label'=>'Журнал Категорий', 'url'=>array('index')),
	array('label'=>'Создать Категорию', 'url'=>array('create')),
	array('label'=>'Просмотр Категории', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить Категорию <?=$model->name;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>