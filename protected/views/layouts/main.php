<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->


	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainfrom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/details_info.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mycart.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Order.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myartist.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/messages.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mylk.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/about.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/gallery.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/contact.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/comments.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bigsearch.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/registration.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/personalAccount.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ordernew.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/orderResult.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adminka.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_categories.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal/css/style.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal/css/header.css" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/captcha/reiting/jquery.rating.css" media="screen" />
    <!-- jQuery files -->

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal/css/style.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/reiting/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/reiting/jquery.MetaData.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/reiting/jquery.rating.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/reiting/jquery.rating.pack.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/captcha/jquery.plugin.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/captcha/jquery.realperson.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/captcha/jquery.realperson.css">



    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Подключаем FancyBox 2 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/fancybox/css/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/fancybox/js/jquery.fancybox.pack.js"></script>
    <!-- Добавление опций - button, thumbnail and/or media -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/fancybox/css/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/fancybox/js/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/fancybox/js/jquery.fancybox-media.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/fancybox/css/jquery.fancybox-thumbs.css" type="text/css" media="screen" />

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/mycart.css"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/fancybox/zoom/easyzoom.js"></script>
    <link href="<?php echo Yii::app()->request->baseUrl;?>/fancybox/zoom/default.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/captcha/galery/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/captcha/galery/css/style6.css" />

    <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/galery/js/jquery.easing.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/galery/js/script.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/captcha/zoomer/js/zoomsl-3.0.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/eazy_slider/js/easypaginate.js"></script>

<!--    slider_carusel-->
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/show_slider_yet/style/js/jquery.jcarousel.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/captcha/show_slider_yet/style.css" media="all" />
    <link rel="stylesheet" media="all" href="<?=Yii::app()->baseUrl?>/captcha/show_slider_yet/style/type/puritan.css" />

<!--    easy_slider-->
    <link rel="stylesheet" media="all" href="<?=Yii::app()->baseUrl?>/captcha/slider_for_all_page/css/screen.css" />
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/slider_for_all_page/js/easySlider1.7.js"></script>
    <link href="<?=Yii::app()->baseUrl?>/captcha/slider_for_all_page/css/screen.css" rel="stylesheet" type="text/css" media="screen" />

    <!--    vertical_slider-->
    <link href="<?=Yii::app()->baseUrl?>/captcha/vertical_slider/style.css" rel="stylesheet" type=text/css>

    <link href="<?=Yii::app()->baseUrl?>/css/test.css" rel="stylesheet" type=text/css>
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/vertical_slider/js/jcarousellite_1.0.1.min.js"></script>

    <!--    simple menu-->
    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl?>/images/ico/1.png" type="image/x-icon">
    <!--    vert gallery-->

    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/js/jquery.sliderkit.1.4.js"></script>
    <!--<script type="text/javascript" src="../lib/js/jquery.sliderkit.1.4.min.js"></script>-->
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/js/jquery.mousewheel.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/css/sliderkit-core.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/css/sliderkit-demos.css" media="screen, projection" />

    <!-- Site styles -->
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/captcha/vertical_cart_gallery/lib/css/sliderkit-site.css" media="screen, projection" />
<!--    raiting-->

    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/captcha/rate/css/base.css" type="text/css" media="screen" charset="utf-8"/>
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/captcha/rate/css/registration.css" type="text/css" media="screen" charset="utf-8"/>
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/captcha/rate/stars.css" type="text/css" media="screen" charset="utf-8"/>
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/captcha/rate/script.js"></script>

<!--    gallery_Order    -->
    <link href="<?=Yii::app()->baseUrl?>/captcha/gallery_for_Order/css/style.min.css" rel="stylesheet">
    <link href="<?=Yii::app()->baseUrl?>/captcha/gallery_for_Order/css/least.min.css" rel="stylesheet">
    <script src="<?=Yii::app()->baseUrl?>/captcha/gallery_for_Order/js/jquery.lazyload.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/captcha/gallery_for_Order/js/least.min.js"></script>

