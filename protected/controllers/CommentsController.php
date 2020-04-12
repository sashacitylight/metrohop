<?php

class CommentsController extends Controller
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

    ///добавление комментариев к данному товару с $id
    public function actionIndex()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $productModel = Product::loadModel($id);

            //для заполнения комментариями
            $model = new Comments;
            $model->scenario = 'comments';
            $model->cProductID = $id;

            //для таблицы всех комментов
            $tableComments = new Comments;

            if(isset($_POST['Comments']))
            {
                $model->attributes = $_POST['Comments'];
                $model->cProductID = $id;

                if($model->save()){
                    $this->redirect(array('index', 'id'=>$model->cProductID));
                }
            }

            $this->render('index', array(
                'id'=>$id, 'model'=>$model, 'productModel'=>$productModel, 'tableComments'=>$tableComments
            ));
        }
        else
        {
            $this->redirect(array('site/index'));
        }
    }













}