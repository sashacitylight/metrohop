<?php
$this->breadcrumbs = array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu = array(
    array('label'=>'Журнал Комментариев', 'url'=>array('index')),
    array('label'=>'Создать Комментарий', 'url'=>array('create')),
	array('label'=>'Изменить Комментарий', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Комментарий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр комментария #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
		'cProductID',
        array(
            'label'=>'cProductID',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->Product->Title),
                    array('/ProductDescription/ProductDetailedDescription', 'id'=>$model->cProductID))
        ),
		'cName',
		'created',
		'cReiting',
		'cText',
	),
)); ?>