<!--    zoom для picture-->
    <script src="<?=Yii::app()->baseUrl?>/scripts/product_description/jquery.magnify.js"></script>


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php
Yii::app()->clientScript->scriptMap=array(
    'jquery.js'=>true,
    'jquery.ba-bbq.js'=>false,
    'jquery.yiigridview.js'=>false
);
///подключаем файл скриптов
    $includeJavascriptFromFile = new CHelperMethods();
    $includeJavascriptFromFile->includeJavascript('/scripts/main/user.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/menu.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/search.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/fancybox.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/biography.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/search_categories.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/scrolling_up_arrow.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/other.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/index_page.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/main/gallery_pictures.js');

?>
<!--//блок который затемняет при открытии модальных окон-->
<div id="overlay"></div>
<!--//блок который позволяет передать baseURL в JS-->
<div id="baseUrlToJS" style="display: none;">
    <?php
    $srcName = Yii::app()->baseUrl;
    echo $srcName;
    ?>
</div>
<script>
    ///baseUrl для js
    var siteBaseUrl = '<?php echo Yii::app()->request->baseUrl;?>';
</script>



<?php
///записываем в массив SubCategories [ID категории, ID субкатегории, имя субкатегории]
//закидываем в json этот массив
$listSubCategoriesMenu = json_encode(SubCategories::JSMenuSubCategories());

///количество товара в корзине и картинка в зависимости от того пустая или нет
$cart = new CCart();
$countCart = $cart->countCart();
$cartName = 'Корзина('.$countCart.')';
if($countCart == 0){
    $urlImage = '/images/cart/basket-empty.png';
}
else
{
    $urlImage = '/images/cart/basket-full.png';
}
?>


<!--главный див шапки-->
<div id="header" class="header hdSimple">

<!--//эффект fancy-box-->
<style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }
</style>

<script type="text/javascript">
    ///эффект zoom для картинок
    jQuery(function($){
        $('a.zoom').easyZoom();
    });
</script>


<script>
    //menu.js работа с меню с подпунктами SubCategories  кидаем в файл BaseURl
    var div = document.getElementById("baseUrlToJS");
    var myData_link_url = div.textContent;
    //кидаем реальный URL сайта
    var subCategoriesJson = <?=$listSubCategoriesMenu?>;
    //Y передаём массив в формате json массив SubCategories с PHP скрипта в начале
    setSubCategories(subCategoriesJson);

    var flag=0;
</script>

<!--    ///див для отображения категорий и субкатегории-->
    <div class="Categories">
        <?php
        $categoriesList = Categories::model()->findAll();

        foreach($categoriesList as $categoriesLists)
        {
            ?>
<!--//категория-->
            <div  class="categoryElement" mid="<?=$categoriesLists->id?>"> <?=$categoriesLists->name?>
<!--/субкатегории cписок с помощью javascript открывается-->
                <div class="openDiv" id="<?=$categoriesLists->id?>">
                </div>
            </div>
        <?php
        }
        ?>
    </div>



<!--    ///логотип слева вверху-->
<div class="utilClearfix layout">
    <div class="logo">
        <?php CHtml::link('AliExpress', array('http://ru.aliexpress.com/'), array('data-spm-anchor-id'=>'0.0.0.0'))?>
    </div>
</div>

<!--блок содержит надпись категории и стрелку вниз или вверх-->
    <div class="someList">
        <?=CHtml::openTag('p')?>
        <?='Категории'?>
        <?=CHtml::closeTag('p')?>
        <?php
         echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/logo/strelka_up.png', '', array('class'=>'arrowUpIcon')));
         echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/logo/strelka_down.png', '', array('class'=>'arrowDownIcon')));
        ?>
    </div>

<?php
////модальное окно с формой входа на сайт
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'loginDialog',
    'options' => array(
        'show'=>'show',
            'hide' => 'explode',
            'modal' => 'true',
            'autoOpen'=>false,
        'position'=>'center',
        'dialogClass'=>'class',
        'resizable'=> false
    ),
));

$logForm = new LoginForm;
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'loginForm',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'action' => array('user/login'),
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'userLoginFor',
        'onsubmit'=>"return false;",/* Disable normal form submit */
        'onkeypress'=>" if(event.keyCode == 13){ enter(); } " /* Do ajax call when newuser presses enter key */
    ),
));
?>

<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/close.png',
    'this is alt tag of image', array('class'=>'closeUserLogin')
); ?>

