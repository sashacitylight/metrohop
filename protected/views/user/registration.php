<?php if(Yii::app()->user->hasFlash('registration')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>

<?php else: ?>
<div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'userForm',
            'action'=>Yii::app()->createUrl('user/registration'),
            'enableAjaxValidation'=>false,
            'htmlOptions' => array('class'=>'registrationForm',),
        )); ?>

        <p class="formRegistrationRaw">Поля с  <span class="required">*</span> обязательны.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'telefon'); ?>
            <?php echo $form->textField($model, 'telefon', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'telefon'); ?>
        </div>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'adress'); ?>
            <?php echo $form->textField($model, 'adress', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'adress'); ?>
        </div>

        <div class="formRegistrationRaw">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('size'=>60, 'maxlength'=>255)); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
        <br/>

        <?php if(CCaptcha::checkRequirements()): ?>
            <div class="formRegistrationRaw">
                <div class="formRegistrationCaptchaImg">
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <?php echo $form->labelEx($model, 'Введите код на картинке'); ?>
                <div class="formRegistrationRaw"></div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        <?php endif; ?>

        <div class="formRegistrationRaw buttons">
            <?php echo CHtml::submitButton('Зарегестрироваться', array('Class'=>'formRegistrationButton')); ?>
        </div>

        <?php $this->endWidget(); ?>
</div>
<?php
endif;
?>