<?php
$this->breadcrumbs = array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
	array('label'=>'Журнал Пользователей', 'url'=>array('index')),
	array('label'=>'Просмотр Пользователя', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить пароль', 'url'=>array('password', 'id'=>$model->id)),
);
?>

<h1>Изменить Пользователя <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>