<div class="row">
    <?php echo $form->labelEx($logForm, 'Имя пользователя', array('size'=>35, 'maxlength'=>160)); ?>
    <?php echo $form->textField($logForm, 'username', array('size'=>35, 'maxlength'=>160)); ?>
    <?php echo $form->error($logForm, 'username'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($logForm, 'Пароль',array('size'=>35, 'maxlength'=>160)); ?>
    <?php echo $form->passwordField($logForm, 'password',array('size'=>35, 'maxlength'=>160)); ?>
    <?php echo $form->error($logForm, 'password'); ?>
</div>

<div class="row rememberMe">
    <?php echo $form->checkBox($logForm, 'rememberMe'); ?>
    <?php echo $form->label($logForm, 'Запомнить меня'); ?>
    <?php echo $form->error($logForm, 'rememberMe'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::Button('Поиск', array('onclick'=>'enter();'), array('Class'=>'formRegistrationButton')); ?>
</div>

<?php $this->endWidget();?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


<!--///ajax запрос с модального окна залогиниться-->
<script type="text/javascript">
    function enter()
    {
        var data = $("#loginForm").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("user/login"); ?>',
            data: data,
            success:function(data){
             if (data != '0'){
                var obj = JSON.parse(data);

                 //запись в всплывающее окно пользователя при входе
                 $("#uLogin").attr("value",obj.username);
                 $("#uName").attr("value",obj.name);
                 $("#uTelefon").attr("value",obj.telefon);
                 $("#uMail").attr("value",obj.email);
                 $("#uAdress").attr("value",obj.adress);
                 $("#uNumberOrder").attr("value",obj.countOrders);

                 $('#loginForm').hide();
                 //открытие этого окна
                 $(".modalUserCabinet").show();
             }
             else
             {
                 alert('Неверные данные!');
             }
            },
            error: function(data) { // if error occured
                alert('Попробуйте ещё раз!');
            },
            dataType:'html'
        });
    }
</script>




<!--главное меню посередине-->
    <div id="mainMiddleMenu">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Домашняя', 'url'=>array('/site/index'),
                    'itemOptions'=>array('id'=>'homeID'),
                    'linkOptions'=>array('id'=>'homeID'),
                ),
                array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about'),
                    'itemOptions'=>array('id'=>'aboutID'),
                    'linkOptions'=>array('id'=>'aboutID'),
                ),
                array('label'=>'Пожелания', 'url'=>array('/site/contact'),
                    'itemOptions'=>array('id'=>'contactID'),
                    'linkOptions'=>array('id'=>'contactID'),
                ),
                array('label'=>'Инструкции', 'url'=>array('/site/instruction'),
                    'itemOptions'=>array('id'=>'instructionsID'),
                    'linkOptions'=>array('id'=>'instructionsID'),
                ),
                array('label'=>'Поиск', 'url'=>"#",
                    'itemOptions'=>array('id'=>'bigSearch','onclick'=>'search()'),
                    'linkOptions'=>array('id'=>'bigSearch'),
                ),

            ),
                 'htmlOptions'=>array('class'=>'span-24'),)); ?>
    </div>



<script>
    //открывает окно поиска
    function search(){
        $(".searchDivWrapper").toggle();
    }
    ///ajax запрос выйти с сайта справа вверху кнопка в меню выйти-->
    function logout(){
        var div = document.getElementById("baseUrlToJS");
        var baseUrl = div.textContent;

        $.ajax(
            {
                type: "POST",
                url: baseUrl+ '/user/Logout',
                data:
                {
                },
                success: function (result)
                {
                    location.reload();
                }
            });
    }
</script>

<!--главное меню справа вход регистрация-->
<div id="mainMenuRightLoginReg">
    <?php
    $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array(
                    'label' => 'Вход',
                    'visible' => Yii::app()->user->isGuest,
                    'linkOptions' => array(
                        'onclick' => 'func();',

                    )
                ),
                array(
                    'label' => 'Выход('.Yii::app()->user->name.')',
                    'visible' => !Yii::app()->user->isGuest,
                    'htmlOptions'=>array('class'=>'CMenuLink'),
                    'linkOptions' => array(
                        'onclick' => 'logout();',

                    )
                ),
                array('label'=>'Регистрация', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),
            )
    ));
    ?>
