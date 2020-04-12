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
		<?php echo $form->label($model, 'Name'); ?>
		<?php echo $form->textField($model, 'Name', array('size'=>60, 'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Description'); ?>
		<?php echo $form->textArea($model, 'Description', array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'catID'); ?>
		<?php echo $form->textField($model, 'catID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>