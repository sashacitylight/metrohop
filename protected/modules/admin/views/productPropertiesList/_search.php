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
		<?php echo $form->label($model, 'ProductID'); ?>
		<?php echo $form->textField($model, 'ProductID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'propertiesID'); ?>
		<?php echo $form->textField($model, 'propertiesID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'number'); ?>
		<?php echo $form->textField($model, 'number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->