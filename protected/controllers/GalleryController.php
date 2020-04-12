<?php

class GalleryController extends Controller
{
//// перейти в галерею по $id товара
    public function actionIndex()
    {
        ////показать галерею картинок
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $productModel = Product::loadModel($id);

            ///подобные товары данной ПодКатегории товаров
            $similarModel = Product::model()->findAll('SubCategoriesId=:SubCategoriesId',
                array(':SubCategoriesId'=>$productModel->SubCategory->id));
            //получает список картинок по id товара
            $pictModel = Pictures::getPicturesFromProductID($id);

            $this->render('index', array('productModel'=>$productModel, 'pictModel'=>$pictModel,
                'similarModel'=>$similarModel));
        }
        else
        {
            $this->redirect(array('site/index'));
        }
    }


}