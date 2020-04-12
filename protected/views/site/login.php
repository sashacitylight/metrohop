<script>
    $('#overlay').show();
</script>

<script>
    $('.Categories').hide();
    $('.someList').hide();
</script>

<div id="overlay">
</div>


<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>
<!--вход под АДМИНОМ в админку -->
<div class="formAdmin">
<div class="form" id="formAdmin">


    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'loginForm',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'userLoginForm',
        ),
    ));
    ?>

    <p class="note">Поля с  <span class="required">*</span> обязательные для заполнения</p>
        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/close.png',
            'this is alt tag of image', array('class'=>'closeUserLoginSimple')
        ),array('site/index')); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'Имя пользователя', array('size'=>30, 'maxlength'=>160)); ?>
            <?php echo $form->textField($model, 'username', array('size'=>30, 'maxlength'=>160)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Пароль', array('size'=>30, 'maxlength'=>160)); ?>
            <?php echo $form->passwordField($model, 'password', array('size'=>30, 'maxlength'=>160)); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'Запомнить меня'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Войти'); echo ' '; echo CHtml::link(CHtml::Button('Отмена'), array('site/index')); ?>
        </div>

        <div class="row buttons">

        </div>

<?php $this->endWidget(); ?>
</div>
</div>