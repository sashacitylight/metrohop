<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),

    'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'telefon'); ?>
		<?php echo $form->textField($model, 'telefon', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'role'); ?>
		<?php echo $form->textField($model, 'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ban'); ?>
		<?php echo $form->textField($model, 'ban'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'adress'); ?>
		<?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'userCreated'); ?>
		<?php echo $form->textField($model, 'userCreated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>