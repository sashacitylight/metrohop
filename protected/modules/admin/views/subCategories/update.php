<?php
$this->breadcrumbs = array(
	'Sub Categories'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label'=>'Журнал ПодКатегорий', 'url'=>array('index')),
    array('label'=>'Создать ПодКатегорию', 'url'=>array('create')),
    array('label'=>'Просмотр ПодКатегории', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить ПодКатегорию <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>