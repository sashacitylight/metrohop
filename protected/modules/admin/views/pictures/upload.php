<?php
$this->breadcrumbs = array(
	'Pictures'=>array('index'),
	'Создать',
);
if(isset($this->breadcrumbs)):
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>array(
            'Просмотр #'.$model->picProductID.$model->Product->Title=>array('/ProductDescription/ProductDetailedDescription','id'=>$model->picProductID),
        ),
        'homeLink'=>false,
        'separator'=>' -> ',
        'htmlOptions'=>array('class'=>'productCBreadcrumbs')
    ));
endif;

$this->menu=array(
	array('label'=>'Журнал Галереи', 'url'=>array('index')),
	array('label'=>'К товару в админке', 'url'=>array('product/view','id'=>$model->picProductID)),
    array('label'=>'К товару на сайте', 'url'=>array('/ProductDescription/ProductDetailedDescription','id'=>$model->picProductID)),

);


$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'pictures-grid',
    'selectableRows'=>2,
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(

        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('width'=>'10px'),
        ),
        array(
            'class'=>'CCheckBoxColumn',
            'id'=>'userID'
        ),
        'picProductID'=>array(
            'name'=>'picProductID',
            'value'=>'$data->picProductID',
            'htmlOptions'=>array('width'=>'10px'),
        ),

        'picUrl'=>array(
            'name'=>'picUrl',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl . $data->picUrl,
                 "",
                array(\'width\'=>50, \'height\'=>50))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'25px'),
        ),
        'picUrl',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));
if(isset($this->breadcrumbs)):
$this->widget('zii.widgets.CBreadcrumbs', array(
'links'=>array(
'Просмотр #'.$model->picProductID.$model->Product->Title=>array('/ProductDescription/ProductDetailedDescription', 'id'=>$model->picProductID),
),
'homeLink'=>false,
'separator'=>' -> ',
'htmlOptions'=>array('class'=>'productCBreadcrumbs')
));
endif;
?>


<h1>Загрузить Картинку</h1>

<?php
$this->renderPartial('_form', array('model'=>$model));
?>