<?php
$this->pageTitle = Yii::app()->name . ' - Gallery of Pictures. Consider in detail the goods increase';
?>
<script>
    //скрыть всплывающее меню
    subCategoryCategoryMenuHide();
</script>
<div class="navigationSubCategoriesWrapper">
    <?php
    $arrayLinks = array();
    $arrayLinks['К товару-> '.$productModel->Title] = array('ProductDescription/ProductDetailedDescription', 'id'=>$productModel->id);
    //хлебные крошки Категория->Подкатегория
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
<br/>

<!--таблица подобных товаров той же Sub категории c Zoom каждой маленькой картинки-->
   <?php
    echo CHtml::tag('table', array('class'=>'simpleTableGridSecond', 'id'=>'galeryTableSimilar', 'cellspacing'=>'0'));
    if (isset($similarModel)&&!empty($similarModel)){
        $i=0;
        foreach($similarModel as $similarModels){
            ////////10 раз случайный товар данной категории
            if ($i<22){
            echo CHtml::openTag('tr');

                echo CHtml::openTag('td');
                    echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . $similarModels->ProductArtUrl, 'Image', array('Class'=>'my-foto', 'id'=>'imgSimilar', 'data-large'=>Yii::app()->baseUrl . $similarModels->ProductArtUrl)), Yii::app()->request->baseUrl . $similarModels->ProductArtUrl, array('Class'=>'fancybox', 'data-fancybox-group'=>'gallery', 'title'=>$similarModels->Title.'  ('.$similarModels->Price.'$)'));
                echo CHtml::closeTag('td');

                echo CHtml::openTag('td');
                    echo CHtml::link($similarModels->Title, array('ProductDescription/ProductDetailedDescription/', 'id'=>$similarModels->id), array('class'=>'nameLinkSimilar'));
                    echo CHtml::openTag('p');
                        echo $similarModels->Price;
                    echo CHtml::closeTag('p');
                echo CHtml::closeTag('td');

            echo CHtml::closeTag('tr');
                $i++;
            }
        }
    }
    echo CHtml::closeTag('table');
   ?>



<?php
///большие картинки с зумом одна под другой
    echo CHtml::openTag('ul', array('class'=>'galleryListClass'));
        ///1 картинка первая с таблицы товары
        if (isset($pictModel)){
            echo CHtml::openTag('li');
                echo CHtml::image(Yii::app()->request->baseUrl . $productModel->ProductArtUrl, '', array('class'=>'my-foto', 'data-large'=>Yii::app()->baseUrl . $productModel->ProductArtUrl));
            echo CHtml::closeTag('li');

            //   все остальные картинки с таблицы галереи-->
          foreach($pictModel as $pict){
            echo CHtml::openTag('li');
                echo CHtml::image(Yii::app()->baseUrl.$pict->picUrl, '', array('class'=>'my-foto', 'data-large'=>Yii::app()->baseUrl . $pict->picUrl, 'alt'=>''));
            echo CHtml::closeTag('li');
            }
        }
    echo CHtml::closeTag('ul');
?>


