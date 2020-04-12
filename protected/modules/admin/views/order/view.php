<?php
$this->breadcrumbs = array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu = array(
	array('label'=>'Журнал Заказов', 'url'=>array('index')),
	array('label'=>'Создать Заказ', 'url'=>array('create')),
	array('label'=>'Изменить Заказ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Заказ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Просмотр Заказа #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',

        'userID'=>array(
            'visible'=>$model->userID == 0 ? false : true,   ////ЕСЛИ ПУСТАЯ ЯЧЕЙКА
            'name'=>'userID',
            'value' => $model->userID
        ),
		'username',

        'created'=>array(
            'name'=>'created',
            'value'=>$model->created == 0? false: Yii::app()->dateFormatter->format('HH:ss, dd MMM yyyy',$model->created) ,
        ),

		'email',
        'productID',
        array(
            'label'=>'productID',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->product->Title),
                    array('/ProductDescription/ProductDetailedDescription','id'=>$model->product->id))
        ),
        array(
            'label'=>'Картинка',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl.$model->product->ProductArtUrl,'',array('width'=>'130px')),

        ),
        'number',
		'telefone',
		'adress',

        'price'=>array(
            'name'=>'Итоговая цена',
            'value' => $model->product->Price*$model->number.'($)',
        ),

        array(
            'visible'=>$model->Property == null ? false : true,
            'name'=>'Property',
            'value' => isset($model->Property->feature1)?$model->Property->feature1:"",
        ),

        array(
            'visible'=>$model->Property == null ? false : true,
            'name'=>'Property',
            'value' => isset($model->Property->feature2)?$model->Property->feature2:"",
        ),
	),
)); ?>
