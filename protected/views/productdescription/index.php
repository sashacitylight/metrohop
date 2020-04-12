<?php
$this->pageTitle = Yii::app()->name . ' - More information about product';

$includeJavascriptFromFile = new CHelperMethods();
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/product_detailed_information.js');
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/product_viewed.js');
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/photo_gallery.js');
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/navigation.js');
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/footer.js');
$includeJavascriptFromFile->includeJavascript('/scripts/product_description/modal_buy_product.js');
?>


<!--///навигация-->
<div class="navigationSubCategoriesWrapper">
    <?php
    $arrayLinks = array();
    $arrayLinks[$model->SubCategory->Category->name] = array('site/ShowProductsSortingByCategories', 'id'=>$model->SubCategory->Category->id);
    $arrayLinks[$model->SubCategory->Name] = array('site/ShowProductsSortingBySubCategories', 'id'=>$model->SubCategory->id);
    $arrayLinks['<-Все категории->'] = array('site/ShowAllCategories');
    //хлебные крошки Категория->ПодКатегория->Все категории
    if(isset($this->breadcrumbs)):
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>$arrayLinks,
        'homeLink'=>false,
        'separator'=>' -> ',
        'htmlOptions'=>array('class'=>'productCBreadcrumbs')
    ));
    endif;
    ?>
</div>


<!--///верхний блок -->
<div class="upperMainDivWrapper">

<!--невидимый блок для покупки-->
<!--появляется при добавлении в корзину с формы-->
<div class="modalBuyProductToCartWrapper" id="modalBuyProductToCartWrapperID">
    <?php echo CHtml::image(Yii::app()->baseUrl.'/images/close.png', 'this is alt tag of image', array('class'=>'crossCloseModalProductToCart'));?>

    <div class="modalBuyProductToCart" id="modalBuyProductToCartID">

        <div id="modalBuyProductToCartInternalBlock">

            <div id="cartModalError">
                <p>Корзина переполнена! Перейдите в корзину, чтобы очистить !</p>
            </div>

        <!--информация о текущем товаре который только добавили-->
                <div class="upperDivCurrentBuyProduct">

                    <div class="divImgLettersLinkToCartLeft">
                      <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/is_in_cart.png', '', array('class'=>'imgLinkToCart'));?>
                      <?php echo CHtml::link('Перейти в корзину', array('Cart/LinkToCart'));?>
                    </div>

                    <?=CHtml::openTag('ul', array('id'=>'productCurrentPanel'))?>
                       <?php
                       echo CHtml::openTag('li');
                       echo CHtml::openTag('p', array('class'=>'image'));
                         echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $model->ProductArtUrl, 'Template preview'), array('http://templatica.com'));
                       echo CHtml::closeTag('p');
                       echo CHtml::openTag('h3');
                            echo $model->Title.'('.$model->Price.'$)';
                       echo CHtml::closeTag('h3');
                       echo CHtml::openTag('p', array('id'=>'propFirstSecond'));
                       echo CHtml::openTag('p', array('class'=>'textNumberPriceTotalPrice'));

                       ///форма заказа текущего товара вверху
                       echo CHtml::form(Yii::app()->baseUrl.'/Order/Order', 'GET');
                            echo CHtml::numberField('numberValue', '1', array('id'=>'modalNumber', 'min'=>'1', 'max'=>'9999', 'maxlength'=>'3'));
                            echo CHtml::hiddenField('productIDValue', $model->id);
                            echo CHtml::hiddenField('propertyIDValue', '', array('id'=>'modalProperty'));

                       echo CHtml::submitButton('Заказать');
                       echo CHtml::endForm();

                       echo CHtml::closeTag('li');
                        ?>
                     <?=CHtml::closeTag('ul')?>

                </div>
            <?php ?>

<!--            ///блок товаров корзины внизу-->
            <h1 class="letteringUnderCart">В корзине</h1>

            <ul id="bottomPanelProducts">
                <?php
              ///список товаров которые находятся в корзине
                for($i=0;$i<10;$i++){
                    echo CHtml::openTag('li', array('class'=>'liOneProductPanelNumber'.$i));
                    echo CHtml::openTag('p', array('class'=>'image'));

                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/eazy_slider/images/01.jpg', 'Template preview', array('class'=>'imgSlider'.$i)), array('http://templatica.com'));
                    echo CHtml::closeTag('p');

                    echo CHtml::openTag('h3', array('id'=>'propertyFirstPropertySecondNumber'.$i));
                    echo CHtml::closeTag('h3');

                    echo CHtml::hiddenField('price', '', array('id'=>'modalPrice'.$i));

                    echo CHtml::openTag('p', array('id'=>'inscriptionPropertyFirstSecondNumber'.$i, 'class'=>'info'));
                    echo CHtml::closeTag('p');

                    echo CHtml::openTag('p', array('class'=>'number'.$i));
                    echo CHtml::closeTag('p');

                    ///форма заказа товара из списка товаров корзины внизу
                    echo CHtml::form(Yii::app()->baseUrl.'/Order/Order', 'GET');
                        echo CHtml::hiddenField('productIDValue', 'productID', array('id'=>'modalID'.$i));
                        echo CHtml::hiddenField('propertyIDValue', '', array('id'=>'modalProperty'.$i));

                        echo '<div class="buyModalJquery">';
                        echo CHtml::numberField('numberValue', '1', array('id'=>'modalNumber'.$i, 'class'=>'modalNumberClick', 'min'=>'1', 'max'=>'9999', 'maxlength'=>'3'));
                        echo CHtml::submitButton('Заказать', array('modalNumberOrder'=>$i));
                        echo '</div>';

                    echo CHtml::endForm();
                    echo CHtml::closeTag('li');
                }
                ?>
            </ul>

        </div>
    </div>
