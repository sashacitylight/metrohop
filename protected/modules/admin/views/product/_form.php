<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id'=>'product-form',
        'enableAjaxValidation'=>true,
        'stateful'=>true,

        'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class'=>'ViewTable')
    ));

    ?>


	<p class="note">Поля с  <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'SubCategoriesId'); ?>
        <?php echo $form->textField($model, 'SubCategoriesId'); ?>
        <?php echo $form->error($model, 'SubCategoriesId'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'SubCategoriesId'); ?>
        <?php echo $form->dropDownList($model, 'SubCategoriesId', SubCategories::all(), array('empty'=>'')); ?>
        <?php echo $form->error($model, 'SubCategoriesId'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model, 'AuthorId'); ?>
        <?php echo $form->textField($model, 'AuthorId'); ?>
        <?php echo $form->error($model, 'AuthorId'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model, 'AuthorId'); ?>
		<?php echo $form->dropDownList($model, 'AuthorId', Author::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model, 'AuthorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'Title'); ?>
		<?php echo $form->textField($model, 'Title', array('size'=>60, 'maxlength'=>160)); ?>
		<?php echo $form->error($model, 'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'Price'); ?>
		<?php echo $form->textField($model, 'Price'); ?>
		<?php echo $form->error($model, 'Price'); ?>
	</div>

    <?php echo CHtml::activeFileField($model,  'ProductArtUrl'); ?>

    <div class="row">
		<?php echo $form->labelEx($model, 'ProductArtUrl'); ?>
		<?php echo $form->textField($model, 'ProductArtUrl', array('size'=>60, 'maxlength'=>1024)); ?>
		<?php echo $form->error($model, 'ProductArtUrl'); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model, 'pFirmID'); ?>
        <?php echo $form->dropDownList($model, 'pFirmID', Firm::all(), array('empty'=>'')); ?>
        <?php echo $form->error($model, 'pFirmID'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model, 'pFirmID'); ?>
		<?php echo $form->textField($model, 'pFirmID'); ?>
		<?php echo $form->error($model, 'pFirmID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'AdditionalInfo'); ?>
		<?php echo $form->textArea($model, 'AdditionalInfo', array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model, 'AdditionalInfo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'ToolId'); ?>
		<?php echo $form->textField($model, 'ToolId'); ?>
		<?php echo $form->error($model, 'ToolId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'pDiscount'); ?>
		<?php echo $form->textField($model, 'pDiscount'); ?>
		<?php echo $form->error($model, 'pDiscount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'pNumberOrders'); ?>
		<?php echo $form->textField($model, 'pNumberOrders'); ?>
		<?php echo $form->error($model, 'pNumberOrders'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'overallRating'); ?>
		<?php echo $form->textField($model, 'overallRating'); ?>
		<?php echo $form->error($model, 'overallRating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'pCommentsNumber'); ?>
		<?php echo $form->textField($model, 'pCommentsNumber'); ?>
		<?php echo $form->error($model, 'pCommentsNumber'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>