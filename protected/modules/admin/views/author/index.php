<?php
$this->breadcrumbs = array(
	'Authors'=>array('index'),
	'Журнал',
);

$this->menu = array(

	array('label'=>'Создать Автора', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#author-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Авторов</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model'=>$model,
)); ?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'author-grid',
	'dataProvider'=>$model->search(),

	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
    'columns'=>array(
        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('width'=>'10px'),
        ),
		'Name',

        array(
            'type'=>'html',
            'name'=>'bio',
            'value'=>'substr($data->bio,"0","300")."......."',
        ),
        'AuthorArtUrl'=>array(
            'name'=>'AuthorArtUrl',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl . $data->AuthorArtUrl,
                 "",
                array(\'width\'=>100, \'height\'=>100))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'25px'),
        ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
