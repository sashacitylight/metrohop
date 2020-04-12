<div class="navigationSubCategoriesWrapper">
    <?php
    $arrayLinks = array();
    $arrayLinks['К товару-> '.$productModel->Title] = array('ProductDescription/ProductDetailedDescription', 'id'=>$productModel->id);

    if(isset($this->breadcrumbs)):
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$arrayLinks,
            'homeLink'=>false,
            'separator'=>' -> ',
            'htmlOptions'=>array('class'=>'productCBreadcrumbs')
        ));
    endif;
    ?>
</div>
<br/>
<div class="commentsMessages">Список комментариев к товару <?php echo CHtml::link($productModel->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$productModel->id));?></div>

<!-- Отзывы о товаре комментарии-->
<div class="infoAboutProductMainReviews" id="commentsID">

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'commentsGrid',
    'dataProvider'=>$tableComments->searchWithFilter($_GET['id']),   //////////////метод в модели
    'htmlOptions' => array('class' => 'simpleTableGridSecond', 'id'=>'commentsTableSecondID', 'cellspacing'=>'0'),
    'afterAjaxUpdate'=>"function() {
        jQuery('.rating-block input').rating({'readOnly':true});
    }",
    'columns'=>array(

        'cName',
        'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y H:i",$data->created)',   ///ФОРМАТ ВЫВОДА даты. а при создании дата создаётся с помощью метода beforeSave
            'filter'=> false,
        ),
        'cReiting'=> array(
            'name' => 'cReiting',
            'type' => 'html',
            'value'=>'CProductProperties::getStars($data->cReiting)',
            'htmlOptions' => array('class' => 'ratingStars'),
        ),
        'cText',

    ),
)); ?>
</div>


<div class="commentsMessages">Добавить комментарий к товару <?php echo CHtml::link($productModel->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$productModel->id));?></div>

<div>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'commentsForm',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array('class'=>'commentForm',),
    )); ?>

    <p class="note">Поля с  <span class="required">*</span> обязательны.</p>
    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'cName'); ?>
        <?php echo $form->textField($model, 'cName',array('size'=>32, 'maxlength'=>200)); ?>
        <?php echo $form->error($model, 'cName'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'cReiting'); ?>
        <?php $this->widget('CStarRating', array(
            'model' => $model,
            'attribute' => 'cReiting',
            'id' => 'rating_' . $model->cReiting,
            'ratingStepSize' => 1,
            'maxRating' => 5,
            'allowEmpty' => false,
        )); ?>
        <?php echo $form->error($model, 'cReiting'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cText'); ?>
        <?php echo CHtml::activeTextArea($model, 'cText');?>
        <?php echo $form->error($model, 'cText'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
            </div>
            <div class="hint">Пожалуйста введите код с картинки</div>
            <?php echo $form->error($model, 'verifyCode'); ?>
        </div>
    <?php endif; ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Создать', array('class'=>'btnAddComment')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
</div>


<?php
//метод получения количества звёзд
function getStars(){}
?>

<script>
    ///меню скрыть
    subCategoryCategoryMenuHide();
</script>


