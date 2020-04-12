<?php
$this->breadcrumbs = array(
	'Products'=>array('index'),
	'Журнал',
);

$this->menu = array(

	array('label'=>'Создать Товар', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал Товаров</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('Class'=>'adminGridTable'),
	'columns'=>array(

        'id'=>array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions' => array('width'=>'10px'),
        ),

        'SubCategory'=>array(
            'name'=>'SubCategory',
            'value' => 'CHtml::link(Categories::getCategory($data->SubCategoriesId),array(\'subCategories/view\',\'id\'=>$data->SubCategory->id))',
            'type'=>'html',
            'filter' => Categories::All(),
            'htmlOptions'=>array('width'=>'15px'),
        ),

        'SubCategoriesId'=>array(
            'name' => 'SubCategoriesId',
            'filter' => SubCategories::All(),
            'value' => 'CHtml::link($data->SubCategory->Name,array(\'/Subcategories/view\',\'id\'=>$data->SubCategory->id))',
            'type' => 'html'
        ),

        'Author'=>array(
            'name'=>'Author',
            'value' => 'CHtml::link($data->Author->Name,array(\'author/view\',\'id\'=>$data->Author->id))',
            'type'=>'html',
            'htmlOptions'=>array('width'=>'15px'),
        ),

        'Title'=>array(
            'name'=>'Title',
            'value'=>'$data->Title',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'Price'=>array(
            'name'=>'Price',
            'value'=>'$data->Price',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'ProductArtUrl'=>array(
            'name'=>'ProductArtUrl',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl . $data->ProductArtUrl,
                 "",
                array(\'width\'=>100, \'height\'=>100))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'25px'),
        ),

        'AdditionalInfo'=>array(
            'type'=>'html',
            'name'=>'AdditionalInfo',
            'value'=>'substr($data->AdditionalInfo,"0","400")."......."',   ////вот здесь
            'htmlOptions' => array('width'=>'10px'),
        ),

        array(
            'name'=>'ProductArtUrl',
            'value' => 'CHtml::link("Добавить картинки->",array(\'pictures/upload\',\'id\'=>$data->id))',
            'type'=>'html',
            'htmlOptions'=>array('width'=>'15px'),
        ),

        array(
            'name'=>'ProductArtUrl',
            'value' => 'CHtml::link("Добавить Характеристики->",array(\'productPropertiesList/create\',\'id\'=>$data->id))',
            'type'=>'html', 'htmlOptions' => array('width'=>'10px'),
        ),

        'ToolId'=>array(
            'name'=>'ToolId',
            'value'=>'$data->ToolId',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'pDiscount'=>array(
            'name'=>'pDiscount',
            'value'=>'$data->pDiscount',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'pNumberOrders'=>array(
            'name'=>'pNumberOrders',
            'value'=>'$data->pNumberOrders',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'overallRating'=> array(
            'name' => 'overallRating',
            'type' => 'html',
            'value'=>'CProductProperties::getStars($data->overallRating)',
            'htmlOptions' => array('class' => 'ratingStars'),
            'filter'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
        ),

        'pCommentsNumber'=>array(
            'name'=>'pCommentsNumber',
            'value'=>'$data->pCommentsNumber',
            'htmlOptions' => array('width'=>'10px'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
