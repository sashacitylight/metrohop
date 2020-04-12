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
		<?php echo $form->label($model, 'userID'); ?>
		<?php echo $form->textField($model, 'userID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'telefone'); ?>
		<?php echo $form->textField($model, 'telefone', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'adress'); ?>
		<?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'productID'); ?>
		<?php echo $form->textField($model, 'productID', array('size'=>60, 'maxlength'=>255)); ?>
	</div>





	<div class="row">
		<?php echo $form->label($model, 'number'); ?>
		<?php echo $form->textField($model, 'number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>