</div>
<!--конец блока который появляется при добавлении в корзину-->




<!--   левый блок-->
    <div class="leftCommonProductsThisCategoryPanel">
       <?php ////картинка для скидки
       $cProductProperties = new CProductProperties();
       $imgHrefDiscount = $cProductProperties->getProductImageDiscount($model->pDiscount);
        if (isset($imgHrefDiscount)){
            echo CHtml::image($imgHrefDiscount, '', array('class'=>'imgDiscountLeftCommonProductsThisCategoryPanel'));
           }
       ?>
        <!--        //большая картинка-->
        <div  class="imgBigWrapper">
            <?php
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$model->ProductArtUrl, '', array('src'=>Yii::app()->baseUrl.$model->ProductArtUrl, 'class'=>'imgBigInleftCommonProductsThisCategoryPanel', 'data-zoom-image'=>Yii::app()->baseUrl.$model->ProductArtUrl)),
              array(Yii::app()->baseUrl . $model->ProductArtUrl), array('class'=>'zoom'));
            ?>
        </div>
<!--    ///надпись под картинкой-->
        <div class="imgZoomIn">
            <?php echo CHtml::image(Yii::app()->request->baseUrl .'/images/logo/small_zoom.png', '', array('class'=>'simpleZoom'));
            echo CHtml::openTag('span', array('id'=>'zoomInTips'));
            echo CHtml::closeTag('span');
            ?>
        </div>

        <!--блок со списком картинок с галереи-->
      <div class="smallImgsListGalleryPanel">
          <?php
          echo CHtml::openTag('span', array('id'=>'zoomInTips'));
               echo ' Нажмите на маленькую картинку чтобы увеличить.';
          echo CHtml::closeTag('span');
          ?>

            <!--Первая 1 картинка с таблицы Products основная маленькая-->
            <div class="pictureWrapper">
                <div class="smallPictWrapperSize">
                <?php
                echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $model->ProductArtUrl, '', array('class'=>'smallImg')),
                     array(Yii::app()->request->baseUrl . $model->ProductArtUrl), array('class'=>'fancybox', 'data-fancybox-group'=>'gallery'));?>
               </div>
            </div>

            <!--Список картинок с галереи данного товара-->
            <?php
            if (isset($pictureModel)){
            foreach($pictureModel as $pictures){
            ?>
            <div class="pictureWrapper">
                <div class="smallPictWrapperSize">
                <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$pictures->picUrl, '', array('class'=>'smallImg')),
                    array(Yii::app()->baseUrl.$pictures->picUrl), array('class'=>'fancybox', 'data-fancybox-group'=>'gallery'));?>
               </div>
            </div>
            <?php
            }
            echo CHtml::link(CHtml::tag('span', array('id'=>'linkToGallery'), "Перейти в галерею->"), array('Gallery/index', 'id'=>$model->id));
            }
            ?>
      </div>



        <?php
        //виджет для просмотра товаров в корзине и возможностью заказа
        if(isset($cartModel)&&!empty($cartModel)){
            ?>
            <div class="productsFromCartPanel">
                <!-- Start photosgallery-vertical -->
                <div class="sliderkit photosgallery-vertical">

                    <div class="sliderkit-nav">
                        <div class="sliderkit-nav-clip" id="n_c_s">
                            <?php
                            echo CHtml::openTag('ul');
                            foreach($cartModel as $key=>$cartModels){
                                echo CHtml::openTag('li');
                                echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$cartModels['imgUrl'], '[Alternative text]'), array('#'), array('rel'=>'nofollow', 'title'=>'[link title]'));
                                echo CHtml::closeTag('li');
                            }
                            echo CHtml::closeTag('ul')?>
                        </div>
                        <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous</span></a></div>
                        <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next</span></a></div>
                    </div>

                    <?php

                        foreach($cartModel as $key=>$cartModels)
                        {
                            //проверка 2 характеристик на пустоту
                            $feature1 = $cartModels['property1'];
                            $feature2 = $cartModels['property2'];
                            if($feature1 == 'noProperty1'){
                                $feature1 = '';
                            }else{
                                $feature1 = '['.$feature1.'/';
                            }
                            if($feature2 == 'noProperty2'){
                                $feature2 = '';
                            }else{
                                $feature2 = $feature2.']';
                            }
                            $commonString = $cartModels['title'].' ('.$cartModels['price'].'$)'.$feature1.$feature2.'';
                            ?>
<!--                            панель под картинками выбора товара-->
                            <div class="sliderkitPanels">
                            <div class="sliderkit-panel">
                                <?php echo CHtml::image(Yii::app()->baseUrl.$cartModels['imgUrl'], '', array('id'=>'cartImgBig'));?>
                                <div class="sliderkit-panel-textbox">
                                  <div class="sliderkit-panel-text">
                                  <?php
                                  echo CHtml::form(Yii::app()->baseUrl.'/index.php/Order/Order', 'GET');

                                    echo CHtml::openTag('h4', array('class'=>'commonStringProductTitlePriceFeatures'));
                                    echo $commonString;
                                    echo CHtml::closeTag('h4');

                                    echo CHtml::numberField('numberValue', $cartModels['number'], array('id'=>'modalNumber', 'min'=>'1', 'max'=>'9999', 'maxlength'=>'3'));
                                    echo CHtml::openTag('p');
                                        echo CHtml::submitButton('Заказать', array('class'=>'orderProductButton'));
                                    echo CHtml::closeTag('p');

                                    echo CHtml::link(CHtml::button('В корзину->', array('class'=>'linkToCartButton')), Yii::app()->baseUrl.'/index.php/Cart/LinkToCart');

                                    echo CHtml::hiddenField('productIDValue', $cartModels['id'], array());
                                    echo CHtml::hiddenField('sliderNumberPrice', $cartModels['price'], array('id'=>'modalPrice'));

                                    echo CHtml::hiddenField('propertyIDValue', $cartModels['propertyID'], array('id'=>'modalProperty'));


                                  echo CHtml::endForm();
                                  ?>

                                 </div>
                                 <div class="sliderkit-panel-overlay">
                                 </div>
                               </div>
                            </div>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<script>
var div = document.getElementById("baseUrlToJS");
var baseUrl = div.textContent;
///добавление товара в корзину
function addToCart(){
    var data = $("#buyForm").serialize();
    //считываем с корзины значения и добавляем количество++
    var cartClass = $('.cartName a').text();
    var cartNumberProducts = parseInt(cartClass.replace(/\D+/g,""));
    cartNumberProducts++;
    $('.cartName a').empty();
    $('.cartName a').text('Корзина('+cartNumberProducts.toString()+')');

    var imgSrc = baseUrl+'/images/cart/basket-full.png';
    $(".smallImageCartIconLink").attr("src", imgSrc);

    ///открываем модальное окно
    $('#overlay').show();
    $('#modalBuyProductToCartWrapperID').show(300);

    $.ajax({
        type: 'POST',
        url: '<?php echo Yii::app()->createAbsoluteUrl("cart/AddToCartAjaxModalWindow"); ?>',
        data: data,
        success:function(result){
            //результат с cookie Cart разбираем
            var cart = JSON.parse ( result );

            //количество элементов в массиве
            var arrAfterSplit = result.split('}');
            var numberProducts = arrAfterSplit.length-1;

            for(var i=0;i<10;i++){
                var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                $(liOneProductPanelNumber).show();
                $("#pagination").show();
                $(liOneProductPanelNumber).css("opacity", "1");
            }

            ////создаём слайдер с пустыми картинками
            $("ol#pagination li:nth-child(5)").show();
            $("ol#pagination li:nth-child(4)").show();
            $("ol#pagination li:nth-child(3)").show();
            $("ol#pagination li:nth-child(2)").show();
            switch (numberProducts)
            {
                case 0:
                    for(var i=0;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $("#pagination").hide();
                        $("#pagination").css("opacity", "0.2");
                    }
                    break
                case 1:
                    for(var i=1;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $("#pagination").hide();
                        $("#pagination").css("opacity", "0.2");
                    }
                    break
                case 2:
                    for(var i=2;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();

                        $("#pagination").css("opacity", "0.2");
                        $("#pagination").hide();
                        $("ol#pagination li:nth-child(5)").hide();
                        $("ol#pagination li:nth-child(4)").hide();
                        $("ol#pagination li:nth-child(3)").hide();
                        $("ol#pagination li:nth-child(2)").hide();

                    }
                    break
                case 3:
                    for(var i=3;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("#pagination").css("opacity", "1");
                        ///скрываем pager
                        $("ol#pagination li:nth-child(5)").hide();
                        $("ol#pagination li:nth-child(4)").hide();
                        $("ol#pagination li:nth-child(3)").hide();
                        $("ol#pagination li:nth-child(2)").hide();
                        $("#pagination").hide();
                    }
                    break
                case 4:
                    for(var i=4;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("#pagination").css("opacity", "1");
                        $("ol#pagination li:nth-child(5)").hide();
                        $("ol#pagination li:nth-child(4)").hide();
                    }
                    break
                case 5:
                    for(var i=5;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("ol#pagination li:nth-child(5)").hide();
                        $("ol#pagination li:nth-child(4)").hide();
                    }
                    break
                case 6:
                    for(var i=6;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("ol#pagination li:nth-child(5)").hide();
                        $("ol#pagination li:nth-child(4)").hide();
                    }
                    break
                case 7:
                    for(var i=7;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("ol#pagination li:nth-child(5)").hide();
                    }
                    break
                case 8:
                    for(var i=8;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(liOneProductPanelNumber).hide();
                        $(liOneProductPanelNumber).css("opacity", "0");
                        $("ol#pagination li:nth-child(5)").hide();
                    }
                    break
                case 9:
                    for(var i=9;i<10;i++){
                        var liOneProductPanelNumber = ".liOneProductPanelNumber"+ i.toString();
                        $(li_slider).hide();
                        $(li_slider).css("opacity", "0");
                        $('#cartModalError').show();
                    }
                    break
            }
            ////создали слайдер с пустыми картинками
            //////////заполняем слайдер в цикле

            //// запись в 1 форму вверху
            $('#modalID').attr("value", cart[0].id);
            $('#modalPrice').attr("value", cart[0].price);
            $('#modalNumber').attr("value", cart[0].number);

            if(cart[0].property1 == 'noProperty1'){
                cart[0].property1 = '';
            }
            else
            {
                $('#modalProperty').attr("value", cart[0].propertyID);
                $("#propFirstSecond").text(cart[0].property1+" / "+cart[0].property2);
            }

            ///заполнение созданных пустых форм товаров
            for (var i = 0; i < result.length; i++) {
                var linkToImg = baseUrl+cart[i].imgUrl;
                if(cart[i].property1 == 'noProperty1'){
                    cart[i].property1 = '';
                }
                if(cart[i].property1 == 'nomodel'){
                    cart[i].property1 = '';
                }

                ////заполняем тру данные невидимые дивы
                $('#modalID'+ i.toString()).attr("value", cart[i].id);
                $('#modalPrice'+ i.toString()).attr("value", cart[i].price);

                $('#m_model'+ i.toString()).attr("value", cart[i].property1);

                $('#m_color'+ i.toString()).attr("value", cart[i].property2);

                $('#modalNumber'+ i.toString()).attr("value", cart[i].number);

                $('#modalProperty'+ i.toString()).attr("value", cart[i].propertyID);

                var imgSlider = "#imgSlider"+ i.toString();
                var sliderSmallID = "#small_img_slider"+ i.toString();

                $(imgSlider).attr("src", linkToImg);
                $(sliderSmallID).attr("src", linkToImg);

                num = parseInt(imgSlider.replace(/\D+/g,""));
                //показать дивы в которых есть картинки

                num = parseInt(imgSlider.replace(/\D+/g, ""));
                var str ='.imgSlider'+num.toString();
                $(str).attr("src", linkToImg);

                //заполнение названия/цены
                var belowPropertyFirstSecondClass="#propertyFirstPropertySecondNumber"+ i.toString();
                var belowPropertyFirstSecondText=cart[i].title+'('+cart[i].price+'$)';
                $(belowPropertyFirstSecondClass).text(belowPropertyFirstSecondText);

                //заполнение property1/property2
                var property1 = cart[i].property1;
                var property2 = cart[i].property2 ;
                var propertyFirstSecond = "#inscriptionPropertyFirstSecondNumber"+ i.toString();;

                var propertyFirstSecondText;
                if(cart[i].property2 != 'noProperty2'){
                    propertyFirstSecondText = cart[i].property1+' / '+ cart[i].property2;
                }
                else
                {
                    propertyFirstSecondText = cart[i].property1;
                }

                if (property1 == 'nomodel'){
                    $(propertyFirstSecond).css("opacity", "0");
                }
                else
                {
                    $(propertyFirstSecond).css("opacity", "1");
                    $(propertyFirstSecond).text(propertyFirstSecondText);
                }

                ///количество
                var numberProductClass = ".number"+ i.toString();
                var totalPrice = cart[i].number*cart[i].price;
                totalPrice = parseFloat(totalPrice.toFixed(3));
                totalPrice = totalPrice.toString();
                var text = cart[i].number + ' (шт) - ' + totalPrice + '($)';
                $(numberProductClass).text(text);
            };
        },
        error: function(data) { // if error occured
            alert('Попробуйте ещё раз!');
        },
        dataType:'html'
    });
}
</script>
<script>
    //изменить поле рекомендации1
    function messageSecondHide()
    {
        $("#errorSecond").css("background-color", "lightgrey");
        $("#errorSecond").css("opacity", "0.3");
    }
    //изменить поле рекомендации2
    function messageFirstHide()
    {
        $("#errorFirst").css("background-color", "lightgrey");
        $("#errorFirst").css("opacity", "0.3");
    }
</script>
    <!--   центральный блок верхний-->
    <div class="topCenterPanel">
        <?php
        echo CHtml::openTag('p');
        echo $model->Title.'. Доставка по низкой цене';
        echo CHtml::closeTag('p');
        echo CHtml::openTag('p');
        echo  'Заказа(ов) : '.$model->pNumberOrders.' шт. Отзывов : '.$countComments.'.';
        echo ' Рейтинг : '.CProductProperties::getStars($averageRating);
        echo CHtml::closeTag('p');
        ?>
    </div>

<!--///центральный блок ниже верхнего-->
<div class="centerPanel">
    <div id="centerSmallPanelID" class="centerSmallPanel">
        <?php
        //если есть скидка
        ///разного рода цены
        if  ($model->pDiscount){ ?>
            <?=CHtml::openTag('dl', array('class'=>'productPriceCurrent'));?>

            <?=CHtml::openTag('dt');?>
            <?='Цена со скидкой:'?>
            <?=CHtml::closeTag('dt')?>
                <?=CHtml::openTag('dd')?>
                    <div>
                        <div id="productPrice">
                            <?=CHtml::openTag('b')?>
                            <?=CHtml::tag('span');?>
                            <?=CHtml::tag('span', array('class'=>'priceCenterPanelColor'), $model->Price." у.е.");?>
                            <?=CHtml::closeTag('b')?>
                            <?=CHtml::tag('span', array(), "/  шт.")?>
                        </div>
                        <?=CHtml::tag('span', array(), "  Осталось дней: 12 ");?>
                    </div>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>


            <?=CHtml::openTag('dl', array('class'=>'productPriceLast'))?>
                <?=CHtml::tag('dt', array(), "Начальная цена:");?>
                <?=CHtml::openTag('dd')?>
                    <div>
                        <div id="productPrice">
                            <?=CHtml::openTag('b')?>
                            <?=CHtml::tag('span', array(), "");?>
                                 <?=CHtml::tag('span', array('id'=>'priceCenterPanelBegin', 'class'=>'priceCenterPanelColor',
                               ),
                                CProductProperties::getOldProductPrice($model->Price, $model->pDiscount)."/шт у.е.");?>
                            <?=CHtml::closeTag('b')?>
                        </div>
                    </div>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>


            <?=CHtml::openTag('dl', array('class'=>'productPriceWholesale'))?>
            <?=CHtml::tag('dt', array(), "Оптовая цена:");?>

                 <?=CHtml::openTag('dd')?>
                    <div>
                        <div id="productPrice">
                            <?=CHtml::openTag('b')?>
                            <?=CHtml::tag('span', array('class'=>'priceCenterPanelColor'), CProductProperties::getNewProductPriceWholeSale($model->Price, $model->pDiscount."/шт у.е."))?>
                            <?=CHtml::closeTag('b')?>
                            <?=CHtml::tag('span', array('id'=>'spanSize'), "y.e / 10 шт.");?>
                        </div>
                    </div>

                    <div>
                        <?=CHtml::tag('span', array(), "Оптовая цена");?>
                    </div>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>

        <?php
        }
        ////если скидки нет
        else
        {
            ?>
            <?=CHtml::openTag('dl', array('class'=>'productPriceCurrent'))?>

            <?=CHtml::tag('dt', array(), "Цена:");?>
                <?=CHtml::openTag('dd')?>
                    <div>
                        <div id="productPrice">
                          <?=CHtml::openTag('b')?>
                            <?=CHtml::tag('span', array(), $model->Price." у.е.")?>
                            <?=CHtml::closeTag('b')?>
                            /  шт.
                        </div>
                        <?=CHtml::openTag('ul', array(), " Осталось дней: 1")?>
                    </div>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>
        <?php
        }
        ?>
    </div>






<!--блок с полями для выбора и формой для заказа или добавления в корзину-->
    <div class="centerSmallPanel" id="centerSmallPanelHeight">
        <div id="centerSmallPanelHeightNew">
            <dl>
                <?=CHtml::openTag('dt')?>
                   Доставка:
                <?=CHtml::closeTag('dt')?>
                <?=CHtml::openTag('dd')?>
                    <div class="utilClearfix">
                        <?php if (isset($model->Firm)){?>
                        <span><b><?=$model->Firm->firmPrice;?> у.е.</b><span> в </span></span>
                        <span><?=$model->Firm->firmService;?></span></a>
                    </div>
                    <div class="utilClearfix"><?=$model->Firm->firmTime;?></div>
                    <?php } ?>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>

                <!--начало формы покупки выбора характеристики-->
                <div class="form">
                    <?php
                    $modelBuyForm->productIDValue = $model->id;

                    $form = $this->beginWidget('CActiveForm', array(
                        'id'=>'buyForm',
                        'method'=>'post',
                        'action' => array('/order/order'),
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'clientOptions'=>array(
                            'validateOnChange'=>false,
                            'validateOnSubmit'=>false
                        ),
                        'enableAjaxValidation'=>false,
                    )); ?>

                    <?php echo $form->errorSummary($modelBuyForm); ?>

                    <?php   //если есть характеристики товара
                    if($featureFirstIs):
                    ?>
                        <div class="row">
                            <?php echo $form->labelEx($modelBuyForm, 'propertyIDValue', array('class'=>'labelBuyForm')); ?>
                            <?php echo $form->dropDownList($modelBuyForm, 'propertyIDValue', ProductPropertiesList::getListProperty1Property2($model->id), array('onclick'=>'messageFirstHide()')); ?>
                            <?php echo $form->error($modelBuyForm, 'propertyIDValue'); ?>
                        </div>
                        <script>

                        </script>
                        <?=CHtml::closeTag('dd')?>
                            <?=CHtml::tag('span', array('style'=>'display: block;', 'id'=>'errorFirst', 'class'=>'skuMessageError'), "Пожалуйста, выберите характеристику товара");?>
                        <?=CHtml::closeTag('dl')?>
                    <?php endif;?>
                    <div class="row">
                        <?php echo $form->hiddenField($modelBuyForm, 'productIDValue'); ?>
                        <?php echo $form->error($modelBuyForm, 'productIDValue'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($modelBuyForm, 'numberValue', array('class'=>'labelBuyForm')); ?>
                        <?php echo $form->NumberField($modelBuyForm, 'numberValue', array(
                            'onclick'=>'messageSecondHide()', 'id'=>'leftProductInfoID', 'min'=>'1', 'value'=>1, 'max'=>'9999', 'maxlength'=>'5', 'autocomplete'=>'off')); ?>
                        <?php echo $form->error($modelBuyForm, 'numberValue'); ?>
                        <script>


                        </script>
                        <?=CHtml::closeTag('dd')?>
                            <?=CHtml::tag('span', array('style'=>'display: block;', 'id'=>'errorSecond', 'class'=>'skuMessageError'), "Пожалуйста, выберите Количество");?>
                        <?=CHtml::closeTag('dl')?>
                    </div>

                    <?php echo CHtml::submitButton('Заказать', array('class'=>'formRegistrationButton')); ?>
                    <?php echo CHtml::Button('В корзину', array('onclick'=>'addToCart()', 'class'=>'formRegistrationButton')); ?>
                    <?php $this->endWidget(); ?>
                </div>
                <!--конец формы покупки выбора характеристики-->
                <dl>
                    <?=CHtml::openTag('dt')?>
                    Общая стоимость::
                    <?=CHtml::closeTag('dt')?>
                    <?=CHtml::tag('span', array('class'=>'skuMessageError', 'id'=>'otstup', 'style'=>'display: block;'),
                        "Зависит от выбранных характеристик товара");?>
                     <?=CHtml::closeTag('dl')?>
        </div>
    </div>
    <!--    информационный блок -->
    <div id="centerSmallPanelHeight" class="centerSmallPanel"><div id="sellerPromiseList" style="display: block;">
            <dl class="utilClearfix">
                <?=CHtml::openTag('dt')?>
                Возврат товара:
                <?=CHtml::closeTag('dt')?>

                <dd><div id="marg"><img id="protectionString" class="simpleZoom" src="<?=Yii::app()->request->baseUrl .'/images/logo/bird.png'?>"/> Если товар не соответствует описанию, Вы можете вернуть товар, оплатив стоимость обратной пересылки, или оставить товар себе и договориться о компенсации с продавцом. </div></dd>
            <?=CHtml::closeTag('dl')?>
            <dl class="utilClearfix">
                <?=CHtml::openTag('dt')?>
                Обязательства продавца:
                <?=CHtml::closeTag('dt')?>
                <?=CHtml::openTag('dd', array('class'=>'utilClearfix'))?>
                    <div>
                        <?=CHtml::openTag('a')?>
                            <?php echo CHtml::image(Yii::app()->request->baseUrl .'/images/logo/bird.png', '', array('id'=>'protectionString', 'class'=>'simpleZoom'));?>
                            <?=CHtml::openTag('em')?>Доставка в срок 27 дн. <?=CHtml::closeTag('em')?>
                            <div class="imgTimeDelivery">
                            <?php echo CHtml::image(Yii::app()->request->baseUrl .'/images/logo/bird.png', '', array('id'=>'protectionString', 'class'=>'simpleZoom'));?>
                            Возврат полной стоимости, если товар не получен в течение 27 дней
                            </div>
                        <?=CHtml::closeTag('a')?>
                    </div>
                <?=CHtml::closeTag('dd')?>
            <?=CHtml::closeTag('dl')?>

        </div>
    </div>
<!--    информационный блок -->
    <div class="centerSmallPanel">
        <div>
            <div>
                <div class="buyProtectionInfo">
                    <h3 id="colorBp">Защита Покупателя</h3>
                    <ul class="utilClearfix">
                        <li>
                           <?php echo CHtml::image(Yii::app()->request->baseUrl .'/images/logo/bird.png', '', array('class'=>'simpleZoom', 'id'=>'protectionString'));?>
                            <?=CHtml::openTag('em')?>
                            Полный возврат
                            <?=CHtml::closeTag('em')?>
                            если Вы не получили товар
                        </li>
                        <li>
                            <?php echo CHtml::image(Yii::app()->request->baseUrl .'/images/logo/bird.png', '', array('class'=>'simpleZoom', 'id'=>'protectionString'));?>
                            <?=CHtml::openTag('em')?>
                           Возврат стоимости <?=CHtml::closeTag('em')?> при несоответствии товара описанию или оставляете товар себе</li>
                    <?=CHtml::closeTag('ul')?>
                </div>
            </div>
        </div>
    </div>
    </div>

<!--правый блок информации о поставщике-->
    <div id="rightDivInfo" class="rightInfo">
    <?php if (isset($model->Firm)){?>
        <div class="firmRightDetailsInfo">
            <?=CHtml::openTag('span')?>
                <?='Поставщик:'?>
            <?=CHtml::closeTag('span')?>
            <?=CHtml::openTag('p')?>
                <?=$model->Firm->firmFio?>
            <?=CHtml::closeTag('p')?>
            <?=CHtml::openTag('p')?>
               <?=$model->Firm->firmName.'('.$model->Firm->firmState.')'?>
            <?=CHtml::closeTag('p')?>
        </div>
    <?php } ?>
    <div class="firmRightDetailsInfo"> <?=$model->Firm->firmInfo;?></div>

   <div class="firmRightDetailsInfo"><p id="firmRightDetailsInfoClear">Просмотренные товары</p></div>

    <?php
    ///правый вертикальный блок просмотренных товаров
    if (isset($arrProductsViewed)){
        ?>
        <div class="firmRightDetailsInfo" id="nextProductsViewedID">
            <div class="Vwidget"  id="vjInfo">
                <a href="#" id="upInfo" class="up"></a>
                <div class="VjCarouselLite" id="carouselInfoViewed">

                    <?=CHtml::openTag('ul')?>
                        <?php
                        foreach($arrProductsViewed as $arrProductsVieweds){
                           $modelOne = Product::model()->findByPk($arrProductsVieweds);
                            if(isset($modelOne)){
                           ?>
                           <?=CHtml::openTag('li')?>
                            <div>
                            <?php
                            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$modelOne->ProductArtUrl, ''),
                                array('ProductDescription/ProductDetailedDescription', 'id'=>$modelOne->id),
                                array('class'=>'gallery', 'rel'=>'group', 'title'=>$modelOne->Title, ''=>'',));

                            echo CHtml::link('<p class="letteringRightAllCategory">'.$modelOne->Title.' ('.$modelOne->Price.'$) </p>',
                                array('ProductDescription/ProductDetailedDescription', 'id'=>$modelOne->id));?>
                            </div>
                           <?=CHtml::closeTag('li')?>
                           <?php
                            }
                           }
                        ?>
                    <?=CHtml::closeTag('ul')?>
                </div>
                <?php echo CHtml::link('', array(''), array('class'=>'down', 'id'=>'downInfo'));?>

             </div>
            </div>
        <?php } ?>
    </div>
