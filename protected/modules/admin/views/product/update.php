<?php
$this->breadcrumbs = array(
	'Products'=>array('index'),
	$model->Title=>array('view', 'id'=>$model->id),
	'Update',
);

$this->menu = array(
	array('label'=>'Журнал Товаров', 'url'=>array('index')),
	array('label'=>'Создать Товар', 'url'=>array('create')),
	array('label'=>'Просмотр Товара', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить Товар <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>