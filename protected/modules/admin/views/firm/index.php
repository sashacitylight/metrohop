<?php
$this->breadcrumbs = array(
	'Firms'=>array('index'),
	'Журнал',
);

$this->menu = array(

	array('label'=>'Создать Поставщика', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#firm-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Поставщиков</h1>


<?php echo CHtml::link('Расширенный поиск', '#', array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'firm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(

        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions' => array('width'=>'10px'),
        ),
		'firmName',
		'firmState',
		'firmFio',
		'firmTime',
		'firmPrice',
        'id'=>array(
            'name'=>'firmPrice',
            'value'=>'$data->firmPrice',
            'htmlOptions' => array('width'=>'10px'),
        ),

		/*
		'firmService',
		'firmInfo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
