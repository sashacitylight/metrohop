<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
    'htmlOptions'=>array('class'=>'ViewTable'),
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model, 'userID'); ?>
		<?php echo $form->textField($model, 'userID'); ?>
		<?php echo $form->error($model, 'userID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'telefone'); ?>
		<?php echo $form->textField($model, 'telefone', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'telefone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'adress'); ?>
		<?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'productID'); ?>
		<?php echo $form->textField($model, 'productID', array('size'=>60, 'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'productID'); ?>
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

</div>