</div>
<script>
        ///для loginDialog
        function func(){
            $("#loginDialog").toggle();
            $("#loginDialog").dialog("open");
            return false;
        }
        //загружаем диалоговое окно
        $(document).ready(function(){
            $("#loginDialog").dialog("open");
        });
</script>


<!--блок со строкой поиска-->
<div id="divSearchID">
<!--        ///форма для отправки значения строки поиска и других параметров-->
            <?php echo CHtml::textField('stringSearch', '', array('class'=>'mysearch'))?>
            <?php echo CHtml::button('Поиск',array('onclick'=>'OpenSearch()', 'class'=>'btnSearch'));?>
    <script>
        function OpenSearch(){
            $('.searchDivWrapper').toggle(300);
            $('.mysearch').toggle();
            $(this).hide();
        }
    </script>

<!--            ////раскрывающийся блок поиска с категориями и ползунками с значениями цен/////-->
            <div class="searchDivWrapper" style="text-align: center">
               <?php
               echo CHtml::image(Yii::app()->baseUrl.'/images/close.png', '', array('id'=>'imgCloseSmallSearchDiv', 'width'=>'30px'));
                $searchForm = new SearchForm;
                if(isset($this->searchModel)){
                    $searchForm = $this->searchModel;
                }
                $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'searchForm',
                    'action' => array('site/ProductSearch'),
                    'enableAjaxValidation'=>false,
                )); ?>

                <?php echo $form->errorSummary($searchForm); ?>

                <div class="row" id="rowLeft">
                    <?php echo $form->labelEx($searchForm, 'Title', array('style'=>'width:180px !important')); ?>
                    <?php echo $form->textField($searchForm, 'Title', array('style'=>'width:180px !important')); ?>
                    <?php echo $form->error($searchForm, 'Title'); ?>
                </div>

               <br/>

                <div class="row">
                    <?php echo $form->labelEx($searchForm, 'SubCategoriesId'); ?>
                    <?php echo $form->dropDownList($searchForm, 'SubCategoriesId', SubCategories::All(), array('empty'=>''));?>
                    <?php echo $form->error($searchForm, 'SubCategoriesId'); ?>
                </div> <br/>

                <div class="row">
                    <?php echo $form->labelEx($searchForm, 'pDiscount'); ?>
                    <?php echo $form->dropDownList($searchForm, 'pDiscount', array('empty'=>'', '5'=>'5', '10'=>'10', '15'=>'15', '50'=>'50')); ?>
                    <?php echo $form->error($searchForm, 'pDiscount'); ?>
                </div> <br/>

                <div class="row">
                    <?php echo $form->labelEx($searchForm, 'overallRating'); ?>
                    <?php echo $form->dropDownList($searchForm, 'overallRating', array('empty'=>'', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5')); ?>
                    <?php echo $form->error($searchForm, 'overallRating'); ?>
                </div>
                 <br/>  <br/>

                <div class="row" id="rowLeft">
                <?php

                $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'name'=>'price1',
                    'value'=>1,// default selection
                    'event'=>'change',
                    'options'=>array(
                        'min'=>0, //minimum value for slider input
                        'max'=>1000, // maximum value for slider input
                        // on slider change event
                        'slide'=>'js:function(event,ui){$("#slider1").val(ui.value);}',
                    ),
                    // slider css options
                    'htmlOptions'=>array(
                        'style'=>'width:200px;'
                    ),
                ));
                ?>
                </div>
                <div class="row" id="rowLeft">
                <?php
                $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                    'name'=>'price2',
                    'value'=>1000,// default selection
                    'event'=>'change',
                    'options'=>array(
                        'min'=>0, //minimum value for slider input
                        'max'=>1000, // maximum value for slider input
                        // on slider change event
                        'slide'=>'js:function(event,ui){$("#slider2").val(ui.value);}',
                    ),
                    // slider css options
                    'htmlOptions'=>array(
                        'style'=>'width:200px;
                        '
                    ),
                ));
                ?>
                </div>

                <div class="row" id="rowLeft">
                    <?php echo $form->labelEx($searchForm, 'price1'); ?>
                    <?php echo $form->textField($searchForm, 'price1',array('id'=>'slider1', 'value'=>'0')); ?>
                    <?php echo $form->error($searchForm, 'price1'); ?>
                </div>

                <div class="row" id="rowLeft">
                    <?php echo $form->labelEx($searchForm, 'price2'); ?>
                    <?php echo $form->textField($searchForm, 'price2', array('id'=>'slider2', 'value'=>'1000')); ?>
                    <?php echo $form->error($searchForm, 'price2'); ?>
                </div>

                <div class="row" id="rowLeft">
                    <?php echo $form->labelEx($searchForm, 'info'); ?>
                    <?php echo $form->textField($searchForm, 'info'); ?>
                    <?php echo $form->error($searchForm, 'info'); ?>
                </div>

                <div class="row" id="rowLeft">
                    <?php echo $form->labelEx($searchForm, 'authorName'); ?>
                    <?php echo $form->textField($searchForm, 'authorName'); ?>
                    <?php echo $form->error($searchForm, 'authorName'); ?>
                </div>

                <div class="row buttons" style="text-align: center">
                    <?php echo CHtml::submitButton('Поиск', array('class'=>'btnSearch')); ?>
                </div>

                <?php $this->endWidget(); ?>
           </div>

