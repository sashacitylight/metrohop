<div class="wide form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id',array('size'=>60, 'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Name'); ?>
		<?php echo $form->textField($model, 'Name', array('size'=>60, 'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'bio'); ?>
		<?php echo $form->textArea($model, 'bio', array('rows'=>4, 'cols'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'AuthorArtUrl'); ?>
		<?php echo $form->textField($model, 'AuthorArtUrl', array('size'=>60, 'maxlength'=>1000)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>