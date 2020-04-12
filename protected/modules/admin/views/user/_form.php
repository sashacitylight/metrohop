<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'userForm',
	'htmlOptions'=>array('class'=>'ViewTable'),
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'telefon'); ?>
		<?php echo $form->textField($model, 'telefon', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'telefon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->hiddenField($model, 'password', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'role'); ?>
		<?php echo $form->textField($model, 'role'); ?>
		<?php echo $form->error($model, 'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'ban'); ?>
		<?php echo $form->textField($model, 'ban'); ?>
		<?php echo $form->error($model, 'ban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'adress'); ?>
		<?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'adress'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>