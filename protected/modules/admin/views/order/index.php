<?php
$this->breadcrumbs = array(
	'Orders'=>array('index'),
	'Журнал',
);

$this->menu = array(
	array('label'=>'Создать Заказ', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#orderGrid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Заказов</h1>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(

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
            'name'=>'userID',
            // 'value'=>'$data->product->Title',
            'value' => 'CHtml::link($data->userID,array(\'user/view\',\'id\'=>$data->userID))',
            'type'=>'html',
            'htmlOptions'=>array('width'=>'15px'),
        ),

        'username',

        array(
            'name'=>'product',
            'value' => 'CHtml::link($data->product->Title,array(\'product/view\',\'id\'=>$data->productID))',
            'type'=>'html',
        ),

        'productID'=>array(
            'name'=>'productID',
            'value'=>'$data->productID',
            'htmlOptions' => array('width'=>'10px'),
        ),


        'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y H:i",$data->created)',   ///ФОРМАТ ВЫВОДА даты. а при создании дата создаётся с помощью метода beforeSave
            'filter'=> false,
            'htmlOptions' => array('width'=>'10px'),
        ),

        'email'=>array(
            'name'=>'email',
            'value'=>'$data->email',
            'htmlOptions' => array('width'=>'15px'),
        ),
		'telefone',

        'adress'=>array(
            'name'=>'adress',
            'value'=>'$data->adress',
            'htmlOptions' => array('width'=>'10px'),
        ),
        array(
            'name'=>'PropertyID',
            'value'=>'isset($data->PropertyID)?CHtml::link(($data->PropertyID),array(\'properties/view\',\'id\'=>$data->PropertyID)):""',
            'type'=>'html',
            'htmlOptions' => array('width'=>'10px'),
        ),


        array(
            'name'=>'Property',
            'value'=>'($data->Property)?$data->Property->feature1:""',
            'htmlOptions' => array('width'=>'10px'),
        ),
        array(
            'name'=>'Property',
            'value'=>'($data->Property)?$data->Property->feature2:""',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'number'=>array(
            'name'=>'number',
            'value'=>'$data->number',
            'htmlOptions' => array('width'=>'10px'),
        ),


		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
