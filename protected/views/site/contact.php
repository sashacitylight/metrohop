<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us. Your Wishes';
$this->breadcrumbs = array(
	'Contact',
);
?>

  <script>
      $("#contactID a").addClass("current");
      //отправляем в метод Базовый URL сайта
      var jsBaseUrl = '<?php echo Yii::app()->request->baseUrl;?>';

  </script>

<!--    блок содержит изображения и форму-->
<div class="mainDivContactClass">

<!--    изображение справа от формы вверху-->
    <div id="imgContactWrapperIDFirst" class="imgContactWrapperClass">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/about/gift1.png', '', array('class'=>'imgContactClass'));?>
    </div>
    <!--    изображение справа от формы внизу-->
    <div id="imgContactWrapperIDSecond" class="imgContactWrapperClass">
       <?php echo CHtml::image(Yii::app()->baseUrl.'/images/about/enternet-store.png', '', array('class'=>'imgContactClass'));?>
    </div>
    <!--    изображение слева от формы внизу-->
    <div id="imgContactWrapperIDThird" class="imgContactWrapperClass">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/about/surprise22.png', '', array('class'=>'imgContactClass', 'id'=>'imgContactClassLeftID'));?>
    </div>

    <div class="divContact" id="divContactMainFormID">
        <h1>Ваши пожелания или предложения</h1>

        <?php if(Yii::app()->user->hasFlash('contact')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>

        <?php else: ?>

<!--            ///форма для оставления комментариев пожеланий жалоб-->
        <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contactForm',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <p class="s_row_p">Поля с  <span class="required">*</span> обязательны для заполнения.</p>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <p> ФИО </p>

                <?php echo $form->textField($model, 'name'); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

            <div class="row">
                <p> Эмейл </p>
                <?php echo $form->textField($model, 'email'); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>

            <div class="row">
                <p> Название </p>
                <?php echo $form->textField($model, 'subject', array('size'=>30, 'maxlength'=>128)); ?>
                <?php echo $form->error($model, 'subject'); ?>
            </div>

            <div class="row">
                <p> Содержание </p>
                <?php echo $form->textArea($model, 'body', array('rows'=>6, 'cols'=>50)); ?>
                <?php echo $form->error($model, 'body'); ?>
            </div>

            <?php if(CCaptcha::checkRequirements()): ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div class="wrapperCaptcha">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <div class="hint">Пожалуйста введите код показанный на картинке.
                </div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
            <?php endif; ?>

            <div id="buttonContact" class="row buttons">
                <?php echo CHtml::submitButton('Отправить сообщение'); ?>
            </div>
        <?php $this->endWidget(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
