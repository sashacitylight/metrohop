<?php
$this->breadcrumbs = array(
	'Pictures'=>array('index'),
	'Журнал',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pictures-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Картинок</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pictures-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(
        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'picProductID'=>array(
            'name'=>'picProductID',
            'value'=>'$data->picProductID',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'picProductID'=>array(
            'name'=>'picProductID',
            'value' => 'CHtml::link("Добавить картинки к товару",array(\'pictures/upload\',\'id\'=>$data->picProductID))',
            'type'=>'html',
            'htmlOptions'=>array('width'=>'15px'),
        ),
		'picUrl',
        array(
            'name'=>'picUrl',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl . $data->picUrl,
                 "",
                array(\'width\'=>100, \'height\'=>100))',
            'type'=>'raw',

        ),
        array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
