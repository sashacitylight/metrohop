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
		<?php echo $form->label($model, 'firmName'); ?>
		<?php echo $form->textField($model, 'firmName', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firmState'); ?>
		<?php echo $form->textField($model, 'firmState', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firmFio'); ?>
		<?php echo $form->textField($model,'firmFio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firmTime'); ?>
		<?php echo $form->textField($model, 'firmTime', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firmPrice'); ?>
		<?php echo $form->textField($model, 'firmPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firmService'); ?>
		<?php echo $form->textField($model, 'firmService', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firmInfo'); ?>
		<?php echo $form->textField($model, 'firmInfo', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->