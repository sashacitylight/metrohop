<?php
$this->breadcrumbs = array(
	'Product Properties Lists'=>array('index'),
	$model->id,
);

$this->breadcrumbs = array(
    'Pictures'=>array('index'),
    'Создать',
);
if(isset($this->breadcrumbs)):
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>array(
            'Просмотр #'.$model->ProductID.$model->Product->Title=>array('/ProductDescription/ProductDetailedDescription','id'=>$model->ProductID),
        ),
        'homeLink'=>false,
        'separator'=>' -> ',
        'htmlOptions'=>array('class'=>'productCBreadcrumbs')
    ));
endif;

$this->menu=array(
    array('label'=>'Журнал Списка Характеристик', 'url'=>array('index')),
    array('label'=>'К товару в админке', 'url'=>array('product/view', 'id'=>$model->ProductID)),
    array('label'=>'К товару на сайте', 'url'=>array('/ProductDescription/ProductDetailedDescription', 'id'=>$model->ProductID)),

);
?>

<h1>Просмотр Списка Характеристик #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
		'ProductID',
		'propertiesID',
		'number',
	),
)); ?>
