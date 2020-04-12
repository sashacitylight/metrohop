<?php

class OrderController extends Controller
{

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }

    public function actionOrder()
    {
        $model = new Order;
        $model->scenario = 'order';

        //POST запрос заказ товара
        if(isset($_POST['Order']))
        {
            $model->attributes = $_POST['Order'];
            if($model->save())
                $this->redirect(array('ViewResult', 'id'=>$model->id));
        }


        //Get запросы с корзины и с панели товаров корзины на странице товаров
        if(isset($_GET['numberValue']))
        {
            $model->number = $_GET['numberValue'];
        }
        else
        {
            $model->number = 1;
        }


        if(isset($_GET['productIDValue']))
        {
            if(!empty($_GET['productIDValue'])){
                $model->productID = $_GET['productIDValue'];
            }
            else
            {
                $this->redirect(array('site/index'));
            }
        }


        if(isset($_GET['propertyIDValue']))
        {
                $model->PropertyID = $_GET['propertyIDValue'];
        }


        //POST запрос с описания товара
        $modelBuyForm = new BuyForm;

        if(isset($_POST['BuyForm']))
        {
            $modelBuyForm->attributes = $_POST['BuyForm'];

            if($modelBuyForm->validate())
            {
                $model->number = $modelBuyForm->numberValue;
                $model->productID = $modelBuyForm->productIDValue;
                $model->PropertyID = $modelBuyForm->propertyIDValue;
            }
            else
            {
                $this->redirect(array('site/index'));
            }
        }

        //если пользователь зарегестрированный то стягиваем данные в форму заказов
        if(!Yii::app()->user->isGuest){
            $model->userID = Yii::app()->user->id;
            $model->username = $model->user->username;
            $model->email = $model->user->email;
            $model->telefone = $model->user->telefon;
            $model->adress = $model->user->adress;
        }

        $this->render('order', array(
            'model'=>$model,
        ));
    }

    //заказ осуществлён
    public function actionViewResult($id)
    {
        $this->render('viewResult', array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function loadModel($id)
    {
        $model = Order::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }


}