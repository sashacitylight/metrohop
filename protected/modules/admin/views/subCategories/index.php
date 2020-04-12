<?php
$this->breadcrumbs = array(
	'Sub Categories'=>array('index'),
	'Журнал',
);

$this->menu = array(
	array('label'=>'Создать ПодКатегорию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sub-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал ПодКатегорий</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sub-categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(

        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'catID'=>array(
            'name'=>'catID',
            'value' => 'CHtml::link($data->Category->name,array(\'categories/view\',\'id\'=>$data->catID))',
            'type'=>'html',
            'filter'=> Categories::All(),
            'htmlOptions'=>array('width'=>'15px'),
        ),
        'Name'=>array(
            'name'=>'Name',
            'value'=>'$data->Name',
            'htmlOptions' => array('width'=>'10px'),
        ),

        'Description'=>array(
            'name'=>'Description',
            'value'=>'$data->Description',
            'htmlOptions' => array('width'=>'75%'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
