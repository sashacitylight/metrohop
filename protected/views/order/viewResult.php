<?php
$this->breadcrumbs = array(
    'Orders'=>array('index'),
    $model->id,
);

$this->menu=array(
    array('label'=>'Список Order', 'url'=>array('index')),
    array('label'=>'Создать Order', 'url'=>array('create')),
    array('label'=>'Изменить Order', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'id'=>$model->id), 'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Журнал Order', 'url'=>array('admin_old')),
);
?>

<div style="text-align: center"><h1>Поздравляем! Заказ успешно оформлен! В течении 2 часов с вами свяжутся! Номер заказа #<?php echo $model->id; ?></h1></div>

<!--результат заказа товара -->
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array('class'=>'resultOrderTable'),
    'attributes'=>array(

        'id',
        'username',
        'created'=>array(
            'name'=>'created',
            'value'=>Yii::app()->dateFormatter->format('HH:ss, dd MMM yyyy', $model->created) ,
        ),
        'email',
        'telefone',
        'pict'=>array(
            'name'=>'picture',
            'value'=> CHtml::image(Yii::app()->request->baseUrl.$model->product->ProductArtUrl),
            'type'=>'html',
        ),
        'adress',
        'productID',
        'product'=>array(
            'name'=>'Название товара',
            'value'=> CHtml::link($model->product->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id)),
        ),

        'product'=>array(
            'name'=>'Наименование товара',
            'type'=>'raw',
            'value'=>CHtml::link($model->product->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$model->productID)),

        ),

        'product_name'=>array(
            'name'=>'Цена товара',
            'value'=>$model->product->Price,
        ),
        'number',
        'product_price_all'=>array(
            'name'=>'Цена в итоге',
            'value'=>$model->product->Price * $model->number . ' $',
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

