<?php
$this->breadcrumbs = array(
	'Product Properties'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label'=>'Журнал Характеристик', 'url'=>array('index')),
    array('label'=>'Создать Характеристику', 'url'=>array('create')),
	array('label'=>'Просмотр Характеристики', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменение Характеристики <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>