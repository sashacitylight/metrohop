<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'sub-categories-form',
    'htmlOptions'=>array('class'=>'ViewTable'),
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size'=>60, 'maxlength'=>120)); ?>
        <?php echo $form->error($model, 'id'); ?>
    </div>


	<div class="row">
		<?php echo $form->labelEx($model, 'Name'); ?>
		<?php echo $form->textField($model, 'Name', array('size'=>60, 'maxlength'=>120)); ?>
		<?php echo $form->error($model, 'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'Description'); ?>
		<?php echo $form->textArea($model, 'Description', array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model, 'Description'); ?>
	</div>


    <div class="row">
        <?php echo $form->label($model, 'catID'); ?>
        <?php echo $form->dropDownList($model, 'catID', Categories::all(), array('empty'=>'')); ?>
        <?php echo $form->error($model, 'catID'); ?>
    </div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>