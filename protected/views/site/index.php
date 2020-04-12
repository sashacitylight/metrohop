<script>
    $("#homeID a").addClass("current");
</script>

<?php
    $this->pageTitle = Yii::app()->name . ' - Welcome !!!';

//показывает блок поиска в случае запроса ПОИСК
if(isset($this->searchModel)){
       ?>
        <script>
            // открываем блок поиска фиксируем критерии поиска в layout
            $(".searchDivWrapper").show();
        </script>
    <?php
}
?>

<!--оранжевая стрелка прокрутки вверх с крестиком закрытия-->
<div id="up">
    <?php
    echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/up.png', '', array('class'=>'imgUp'));
    echo CHtml::image(Yii::app()->baseUrl.'/images/close.png', '', array('class'=>'imgUpClose'));
    ?>
</div>


<!--длинный прямоугольный блок оборачивает блок навигации-->
<div class="navigationSubCategories">
    <!--//блок навигации с разными категориями и субкатегориями-->
    <div class="navigationDiv">
        <?php
        $arrayLinks = array();
        //flag определяет с какого экшена зашли с главного
        if(isset($flag)){

        ///Сортировка по SubCategories ActionSubCategories
        if($flag == 'SC'){
            $arrayLinks[$subCategoryModel->Category->name] = array('site/ShowProductsSortingByCategories', 'id'=>$subCategoryModel->Category->id);
            $arrayLinks[$subCategoryModel->Name] = array('site/ShowProductsSortingBySubCategories', 'id'=>$subCategoryModel->id);
        }

        ///Сортировка по Categories ActionCategories
        else if($flag == 'C' && isset($categoryModel)){
            ///категории
           $arrayLinks[$categoryModel->name] = array('site/ShowProductsSortingByCategories', 'id'=>$categoryModel->id);
            foreach($subCategoryModel as $subCategoryModel)
            {
                $arrayLinks[$subCategoryModel->Name] = array('site/ShowProductsSortingBySubCategories', 'id'=>$subCategoryModel->id);
            }
         }
        }
        ////Actionindex
        else{
             foreach($categoryModel as $categoryModel){
                    $arrayLinks[$categoryModel->name] = array('site/ShowProductsSortingByCategories', 'id'=>$categoryModel->id);
             }
        }
        ///хлебные крошки содержат ссылки на Categories SubCategories
        $arrayLinks['<-Все категории->'] = array('site/ShowAllCategories');

        if(isset($this->breadcrumbs)):
            $this->widget('zii.widgets.CBreadcrumbs', array(
               'links'=>$arrayLinks,
               'homeLink'=>false,
               'separator'=>' -> ',
               'htmlOptions'=>array('class'=>'productCBreadcrumbs')
             ));
        endif;
        ?>
<!--        ///переход на страницу все категории-->
    </div>
</div>

<!--pager для списка товаров-->
<div class="pagination">
    <?php
    $this->widget('CLinkPager', array(
            'header' => '',
            'pages' => $pages,
            'prevPageLabel' => '<Пред',
            'nextPageLabel' => 'След>',
            'firstPageLabel'=>'Первая',
            'lastPageLabel'=>'Последняя',
        )
    );?>
</div>


<!--///слева панель просмотренных товаров-->
<div class="leftSimpleProductsViewed">
    <div class="Vwidget">
        <div class="VjCarouselLite">
        <?=CHtml::openTag('ul')?>
        <?php
        if (isset($productsViewedModel)&&!empty($productsViewedModel)){
             foreach($productsViewedModel as $productViewedModel){
             //foreach -  по массиву уже просмотренных товаров,
             // кидаем каждый раз ID и получаем данные о Товаре
             //СЛЕВА ПАНЕЛЬ ПРОСМОТРЕННЫХ ТОВАРОВ картинки и данные о товаре кидаем в галерею просмотренных товаров
             $productModelOne = Product::model()->findByPk($productViewedModel);
             if(isset($productModelOne)){
                 echo CHtml::openTag('li');
                    echo CHtml::openTag('div');
                       echo CHtml::link(CHtml::image(Yii::app()->baseUrl.$productModelOne->ProductArtUrl), array('store/ProductDetailedDescription', 'id'=>$productModelOne->id),array('class'=>'gallery', 'rel'=>'group', 'title'=>$productModelOne->Title));
                       echo CHtml::link('<p class="letteringRightAllCategory">'.$productModelOne->Title.' ('.$productModelOne->Price.'$) ' . '</p>', array('Productdescription/Productdetaileddescription', 'id'=>$productModelOne->id));
                    echo CHtml::closeTag('div');
                 echo CHtml::closeTag('li');
             }
           }
        }
        ?>
        <?=CHtml::closeTag('ul')?>
        </div>
    </div>
</div>


