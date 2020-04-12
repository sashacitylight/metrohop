<?php
$this->pageTitle = Yii::app()->name . ' - Choose All products, All Categories';
?>

<?php
    Yii::app()->clientScript->scriptMap=array(
        'jquery.js'=>false,
        'jquery.ba-bbq.js'=>false,
        'jquery.yiigridview.js'=>false
    );
    $includeJavascriptFromFile = new CHelperMethods();
    $includeJavascriptFromFile->includeJavascript('/scripts/show_all_categories/all_categories.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/show_all_categories/big_slider_big_pictures_up_move.js');
    $includeJavascriptFromFile->includeJavascript('/scripts/show_all_categories/vertical_slider.js');
?>


<!--блок оборачивает блок навигации по категориям и субкатегориям-->
<div class="navigationSubCategories">
<!--    навигация по категориям и субкатегориям-->
    <div class="navigationDiv">
       <?php

       $arrayLinks = array();
       foreach($categoryModel as $categoryModels){
           $arrayLinks[$categoryModels->name] = array('site/ShowProductsSortingByCategories', 'id'=>$categoryModels->id);
           foreach($categoryModels->SubCategories as $one){
               $arrayLinks[$one->Name] = array('site/ShowProductsSortingBySubCategories', 'id'=>$one->id);
           }
       }


        if(isset($this->breadcrumbs)):
            $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$arrayLinks,
             'homeLink'=>false,
            'separator'=>'-> ',
            'htmlOptions'=>array('class'=>'productCBreadcrumbs')
            ));
        endif;?>
    </div>
</div>

<!--//оборачивающий блок снизу навигации категорий и субкатегорий-->
<div class="allDivMain">

<!--       //справа виджет просмотренные товары тонкий-->
    <div class="rightDivProductViewed">
        <div class="Vwidget">
            <?=CHtml::link('', array('#'), array('class'=>'up'));?>
            <div class="VjCarouselLite">

             <?=CHtml::openTag('ul')?>
                    <?php
                    if (isset($productsViewedModel)&&!empty($productsViewedModel)){
                        foreach($productsViewedModel as $productsViewedModel){

                            $productModel = Product::model()->findByPk($productsViewedModel);
                            if(isset($productModel)){
                            echo CHtml::openTag('li');
                                echo CHtml::openTag('div');
                                echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$productModel->ProductArtUrl), array('store/details', 'Product'=>$productModel->id), array('class'=>'gallery', 'rel'=>'group', 'title'=>$productModel->Title));
                                echo CHtml::link($productModel->Title.' ('.$productModel->Price.'$) ', array('store/details', 'Product'=>$productModel->id), array('class'=>'letteringRightAllCategory'));
                                echo CHtml::closeTag('div');
                            echo CHtml::closeTag('li');
                          }
                    }
                    }
                    ?>
             <?=CHtml::closeTag('ul')?>
            </div>

            <?php echo CHtml::link('', array('#'), array('class'=>'down'));?>
        </div>
    </div>

<!--            блок , оборачивающий слайдер с движущимися большими картинками с рекламой-->
    <div class="mainWrapperSliderDiv">
