<?php
class UserController extends Controller
{
    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),

            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionRegistration()
    {
        $model = new User;
        $model->scenario = 'registration';

        if(isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];
            //сохраняем пароль в первоначальном виде
            $password = $model->password;

            if($model->save())
            {
                //если регистрация успешная переходим в ЛК
                 Yii::app()->user->setFlash('registration','Вы можете авторизоваться');

                 $identity = new UserIdentity($model->username,$password);

                 if($identity->authenticate()){
                    Yii::app()->user->login($identity);
                    $this->redirect(array('user/PersonalAccount'));
                 }
            }
        }
        $this->render('registration',array(
            'model'=>$model
        ));
    }

    //ЛК
    public function actionPersonalAccount(){
        if(!Yii::app()->user->isGuest){
            //пользователь с username
            $userModel = User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
            //количество заказов
            $countOrder = Order::model()->count('userID=:userID', array(':userID'=>$userModel->id));
            //заказы
            $model = new Order;
            $this->render('PersonalAccount', array('model'=>$model, 'userModel'=>$userModel, 'countOrder'=>$countOrder));
        }
        else
        {
            $this->redirect(array('/site/login'));
        }
    }



    /// выход с админки
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


    //// AJAX метод для админки вход в админку под правами админа или другими правами
    public function actionLogin()
    {
        $model = new LoginForm;

        if(isset($_POST['ajax']) && $_POST['ajax'] === 'loginForm')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];


            if($model->validate() && $model->login()){

                $userModel = User::model()->findByAttributes(array('username'=>$model->username));
                //количество заказов
                $countOrders = Order::countOrdersUser($userModel->id);

                $result = array(
                   'username'=>$userModel->username,
                   'name'=>$userModel->name,
                   'telefon'=>$userModel->telefon,
                   'adress'=>$userModel->adress,
                   'email'=>$userModel->email,
                   'countOrders' =>$countOrders
               );
               //отправляем результат во всплывающее окно с информацией о пользователе
               $result = json_encode($result);
               print_r($result);
               return;
            }
            else
            {
                print_r('0');
                return;
            }

        }
        $this->render('login', array('model'=>$model));
    }


}