<?php
$this->pageTitle = Yii::app()->name . ' - Express Cart. You can Buy products quick.';

// подключить javascript
$includeJavascriptFromFile = new CHelperMethods();
$includeJavascriptFromFile->includeJavascript('/scripts/cart/cart_delete_clear.js');
?>
<div class="mainWrapperCart">

<p>МОЯ КОРЗИНА</p>
<?php
//корзина пустая
if(!isset($listProductsCart)){
 echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/is_in_cart.png', 'image', array('Class'=>'imgInCartEmpty'));?>
    <div  class="isEmptyCart">
            <?=CHtml::openTag('p')?>
                Ваша Корзина пуста.
                <?php echo CHtml::link('Начните покупать сейчас!', array('site/ShowAllCategories/'), array('class'=>'sLink'));?>
            <?=CHtml::closeTag('p')?>
            <?php
             if (Yii::app()->user->isGuest){
                 echo CHtml::openTag('p');
                    echo 'Пожалуйста, войдите, чтобы просмотреть продукты,';
                 echo CHtml::closeTag('p');

                 echo CHtml::openTag('p');
                    echo 'которые ранее были приобретены.';
                 echo CHtml::closeTag('p');
             }
             else
             {
                 echo CHtml::openTag('p');
                    echo 'Пожалуйста, войдите в Личный Кабинет';
                 echo CHtml::closeTag('p');
                 echo CHtml::openTag('p');
                    echo 'чтобы просмотреть покупки';
                 echo CHtml::closeTag('p');
             }
             ?>
    </div>
<?php
}
//корзина с товарами
else{
?>
    <!--    Панель общей суммы с возможностью очистить корзину-->
    <div class="cartSummPanel">
    <?=CHtml::openTag('table')?>
        <?=CHtml::openTag('tr')?>
            <?=CHtml::image( Yii::app()->request->baseUrl .'/images/logo/mag-1413030902.png' , 'Image', array('Class'=>'imgCartSummPanel'))?>
        <?=CHtml::closeTag('tr')?>

        <?=CHtml::openTag('tr')?>
            <?= CHtml::submitButton('Очистить корзину', array('class'=>'buttonClearCart'));?> </tr>
            <?=CHtml::openTag('tr')?>
                <?=CHtml::openTag('td', array('id'=>'letteringTotalSumm'))?>
                     <?=CHtml::encode('Общая сумма: ')?>
                <?=CHtml::closeTag('td')?>
                <?=CHtml::openTag('td')?>
                      <?=CHtml::submitButton('Общая сумма', array('class'=>'buttonTotalSumCart'))?>
                <?=CHtml::closeTag('td')?>
            <?=CHtml::closeTag('tr')?>
        <?=CHtml::closeTag('tr')?>

    <?=CHtml::closeTag('table')?>
    </div>


    <div class="mainDivCart">
        <?php
        $listProductIDs = array();
       
        foreach ($listProductsCart as $key=>$listProductsCarts)
        {
            $model = Product::loadModel($listProductsCarts['id']);

            $listProductIDs[] = $model->id;

            echo CHtml::openTag('div', array('class'=>'cartOneProductNumberDiv'.$key, 'id'=>'divID'.$model->id));

            ///форма товара в корзине
            echo CHtml::form(Yii::app()->baseUrl.'/Order/Order', 'get', array('Class'=>'formOneProduct'));

                echo CHtml::link(CHtml::image( Yii::app()->request->baseUrl . $model->ProductArtUrl, '', array('Class'=>'imgOneProductCart')),
                    array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id),
                    array('Class'=>'fancybox', 'data-fancybox-group'=>'gallery'));

                echo CHtml::link($model->Title, array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id), array('Class'=>'spanOneProductTitleCart'));
                echo CHtml::closeTag('br');

                echo CHtml::tag('span', array('id'=>'PriceID'.$model->id, 'class'=>'spanOneProductPriceCart', 'name'=>$model->Price), $model->Price);

                echo CHtml::NumberField('numberValue', $listProductsCarts['number'], array('name'=>'numberValue', 'type'=>'number', 'id'=>'NumberID'.$model->id, 'min'=>'1', 'max'=>'9999', 'maxlength'=>'15', 'size'=>'40', 'class'=>'numberOneProductNumberCart', 'autocomplete'=>'off'));

                echo CHtml::closeTag('br');
                if(($listProductsCarts['property1'] == 'nomodel')||($listProductsCarts['property1'] == 'noProperty1')){
                    $listProductsCarts['property1'] = '';
                }
                else
                {
                    echo  CHtml::textField('typeValue', $listProductsCarts['property1'], array('id'=>'propertyFirstID', 'size'=>'40'));
                }

                if($listProductsCarts['property2'] != 'noProperty2')
                {
                    echo  CHtml::textField('colorValue', $listProductsCarts['property2'], array('id'=>'propertySecondID', 'size'=>'40'));
                }

                echo CHtml::hiddenField('productIDValue', $listProductsCarts['id']);
                echo CHtml::hiddenField('propertyIDValue', $listProductsCarts['propertyID']);

                echo CHtml::button('Удалить', array('myid'=>$key, 'class'=>'cartButtonDeleteProduct', 'size'=>'40'));
                echo CHtml::submitButton('Оформить заказ', array('class'=>'cOrderButton', 'name'=>'submit'));

                echo CHtml::textField('', '', array('id'=>'resultPriceID'.$model->id, 'class'=>'resultPriceTextField', 'readonly'=>'readonly', 'size'=>'40'));
            echo CHtml::endForm();

        echo CHtml::closeTag('div');
        }
        ?>
    </div>

 </div>
<?php
         if (isset($listProductsCart)){
        $resultToJSON = json_encode($listProductIDs);
        ?>
        <script>
            ///передаём массив в скрипт
            var jsonStringProductsCart = <?php echo $resultToJSON;?>;
            summProducts(jsonStringProductsCart);
        </script>

        <?php
        }
}
?>