</div>

<!--////нижний блок-->
<div class="bottomMainDivWrapper">

<!--левый вертикальный тонкий блок с подобными товарами данной ПодКатегории-->
<div class="leftCommonProductsThisCategoryPanel" id="leftCommonProductsThisCategoryPanelID">
    <?php
    echo CHtml::tag('table', array('class'=>'simpleTableGridSecond', 'id'=>'commentsTableSimilar', 'cellspacing'=>'0'));
         if (isset($similarModel)){
            $i=0;
            foreach($similarModel as $similarModels){
                ////////10 раз случайный товар данной категории
            if ($i<22){
            ?>
            <?=CHtml::openTag('tr')?>
                <?=CHtml::closeTag('tr')?>
                <?php
                echo CHtml::openTag('td');
                    echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $similarModels->ProductArtUrl, '', array('class'=>'my-foto', 'id'=>'imgSimilar', 'data-large'=>Yii::app()->baseUrl . $similarModels->ProductArtUrl),
                      Yii::app()->request->baseUrl . $similarModels->ProductArtUrl, array('class'=>'fancybox', 'data-fancybox-group'=>'gallery', 'title'=>$similarModels->Title.'  ('.$similarModels->Price.'$)')));
                echo CHtml::closeTag('td');

                echo CHtml::openTag('td');
                    echo CHtml::link($similarModels->Title, array('ProductDescription/ProductDetailedDescription/', 'id'=>$similarModels->id), array('class'=>'nameLinkSimilar'));
                    echo CHtml::openTag('p');
                         echo $similarModels->Price;
                    echo CHtml::closeTag('p');
                echo CHtml::closeTag('td');
                ?>
            <?=CHtml::closeTag('tr')?>
            <?php
                    $i++;
                }
            }
        }
         echo CHtml::closeTag('table');
        ?>
