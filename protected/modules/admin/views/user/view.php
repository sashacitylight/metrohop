<?php
$this->breadcrumbs = array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu = array(
    array('label'=>'Журнал Пользователей', 'url'=>array('index')),
	array('label'=>'Создать Пользователя', 'url'=>array('create')),
	array('label'=>'Изменить Пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр Пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(

		'id',
		'username',
        'userCreated'=>array(
            'name'=>'userCreated',
            'value'=>date("j.m.Y H:i",$model->userCreated),
        ),
		'name',

		'telefon',
		'email',
		'password',
        'role'=>array(
            'name'=>'role',
            'value'=> ($model->role==1)?"User":"ADMIN",
        ),
        'ban'=>array(
            'name'=>'ban',
            'value'=> ($model->ban==1)?"Бан":"",
        ),
		'adress',

	),
)); ?>
