<?php

class ProductdescriptionController extends Controller
{

    //// подробнее о товаре информация
    public function actionProductdetaileddescription()
    {
        
        $cCart = new CCart();
        $cProductViewed = new CProductViewed();
        //форма покупки по центру страницы где можно выбрать характеристику количество товара
        $modelBuyForm = new BuyForm;

        //подробное описание товара
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $model = Product::loadModel($id);
            //модель комментариев
            $commentModel = new Comments;

            //средний рейтинг товара (округлённый)
            $averageRating = Comments::getProductRating($id);
            //считаем  количество комментов для товара
            $countComments = Comments::getProductCommentsCount($id);

            ///добавить товар в просмотренные товары
            $arrProductsViewed = $cProductViewed->addProductViewed($id);

            // получить список товаров которые есть в корзине
            $cartModel = $cCart->getListProductsCart();

            //подобные товары этой ПодКатегории
            $similarModel = Product::model()->findAll('SubCategoriesId=:SubCategoriesId',
                array(':SubCategoriesId'=>$model->SubCategory->id));

            //получить список картинок товара по ID товара
            $pictureModel = Pictures::getPicturesFromProductID($id);

            ///ищем типы товара
            $criteria = new CDbCriteria();
            $criteria->condition = 'ProductID=:ProductID';
            $criteria->params = array(':ProductID'=>$model->id);
            $toolsModel = ProductPropertiesList::model()->findAll($criteria);

            $featureFirstIs = [];

            foreach($toolsModel as $toolModel){
                $toolModel->propertiesID;
               ///список типов товара и цветов
                $featureFirstIs[] = $toolModel->Properties->feature1;
            }

            
            $this->render('index',array('model'=>$model, 'modelBuyForm'=>$modelBuyForm, 'commentModel'=>$commentModel,
                'pictureModel'=>$pictureModel, 'cartModel'=>$cartModel, 'countComments'=>$countComments,
                'averageRating'=>$averageRating, 'featureFirstIs'=>$featureFirstIs,
                'similarModel'=>$similarModel,
                'arrProductsViewed'=>$arrProductsViewed));
        }
        else
        {
            $this->redirect(Yii::app()->homeUrl);
        }
    }

    /// очистить просмотренные товары
    public function actionClearProductsViewedCookie()
    {
        $cProductViewed = new CProductViewed();
        $cProductViewed->clearProductsViewed();
    }


}