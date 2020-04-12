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
		<?php echo $form->label($model, 'picProductID'); ?>
		<?php echo $form->textField($model, 'picProductID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'picUrl'); ?>
		<?php echo $form->textField($model, 'picUrl', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>