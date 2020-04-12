<?php
$this->breadcrumbs = array(
	'Comments'=>array('index'),
	'Журнал',
);

$this->menu = array(

    array('label'=>'Создать Комментарий', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#commentsGrid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Комментариев</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'commentsGrid',
	'dataProvider'=>$model->search(),


    'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(

        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions' => array('width'=>'10px'),
        ),

        'cProductID'=>array(
            'name'=>'cProductID',
            'value'=>'$data->cProductID',
            'htmlOptions' => array('width'=>'10px'),
        ),

        'order_number'=>array(
            'name'=>'Product',
            'value' => 'CHtml::link($data->Product->Title,array(\'/ProductDescription/ProductDetailedDescription\',\'id\'=>$data->Product->id))',
            'type'=>'html',
        ),

		'cName',
        'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y H:i",$data->created)',   ///ФОРМАТ ВЫВОДА даты. а при создании дата создаётся с помощью метода beforeSave
            'filter'=> false,
            'htmlOptions' => array('width'=>'10px'),
        ),
        'cReiting'=> array(
            'name' => 'cReiting',
            'type' => 'html',
            'value'=>'CProductProperties::getStars($data->cReiting)',
            'htmlOptions' => array('class' => 'ratingStars', 'width'=>'10px'),
            'filter'=>array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'),
        ),

		'cText',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
