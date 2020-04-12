<?php
$this->breadcrumbs = array(
	'Pictures'=>array('index'),
	$model->id,
);

$this->menu = array(
	array('label'=>'Журнал Галереи', 'url'=>array('index')),
	array('label'=>'Изменить Картинку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Картинку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр Картинки #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
	'attributes'=>array(
		'id',
		'picProductID',
		'picUrl',
        array(
            'label'=>'Картинка',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl.$model->picUrl, '', array('width'=>'130px')),

        ),
	),
)); ?>