</div>
<!--конец левого вертикального тонкого блока с подобными товарами данной ПодКатегории-->

<div class="infoAboutProductMain">

    <!--меню информации-->
    <div class="infoAboutProductMainHead">
        <?php
        echo CHtml::submitButton('Описание', array('class'=>'descriptionOfProduct', 'id'=>'description'));
        echo CHtml::submitButton('Отзывы('.$countComments.')', array('class'=>'descriptionOfProduct', 'id'=>'toComments'));
        echo CHtml::submitButton('Доставка', array('class'=>'descriptionOfProduct', 'id'=>'delivery'));
        echo CHtml::submitButton('Обязательства', array('class'=>'descriptionOfProduct', 'id'=>'liabilities'));
        ?>
    </div>
    <div class="divTitle">
        Характеристики товара
    </div>
    <div  class="infoAboutProductMainDown" id="modalProductInfo">
        <?php echo '<br/>'.$model->AdditionalInfo.'<br/>';?>
    </div>


    <!-- Отзывы о товаре таблица-->
    <div class="infoAboutProductMainReviews" id="commentsID">
    <?php
    $this->widget('zii.widgets.grid.CGridView',
        array(
        'id'=>'commentsGrid',
        'dataProvider'=>$commentModel->searchWithFilter($model->id),   //////////////метод в модели
        'htmlOptions' => array('class' => 'simpleTableGridSecond', 'id'=>'commentsTableSecondID', 'cellspacing'=>'0'),
        'columns'=>array(
            'cName',
            'created'=>array(
                'name'=>'created',
                'value'=>'date("j.m.Y H:i",$data->created)',
                'filter'=> false,
            ),
            'cReiting'=> array(
                'name' => 'cReiting',
                'type' => 'html',
                'value'=>' CProductProperties::getStars($data->cReiting)',
                'htmlOptions' => array('class' => 'ratingStars'),
            ),
            'cText',
        ),
    ));

         echo CHtml::openTag('p');
            echo CHtml::link(CHtml::submitButton('... Подробнее ('.$countComments.')', array('class'=>'buttonClickToComments')), array('comments/Index', 'id'=>$model->id), array('class'=>'buttonClickToComments', 'id'=>'toComments'));
            echo CHtml::link(CHtml::submitButton('Добавить отзыв ->', array('class'=>'buttonClickToComments')), array('comments/Index', 'id'=>$model->id), array('class'=>'buttonClickToComments', 'id'=>'toComments'));
         echo CHtml::closeTag('p');
    ?>
    </div>


    <!--информационный блок обязательства -->
    <?=CHtml::tag('table', array('class'=>'simpleTableGridSecond', 'id'=>'commentsTableDelivery', 'cellspacing'=>'0'));?>
        <?=CHtml::openTag('th')?>
            Возврат товара
        <?=CHtml::closeTag('th')?>
        <?=CHtml::openTag('th')?>
            Продавец  услуг
        <?=CHtml::closeTag('th')?>
        <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td')?>Если полученный товар низкого качества или не соответствует описанию,  продавец обязуется принять возврат товара до закрытия заказа (до нажатия на "Подтвердить получение товара" или истечения срока подтверждения) и вернуть полную стоимость. Стоимость обратной пересылки оплачивается Вами. Или Вы можете оставить товар себе и договориться о возмещении стоимости напрямую с продавцом.Внимание: Если продавец предоставляет "Продлённую Защиту", Вы можете вернуть товар в течение 15 дней после закрытия заказа.<?=CHtml::closeTag('td')?>
            <?=CHtml::openTag('td')?>Если Вы не получили товар в течение 60 дней, Вы можете потребовать полного возмещения стоимости до закрытия заказа (до нажатия на "Подтвердить получение товара" или истечения срока подтверждения)Товары без дефектов также возможно вернуть до закрытия заказа (до нажатия на "Подтвердить получение товара" или истечения срока подтверждения) и вернуть полную стоимость. Стоимость обратной пересылки оплачивается покупателем. Пожалуйста, убедитесь, что товар в первоначальном состоянии и упаковке.<?=CHtml::closeTag('td')?>
        <?=CHtml::closeTag('tr')?>
    <?=CHtml::closeTag('table')?>


    <!--информационный блок Доставка-->
    <div class="delivery" id="deliveryID">
        <?=CHtml::tag('table', array('class'=>'simpleTableGridSecond', 'id'=>'commentsTableDelivery', 'cellspacing'=>'0'));?>
            <?=CHtml::openTag('th')?>
                Цвет информация :
            <?=CHtml::closeTag('th')?>
            <?=CHtml::openTag('tr')?>
                <td> 1 Мы работаем очень трудно обеспечить наилучшее представление о стиле и цвет продукта через наши фотографии и описания .<?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>
             <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td')?>2 Как Покупателю это ваша ответственность , чтобы прочитать и понять описание цвета , что и является цвет элемента, который вы покупаете. Если вы не уверены , пожалуйста, напишите разъяснений .<?=CHtml::closeTag('td')?><?=CHtml::closeTag('tr')?>
             <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td')?> 3   Реальный цвет элемента может немного отличаться от показанных картин на сайте вызвано многими факторами, такими как яркость вашей яркости монитора и света .  <?=CHtml::closeTag('td')?><?=CHtml::closeTag('tr')?>
             <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td')?> 4 Пожалуйста, выберите ваш продукт тщательно и задать все вопросы перед началом торгов . Мы любим вопросы , поэтому спросите прочь! <?=CHtml::closeTag('td')?><?=CHtml::closeTag('tr')?>
        <?=CHtml::closeTag('table')?>


        <?=CHtml::tag('table', array('class'=>'simpleTableGridSecond', 'id'=>'commentsTableDelivery', 'cellspacing'=>'0'));?>
            <?=CHtml::openTag('th')?>
                Обратная связь  :
            <?=CHtml::closeTag('th')?>
            <?=CHtml::openTag('tr')?> <?=CHtml::openTag('td')?> Если вы довольны нашим сервисом и продуктов, мы ожидаем, что положительная обратная связь и 5 звезд детального рейтинг продавца , мы будем делать то же самое для вас . если у вас возникли проблемы или не удовлетворены нашей продукции и услуг , пожалуйста, не стесняйтесь обращаться к нам в любое время перед разрешением другая обратная связь, и мы ответим Вам течение 24 часов . Спасибо! Наслаждайтесь покупками здесь ! <?=CHtml::closeTag('td')?><?=CHtml::closeTag('tr')?>
        <?=CHtml::closeTag('table')?>

    </div>


    <!--Большие картинки одна под другой-->
    <?php
    if (isset($pictureModel)){
        ?>
        <div>
            <div>
              <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$model->ProductArtUrl, '', array('class'=>'сommentImgPicture')),
                  array(Yii::app()->baseUrl.$model->ProductArtUrl), array('data-fancybox-group'=>'gallery', 'class'=>'fancybox'));
              ?>
            </div>
        </div>

        <?php
        foreach($pictureModel as $pictures){
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl . $pictures->picUrl, '', array('class'=>'сommentImgPicture')),
                Yii::app()->baseUrl . $pictures->picUrl, array('data-fancybox-group'=>'gallery', 'class'=>'fancybox'));
        }
    }
    ?>