<!--        //блок справа от строки-->
        <div class="headerShop">
            <div class="headerShopLeft">
                <?=CHtml::openTag('span', array('class'=>'headerPhoneNumber'))?>
                8 800 555 11 11
                <?=CHtml::closeTag('span')?>
                <?=CHtml::openTag('span', array('class'=>'headerPhoneDesc'))?>
                (Звонок&nbsp;по&nbsp;России&nbsp;бесплатный)
                <?=CHtml::closeTag('span')?>
            </div>
        </div>
</div>

<!--///блок для панели корзины и панели пользователя-->
<div id="cartUserPanel">
<!--    ///блок корзины с ценой , картинкой и ссылкой-->
    <div class="cartPart">
        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $urlImage, '', array('class'=>'smallImageCartIconLink')), array('Cart/LinkToCart/'), array('Class', ''));
        $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                array('label'=>$cartName, 'url'=>array('/Cart/LinkToCart'),
                    'itemOptions'=>array('class'=>'cartName'),
                    'linkOptions'=>array('class'=>'cartName'),
                ),),));
        ?>
        <?=CHtml::openTag('span', array('class'=>'cartPrice'))?>
        <?=CHtml::closeTag('span')?>
    </div>


   <!--панель пользователя до наведения на него-->

          <?php
  echo CHtml::openTag('span', array('class'=>'smallPanelUserBeforeHover'));
          echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/user_reg.png', '', array('class'=>'imgUser', 'alt'=>'this is alt tag of image'));
          ///пользователь зарегестрированный
          echo CHtml::openTag('p', array('class'=>'textName'));
          echo 'Пользователь:';
          echo CHtml::closeTag('p');

          if (!Yii::app()->user->isGuest)
          {
             ?>
             <div class="userNameCenter">
                 <?=CHtml::openTag('p', array('class'=>'userName'))?>
                 <?=Yii::app()->user->name?>
                 <?=CHtml::closeTag('p')?>
              </div>
             <div class="userShowInfo">
                 <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/close.png',
                     'this is alt tag of image', array('class'=>'userCloseLoginModal')
                 );
                 echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/user_reg.png',
                     'this is alt tag of image', array('class'=>'imgUserModal')
                 );
                 ?>
                 <?=CHtml::openTag('p', array('class'=>'textNameModal'))?>
                 Пользователь:
                 <?=CHtml::closeTag('p')?>
                 <?=CHtml::openTag('p', array('class'=>'userNameP'))?>
                 <?=Yii::app()->user->name?>
                 <?=CHtml::closeTag('p')?>
                 <?php echo CHtml::link(CHtml::button('Личный Кабинет', array('class'=>'userPrivateOfficeModal')), array('user/PersonalAccount'));?>
                 <?php echo CHtml::link(CHtml::button('Выйти', array('class'=>'userPrivateOfficeExitModal')), array('site/logout'));?>
             </div>
        <?php
          }
          ///пользователь не  зарегестрированный
        else{
              ?>
                <?=CHtml::openTag('p', array('class'=>'userNameUnregText'))?>
                Неизвестный
                <?=CHtml::closeTag('p')?>

               <div class="userShowInfo">

                   <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/close.png',
                       'this is alt tag of image', array('class'=>'userCloseLoginModal')
                   ); ?>

                   <div class="userNameUnregCenter">
                       <?=CHtml::openTag('p', array('class'=>'userNameUnreg'))?>
                       Вы зашли как незарегестрированный пользователь.
                       <?=CHtml::closeTag('p')?>

                       <?=CHtml::openTag('p', array('class'=>'userNameUnreg'))?>
                           <?php echo CHtml::tag('span', array('id'=>'enterModalID'), "Войдите");?>
                           или
                           <?php echo CHtml::link(CHtml::tag('span', array('id'=>'regModalID'), "Зарегестрируйтесь"), array('user/registration')); ?>
                       <?=CHtml::closeTag('p')?>
                   </div>
               </div>
        <?php
           }
   echo CHtml::closeTag('span');
          ?>

    <script>
        ///модальное окно Логин
        $("#enterModalID").click(function(){
            $("#loginDialog").toggle();
            $("#loginDialog").dialog("open");
            return false;
        });
        $(".closeUserLogin").click(function(){
            $("#loginDialog").toggle();
        });
    </script>
