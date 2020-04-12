<?php
$this->breadcrumbs = array(
	'Firms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label'=>'Журнал Поставщиков', 'url'=>array('index')),
    array('label'=>'Создать Поставщика', 'url'=>array('create')),
	array('label'=>'Просмотр Поставщика', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить Поставщика<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>