<!--панель просмотренных товаров-->
    <div class="productsViewedWrapper">
        <div class="productsViewed">

            <script type="text/javascript">
                jQuery(document).ready(function() {
                    // Initialise the first and second carousel by class selector.
                    // Note that they use both the same configuration options (none in this case).
                    jQuery('.d-carousel .carousel').jcarousel({
                        scroll: 1
                    });
                });
            </script>

            <?php

            if (isset($arrProductsViewed)&&!empty($arrProductsViewed))
            {
                ?>
                <div id="wrapper">
                    <?=CHtml::openTag('p')?>
                    Просмотренные товары
                    <?=CHtml::submitButton('Очистить историю просмотров', array('id'=>'clearHistoryProductsViewed'))?>
                    <?=CHtml::closeTag('p')?>

                    <div class="d-carousel">
                     <?=CHtml::openTag('ul', array('class'=>'carousel'))?>

                        <?php
                        foreach($arrProductsViewed as $arrProductsVieweds){
                          $productModelOne = Product::model()->findByPk($arrProductsVieweds);
                          if(isset($productModelOne)){
                           ?>
                          <?=CHtml::openTag('li', array('class'=>'listSliderProductsViewed'))?>

                              <div class="divListSliderProductsViewed">
                               <?php
                               echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$productModelOne->ProductArtUrl, '', array('class'=>'imgProductsViewedSlider')),
                                   array('ProductDescription/ProductDetailedDescription', 'id'=>$productModelOne->id));
                               ?>
                              </div>
                              <div class="liListSliderProductsViewed">

                               <?php
                               echo CHtml::openTag('h4');
                               echo CHtml::link($productModelOne->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$productModelOne->id));
                               echo CHtml::closeTag('h4');
                               ?>

                              </div>
                              <?=CHtml::openTag('p')?>
                              <?=$productModelOne->Price.'$'?>
                              <?=CHtml::closeTag('p')?>
                          <?=CHtml::closeTag('li')?>
                        <?php
                          }
                        }
                        ?>
                     <?=CHtml::closeTag('ul')?>
                    </div>
                    <div class="clear"></div>
                </div>
      <?php } ?>

        </div>
    </div>

    <div class="delivery" id="deliveryID">
    </div>


    <script>
        var myData_way_url = div.textContent;
        ///меню скрыть
        subCategoryCategoryMenuHide();
        var div = document.getElementById("baseUrlToJS");
        //свернуть меню категорий
        var pr_id = <?=$model->id?>;
    </script>




</div>
<!--футер внизу с меню-->
<div id="productFooter">
    <div class="productFooterDownDiv">
        <?php echo CHtml::link('Все категории', array('site/ShowAllCategories'));?>
    </div>

    <div class="productFooterDownDiv">
        <?php echo CHtml::link('Корзина', array('Cart/LinkToCart'));?>
    </div>

    <div class="productFooterDownDiv">
        <?php echo CHtml::link('Главная', array('site/ShowAllCategories'));?>
    </div>

    <div class="productFooterDownDiv">
        <?php echo CHtml::link('Жалобы', array('site/contact'));?>
    </div>

    <div class="productFooterDownDiv">
        <?php echo CHtml::link('О нас', array('site/page', 'view'=>'about'));?>
    </div>

</div>





