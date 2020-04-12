<?php
$this->breadcrumbs = array(
	'Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label'=>'Журнал Комментариев', 'url'=>array('index')),
    array('label'=>'Создать Комментарий', 'url'=>array('create')),
	array('label'=>'Просмотр Комментария', 'url'=>array('view', 'id'=>$model->id)),

);
?>

<h1>Изменить комментарий <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>