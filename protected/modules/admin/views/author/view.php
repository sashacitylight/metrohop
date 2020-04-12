<?php
$this->breadcrumbs = array(
	'Authors'=>array('index'),

	$model->Name,
);

$this->menu = array(
	array('label'=>'Журнал Авторов', 'url'=>array('index')),
	array('label'=>'Создать Автора', 'url'=>array('create')),
	array('label'=>'Изменить Автора', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Автора', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Просмотр автора #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
		'Name',
		'bio',
		'AuthorArtUrl',
        array(
            'label'=>'Картинка',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl.$model->AuthorArtUrl, '', array('width'=>'130px')),
        ),
	),
)); ?>
