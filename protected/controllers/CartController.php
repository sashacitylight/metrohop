<?php

class CartController extends Controller
{
    //// перейти в корзину передать массив товаров с куки
    public function actionLinkToCart()
    {
        $cCart = new CCart();
        if($cCart->getListProductsCart()){
            $listProductsCart = $cCart->getListProductsCart();
            $this->render('cart', array('listProductsCart'=>$listProductsCart));
        }
        else
        {
            $this->render('cart');
        }
    }

    //добавление в корзину товара
    public function actionAddToCartAjaxModalWindow()
    {
        $model = new BuyForm();

        if(isset($_POST['BuyForm']))
        {
            $model->attributes = $_POST['BuyForm'];
            $propertyID = 0;
            if($model->validate())
            {
                ///если есть характеристика то берём свойство1 и свойство2 характеристики
                if(isset($model->propertyIDValue))
                {
                    $productModel = ProductProperties::loadModel($model->propertyIDValue);
                    $property1 = $productModel->feature1;
                    $property2 = $productModel->feature2;
                    $propertyID = $model->propertyIDValue;
                }
                else
                {
                    //начальные значения характеристик когда они пустые
                    $property1 = 'noProperty1';
                    $property2 = 'noProperty2';
                }
                ///ID товара
                $id = $model->productIDValue;
                //значение количества товара
                $number = $model->numberValue;

                $cCart = new CCart();
                ///добавляем в Куки Корзины
                print_r($cCart->addToCart($id, $number, $property1, $property2, $propertyID));
                return;
            }
            else
            {
                return;
            }
        }
        else
        {
            return;
        }
    }

    ////// удаляет один товар с корзины
    public function actionDeleteProductCart()
    {
        $id = $_GET['number'];
        $cCart = new CCart();
        $cCart->deleteProduct($id);
    }

    //// очистить корзину
    public function actionClearCart()
    {
        $cCart = new CCart();
        $cCart->clearCart();
    }


}