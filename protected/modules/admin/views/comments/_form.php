<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'commentsForm',
    'htmlOptions'=>array('class'=>'ViewTable'),
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'cProductID'); ?>
		<?php echo $form->textField($model, 'cProductID'); ?>
		<?php echo $form->error($model, 'cProductID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'cName'); ?>
		<?php echo $form->textField($model, 'cName', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'cName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
		<?php echo $form->error($model, 'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'cReiting'); ?>
		<?php echo $form->textField($model, 'cReiting'); ?>
		<?php echo $form->error($model, 'cReiting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'cText'); ?>
		<?php echo $form->textField($model, 'cText', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'cText'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>