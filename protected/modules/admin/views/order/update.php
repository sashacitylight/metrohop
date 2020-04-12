<?php
$this->breadcrumbs = array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
	array('label'=>'Журнал Заказов', 'url'=>array('index')),
	array('label'=>'Создать Заказ', 'url'=>array('create')),
	array('label'=>'Просмотр Заказа', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить Заказ <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>