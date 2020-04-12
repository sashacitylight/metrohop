<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'firm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'htmlOptions'=>array('class'=>'ViewTable'),
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmName'); ?>
		<?php echo $form->textField($model, 'firmName', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'firmName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmState'); ?>
		<?php echo $form->textField($model, 'firmState', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'firmState'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firmFio'); ?>
		<?php echo $form->textField($model,'firmFio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'firmFio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmTime'); ?>
		<?php echo $form->textField($model, 'firmTime', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'firmTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmPrice'); ?>
		<?php echo $form->textField($model, 'firmPrice'); ?>
		<?php echo $form->error($model, 'firmPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmService'); ?>
		<?php echo $form->textField($model, 'firmService', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'firmService'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'firmInfo'); ?>
		<?php echo $form->textField($model, 'firmInfo', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'firmInfo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>