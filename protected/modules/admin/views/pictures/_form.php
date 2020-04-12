<div class="form">
  <?php  $form = $this->beginWidget('CActiveForm', array(
    'id'=>'pictures-form',
    'enableAjaxValidation'=>true,
    'stateful'=>true,
    'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class'=>'ViewTable')
    ));?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model, 'picProductID'); ?>
		<?php echo $form->error($model, 'picProductID'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'picUrl'); ?>
        <?php echo $form->textField($model, 'picUrl', array('size'=>60, 'maxlength'=>1024)); ?>
        <?php echo $form->error($model, 'picUrl'); ?>
    </div>

    <?php echo CHtml::activeFileField($model, 'picUrl'); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>