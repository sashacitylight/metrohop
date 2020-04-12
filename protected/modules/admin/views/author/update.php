<?php
$this->breadcrumbs = array(
	'Authors'=>array('index'),
	$model->Name=>array('view', 'id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label'=>'Журнал Авторов', 'url'=>array('index')),
    array('label'=>'Создать Автора', 'url'=>array('create')),
	array('label'=>'Просмотр Автора', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить Автора <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>