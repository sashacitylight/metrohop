<?php
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

<h1>Изменить Список Характеристик <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>