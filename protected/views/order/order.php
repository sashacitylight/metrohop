<?php
$this->breadcrumbs = array(
	'Orders'=>array('index'),
	'Создать',
);

$this->menu = array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin_old')),
);
?>

<h1>Заказать</h1>
    <div class="form">

        <?=CHtml::openTag('table', array('class'=>'tableOrder'))?>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'orderForm',
                'enableAjaxValidation'=>false,

            )); ?>

            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <p class="note">Поля с  <span class="required">*</span> обязательны.</p>

                <?=CHtml::closeTag('td')?>
                <td id="errorOrder">
                    <?php echo $form->errorSummary($model); ?>
                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>

            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'username'); ?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
                    <?php echo $form->error($model, 'username'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>


            <?=CHtml::openTag('tr')?>
                 <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'email'); ?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
                    <?php echo $form->error($model, 'email'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>

            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'telefone'); ?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'telefone', array('size'=>60, 'maxlength'=>255)); ?>
                    <?php echo $form->error($model, 'telefone'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>


            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'adress'); ?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
                    <?php echo $form->error($model, 'adress'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>


            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'productID'); ?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'productID', array('readonly'=>true, 'size'=>60, 'maxlength'=>255)); ?>
                    <?php echo $form->error($model, 'productID'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>

            <?php
            if($model->PropertyID):
                ?>

                <?=CHtml::openTag('tr')?>
                    <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                        <?php echo $form->labelEx($model, 'PropertyID'); ?>
                    <?=CHtml::closeTag('td')?>
                    <?=CHtml::openTag('td')?>

                        <?php echo $form->textField($model, 'PropertyID', array('readonly'=>true, 'size'=>60, 'maxlength'=>255)); ?>
                        <?php echo $form->error($model, 'PropertyID'); ?>

                    <?=CHtml::closeTag('td')?>
                <?=CHtml::closeTag('tr')?>
            <?php
            endif;
            ?>

            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('class'=>'fieldTextOrder'))?>
                    <?php echo $form->labelEx($model, 'number'); ?>
                 <?=CHtml::closeTag('td')?>

                <?=CHtml::openTag('td')?>

                    <?php echo $form->numberField($model, 'number', array('size'=>60, 'maxlength'=>255, 'class'=>'numberFieldOrder', 'min'=>'1', 'max'=>'999', 'maxlength'=>'5')); ?>
                    <?php echo $form->error($model, 'number'); ?>

                 <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>

            <?php if(CCaptcha::checkRequirements()): ?>
            <?=CHtml::openTag('tr')?>
                <td class="fieldTextOrder">
                    <?php $this->widget('CCaptcha'); ?>

                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>

                    <?php echo $form->textField($model, 'verifyCode'); ?>
                    <?php echo $form->labelEx($model, 'Введите код на картинке'); ?>
                    <?php echo $form->error($model, 'verifyCode'); ?>

                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>
            <?php endif; ?>

            <?=CHtml::openTag('tr')?>
            <?=CHtml::openTag('td')?></td>
                <?=CHtml::openTag('td')?>
                    <div class="row buttons">
                        <?php echo CHtml::submitButton('Осуществить Заказ', array('Class'=>'orderButton')); ?>
                    </div>
                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>

            <?php $this->endWidget(); ?>
        <?=CHtml::closeTag('table')?>
    </div>