</div>

</div>






<!-- МОДАЛЬНОЕ ОКНО после регистрации где можно перейти в ЛК или продолжать работу уже зарегенным-->

<div class="modalUserCabinet">
    <?php echo CHtml::openTag('table', array('class'=>'tableCabinet'));?>


    <?=CHtml::openTag('tr')?>
         <?=CHtml::openTag('td')?>
               <?=CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/logo/user_reg.png', '', array('class'=>'imageUserCabinet')));?>
         <?=CHtml::closeTag('td');?>
             <?=CHtml::openTag('td')?>
               <?php
               echo CHtml::openTag('table');
               ?>
                 <?=CHtml::openTag('tr')?>
               <?php echo CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>Логин  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                                <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uLogin'));?>
                            <?=CHtml::closeTag('td')?>
                            <?=CHtml::closeTag('td')?>
                 <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>ФИО  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                                <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uName'));?>
                            <?=CHtml::closeTag('td')?>   <?=CHtml::closeTag('td')?>
                 <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>Телефон  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                            <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uTelefon'));?>
                            <?=CHtml::closeTag('td')?>  <?=CHtml::closeTag('td')?>
                 <?=CHtml::openTag('tr')?><?=CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>Эмейл  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                            <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uMail'));?>
                            <?=CHtml::closeTag('td')?>  <?=CHtml::closeTag('td')?>
                  <?=CHtml::openTag('tr')?><?=CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>Адрес  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                            <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uAdress'));?>
                            <?=CHtml::closeTag('td')?> <?=CHtml::closeTag('td')?>
                 <?=CHtml::openTag('tr')?><?=CHtml::openTag('td', array('class'=>'tdInfoAbout'))?>Количество заказов  <?=CHtml::closeTag('td')?> <?=CHtml::openTag('td')?>  <?=CHtml::closeTag('td')?>
                            <?=CHtml::openTag('td')?>
                            <?php echo CHtml::textField('', '', array('class'=>'userNumberOrder', 'id'=>'uNumberOrder'));?>
                            <?=CHtml::closeTag('td')?>  <?=CHtml::closeTag('td')?>
              <?php
              echo CHtml::closeTag('table');
              ?>
         <?=CHtml::closeTag('td')?>
    <?=CHtml::closeTag('tr')?>
    <?php echo CHtml::closeTag('table');?>

        <?php
        echo CHtml::button('Вернуться к сайту', array('onclick'=>'location.reload();', 'class'=>'closeModalUserRegBackToSite', 'id'=>'clickDownToSite'));
        echo CHtml::link(CHtml::button('В личный кабинет->', array('class'=>'toPersonalAccount')), array('User/PersonalAccount'));
        echo CHtml::image(Yii::app()->request->baseUrl.'/images/close.png', 'this is alt tag of image', array('click'=>'location.reload();', 'class'=>'closeModalUserCabinet'));
        ?>
    <script>
        ////это закрытие модального окна пользователя и дальше перегрузка
       $('.closeModalUserCabinet').click(function(){
            location.reload();
        });
    </script>
</div>

	<?php echo $content; ?>

	<div class="clear"></div>
</div>
</body>
</html>
