<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'product-properties-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">

		<?php echo $form->hiddenField($model, 'ProductID'); ?>
		<?php echo $form->error($model, 'ProductID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'propertiesID'); ?>
        <?php echo $form->dropDownList($model, 'propertiesID', ProductProperties::all(), array('empty'=>''));?>
		<?php echo $form->error($model, 'propertiesID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'number'); ?>
		<?php echo $form->textField($model, 'number'); ?>
		<?php echo $form->error($model, 'number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->