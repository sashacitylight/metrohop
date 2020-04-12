<div class="form">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'activity_form',
    'enableAjaxValidation'=>true,
    'stateful'=>true,

    'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class'=>'ViewTable')
));
?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'Name'); ?>
		<?php echo $form->textField($model, 'Name', array('size'=>60, 'maxlength'=>120)); ?>
		<?php echo $form->error($model, 'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'bio'); ?>
		<?php echo $form->textArea($model, 'bio', array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model, 'bio'); ?>
	</div>



    <?php echo CHtml::activeFileField($model, 'AuthorArtUrl'); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'AuthorArtUrl'); ?>
        <?php echo $form->textField($model, 'AuthorArtUrl', array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model, 'AuthorArtUrl'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>