<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'product-properties-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'feature1'); ?>
		<?php echo $form->textField($model, 'feature1',array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'feature1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'feature2'); ?>
		<?php echo $form->textField($model, 'feature2', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'feature2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>