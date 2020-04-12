<?php
$this->breadcrumbs = array(
	'Pictures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
	array('label'=>'Журнал Галереи', 'url'=>array('index')),
	array('label'=>'Просмотр Картинки', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить картинку <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>