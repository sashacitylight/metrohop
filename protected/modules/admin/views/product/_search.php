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
		<?php echo $form->label($model, 'SubCategoriesId'); ?>
		<?php echo $form->textField($model, 'SubCategoriesId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'AuthorId'); ?>
		<?php echo $form->textField($model, 'AuthorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Title'); ?>
		<?php echo $form->textField($model, 'Title', array('size'=>60, 'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Price'); ?>
		<?php echo $form->textField($model, 'Price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ProductArtUrl'); ?>
		<?php echo $form->textField($model, 'ProductArtUrl', array('size'=>60, 'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pFirmID'); ?>
		<?php echo $form->textField($model, 'pFirmID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'AdditionalInfo'); ?>
		<?php echo $form->textArea($model, 'AdditionalInfo', array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ToolId'); ?>
		<?php echo $form->textField($model, 'ToolId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pDiscount'); ?>
		<?php echo $form->textField($model, 'pDiscount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pNumberOrders'); ?>
		<?php echo $form->textField($model, 'pNumberOrders'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'overallRating'); ?>
		<?php echo $form->textField($model, 'overallRating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pCommentsNumber'); ?>
		<?php echo $form->textField($model, 'pCommentsNumber'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>