<!--                Слайдер с движущимися большими картинками с рекламой-->
            <div class="imagesNearSlider">
                <?=CHtml::openTag('ul')?>
                    <?php
                    echo CHtml::openTag('li');
                    echo CHtml::link(CHtml::image('http://gtms03.alicdn.com/tps/i3/TB1ZNDOGFXXXXapaXXXSutbFXXX.jpg', '', array('class'=>'productPict', 'width'=>'320', 'height'=>'180')),
                        array('http://activities.aliexpress.com/ru/ru_jinping.php'), array('data-spm-anchor-id'=>'a2718.7617558.1325.8'));
                    echo CHtml::closeTag('li');

                    echo CHtml::openTag('li');
                    echo CHtml::link(CHtml::image('http://gtms02.alicdn.com/tps/i2/TB1.AgoGFXXXXXWXVXXmxYvZVXX-320-180.jpg', '', array('class'=>'productPict', 'width'=>'320', 'height'=>'180')),
                        array('http://group.aliexpress.com/ru.htm?tracelog=rugroupbuyyt02'), array('data-spm-anchor-id'=>'a2718.7617558.1325.9'));
                    echo CHtml::closeTag('li');
                    ?>
                <?=CHtml::closeTag('ul')?>
            </div>

            <div id="slider">
             <?=CHtml::openTag('ul')?>
             <?php
                 echo CHtml::openTag('li');
                      echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/slider_all_cat/images/TB1fuLQGXXXXXbyXVXXlcPC2pXX-750-360.jpg', 'Css Template Preview', array('class'=>'imgSliderAll')), array('http://templatica.com/preview/30'));
                 echo CHtml::closeTag('li');

                 echo CHtml::openTag('li');
                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/slider_all_cat/images/TB1ny9SFVXXXXb9aXXXlcPC2pXX-750-360.jpg', 'Css Template Preview', array('class'=>'imgSliderAll')), array('http://templatica.com/preview/7'));
                 echo CHtml::closeTag('li');

                 echo CHtml::openTag('li');
                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/slider_all_cat/images/TB1GGGrGXXXXXaaapXXlcPC2pXX-750-360.jpg', 'Css Template Preview', array('class'=>'imgSliderAll')), array('http://templatica.com/preview/25'));
                 echo CHtml::closeTag('li');

                 echo CHtml::openTag('li');
                     echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/slider_all_cat/images/TB1xqMeGFXXXXX6XFXXSutbFXXX.jpg', 'Css Template Preview', array('class'=>'imgSliderAll')), array('http://templatica.com/preview/26'));
                 echo CHtml::closeTag('li');

                 echo CHtml::openTag('li');
                     echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/slider_all_cat/images/TB1QzlsGFXXXXbPaXXXSutbFXXX.jpg', 'Css Template Preview', array('class'=>'imgSliderAll')), array('http://templatica.com/preview/27'));
                 echo CHtml::closeTag('li');
             ?>
             <?=CHtml::closeTag('ul')?>
            </div>
    </div>



    <div class="mainWrapperSliderDiv">
        <!--                Групповые покупки-->
       <?php
       $cProductProperties = new CProductProperties();
       if(isset($randomProductModel)){
           $i=0;
          foreach($randomProductModel as $randomProduct){
              if((!empty($randomProduct['id']))&&!empty($randomProduct['Title']) ){
                  $model = Product::model()->findByPk($randomProduct['id']);
                  $imgDiscount = $cProductProperties->getProductImageDiscount($model->pDiscount);

                  if ($i%4==0){
                      ?>
<!--                  большой блок-->
                   <div class="randomBigDiv">
                          <?php
                                $newPrice = CProductProperties::getOldProductPrice($model->Price, $model->pDiscount);
                                  if($newPrice != 0){
                                      echo CHtml::image($imgDiscount, '', array('class'=>'randomImgDiscountNumber'));
                                  }
                                  echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$model->ProductArtUrl),
                                      array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id));
                                  echo CHtml::link('<p>'.$model->Title.'</p>', array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id));
                                  echo CHtml::openTag('p', array('id'=>'randomNewPrice'));
                                      echo $model->Price;
                                  echo CHtml::closeTag('p');
                                  if($newPrice!=0){
                                    echo CHtml::openTag('p', array('id'=>'randomOldPrice'));
                                       echo 'US '.$newPrice.'$';
                                    echo CHtml::closeTag('p');
                                  } ?>
                   </div>
                  <?php
                  }
                  else
                  {
                      //маленький блок
                                 if($i%4==1){
                                  echo '<div class="randomSmallDiv">';
                                  }
                                  echo CHtml::openTag('li', array('class'=>'randomSmallList'));
                                  $newPrice = CProductProperties::getOldProductPrice($model->Price, $model->pDiscount);
                                  if($newPrice!=0){
                                      //картинка со скидкой
                                      echo CHtml::image($imgDiscount, '', array('class'=>'randomSmallImgDiscountNumber'));
                                  }
                                  echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$model->ProductArtUrl, '', array('class'=>'randomImgSmall'), array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id)));
                                  echo CHtml::link('<p>'.$model->Title.'</p>', array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id));

                                  echo CHtml::openTag('p', array('id'=>'randomPriceNew'));
                                  echo 'US'.$model->Price.'$';
                                  echo CHtml::closeTag('p');

                                  if($newPrice!=0){
                                      echo CHtml::openTag('p', array('id'=>'randomPriceOld'));
                                        echo 'US'.$newPrice.'$';
                                      echo CHtml::closeTag('p');
                                  }
                                  echo CHtml::closeTag('li');
                                  if($i%4==3){
                                      //закрываем блок где 3 маленьких блока
                                      echo '</div>';
                                  }
                  }
                $i++;
             }
         }
       }
       ?>
</div>
</div>
</div>






























