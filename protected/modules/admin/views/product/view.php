<?php
$this->breadcrumbs = array(
	'Products'=>array('index'),
	$model->Title,
);

$this->menu = array(
	array('label'=>'Журнал Товаров', 'url'=>array('index')),
	array('label'=>'Создать Товар', 'url'=>array('create')),
	array('label'=>'Изменить Товар', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Товар', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Добавить картинки в галерею', 'url'=>array('pictures/upload', 'id'=>$model->id)),
    array('label'=>'Добавить характеристики', 'url'=>array('productPropertiesList/create', 'id'=>$model->id)),
);
?>

<h1>Просмотр Товара #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'htmlOptions'=>array('class'=>'ViewTable'),
    'attributes'=>array(
		'id',
        'SubCategory'=>array(
            'label' => 'Категория',
            'type'  => 'raw',
            'value' => CHtml::link(CHtml::encode(Categories::getCategory($model->SubCategory->id)), array('Categories/view','id'=>$model->SubCategoriesId)),
            'visible'=>isset($model->SubCategory->id) ?  true: false ,
        ),

        'SubCategoriesId'=>array(
            'label' => 'Подкатегория',
            'type'  => 'raw',
            'value' => isset($model->SubCategory->Name)? CHtml::link(CHtml::encode($model->SubCategory->Name.'('.$model->SubCategoriesId.')'), array('SubCategories/view','id'=>$model->SubCategoriesId)) :false ,
            'visible'=>isset($model->SubCategory->Name) ?  true: false ,
        ),
        'AuthorId'=>array(
            'label' => 'AuthorId',
            'type'  => 'raw',
            'value' => isset($model->Author->Name)? CHtml::link(CHtml::encode($model->Author->Name.'('.$model->Author->id.')'), array('Author/view','id'=>$model->Author->id)) :false ,
            'visible'=>isset($model->Author->Name) ?  true: false ,
        ),

		'Title',
		'Price',
        'ProductArtUrl' => array(
            'label'=>'ProductArtUrl',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl.$model->ProductArtUrl, '', array('width'=>'130px')),
        ),

        'pFirmID'=>array(
            'label'=>'Поставщик',
            'type'  => 'raw',
            'value' => isset($model->Firm->firmName)? CHtml::link(CHtml::encode($model->Firm->firmName.'('.$model->pFirmID.')'),
                    array('firm/view','id'=>$model->pFirmID)) :false ,
            'visible'=>isset($model->Firm->firmName) ?  true: false ,
        ),
		'AdditionalInfo',
		'ToolId',
		'pDiscount',
		'pNumberOrders',
		'overallRating',
		'pCommentsNumber',
	),
)); ?>