<!--///панель отображения списка товаров-->
<div id="all">
    <?php
    if($allProducts == NULL)
    {
        echo '<div class="emptyDivMessage">';
        echo 'В данный момент нет товара данной категории';
        echo '</div>';
    }
    //нумерует блоки
    $numberDiv = 0;
    //скидки
    $discount = new CProductProperties();
    //каждый проход - 1 товар в панель товаров
    foreach ($allProducts as $model)
    {
    ?>
<!--начало блока товара с картинкой названием и биографией номер блока в переменной -->
     <div  class="allDivInfo" id="<?='numberDiv'.$numberDiv?>">
        <?php
            ///url картинки для скидки процент в зависимости от процента скидки
            $imgHrefDiscount = $discount->getProductImageDiscount($model->pDiscount);
            echo CHtml::image($imgHrefDiscount, '', array('class'=>'imgDiscount'));
        ?>
           <!--   картинка со скидкой-->
         <!--        картинка внутри 1 товара c эффектами-->
        <div class="imageWrapper">
        <?php
        //изображение каждого товара
        echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $model->ProductArtUrl, '', array('class'=>'myimage')),
            array('Productdescription/ProductDetailedDescription', 'id'=>$model->id), array('class'=>'fancybox', 'data-fancybox-group'=>'gallery', 'title'=>$model->Title.'  ('.$model->Price.'$)'));

        echo '<div class="titleWrapper">';  
        echo CHtml::link($model->Title, array('Productdescription/Productdetaileddescription/', 'id'=>$model->id),array('class'=>'productNameLink'));
        /////проверка на биографию и автора
         if(isset($model->Author->bio)){
         ?>
             <?php echo CHtml::tag('span', array('class'=>'biographyClick', 'biographyProductID'=>$model->id, 'type'=>'text'), '('.$model->Author->Name.')');?>
             <div  id="<?='biographyID'.$model->id?>" class="biographyDiv">
                <?php
                echo CHtml::image(Yii::app()->baseUrl.'/images/close.png', 'this is alt tag of image', array('class'=>'closeBiography'));
                echo $model->Author->bio;?>
             </div>
            <?php
        }
        ?>
        </div>
     </div>
<!--конец блока товара с картинкой названием и биографией номер блока в переменной -->

<!--///начало блока панель с ценами заказами кнопками-->
       <div class="priceWrapper" id="<?='divNumberWrapper'.$numberDiv?>">
          <div class="myprice">
            <div class="imgBucksWrapper">
                <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/logo/buks.png', '', array('class'=>'imgBucks'));?>
                <div class="priceNumber">
                   <?=$model->Price.CHtml::tag('span', array('id'=>'thing'), '/шт');?>
                </div>
            </div>

            <?php
            ///расчёт цены со скидкой и без
            if  ($model->pDiscount){
            echo '<div class="divDiscount">';
               echo CProductProperties::getOldProductPrice($model->Price, $model->pDiscount).'$';
            echo '</div>';
            }
            ?>
          </div>

           <?php
            echo CHtml::link(CHtml::submitButton('Подробнее', array('class'=>'jsButtonBuy')), array('ProductDescription/ProductDetailedDescription', 'id'=>$model->id));
           ?>

        <!--///блок со звёздами рейтинга и заказами-->
           <div class="starsOrders">
                 <?php
                 $numberStars = CProductProperties::getStars($model->overallRating);
                 echo CHtml::tag('span', array('id'=>'spanStars', 'class'=>'spanStars'), $numberStars);
                 echo CHtml::closeTag('br');
                 if(isset($model->pNumberOrders)){
                 echo 'Заказов('.$model->pNumberOrders.')';
                 }
                 ?>
           </div>

<!--                ///отзывы(количество)-->
           <?php
           if(isset($model->pCommentsNumber)){
              echo CHtml::link(' <div class="clickReviews">Отзывов('.$model->pCommentsNumber.')</div>', array('comments/index', 'id'=>$model->id));
           }
           ?>

        <!--///невидимый блок раскрывающийся при наведении на товар содержит информацию-->
            <div class="invisibleInfo" id="<?='invDivNumber'.$numberDiv?>">


              <?php
              echo CHtml::openTag('table', array('class'=>'invisibleTable'));
              if(isset($model->SubCategory)){
                    ?>
                    <tr><td></td><td><?=$model->SubCategory->Name?></td></tr>
                    <tr><td></td><td><?=$model->SubCategory->Description?></td></tr>
                    <?php
                    }
                     if($model->AdditionalInfo){
                    ?>
                   <tr><td></td><td><div> <?=$model->AdditionalInfo?></div></td></tr>
                   <?php
                     }
                echo CHtml::closeTag('table');
              ?>
           </div>

            <?php
            //переменная расчитывает номер блока отдельного товара
            $numberDiv++;
            ?>
        </div>
          <!--///конец блока панель с ценами заказами кнопками-->
</div>
<!--///конец панели со списком товаров-->

    <?php
    }
    ?>
</div>








