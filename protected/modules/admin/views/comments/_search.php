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
		<?php echo $form->label($model, 'cProductID'); ?>
		<?php echo $form->textField($model, 'cProductID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cName'); ?>
		<?php echo $form->textField($model, 'cName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cReiting'); ?>
		<?php echo $form->textField($model, 'cReiting'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cText'); ?>
		<?php echo $form->textField($model, 'cText'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>