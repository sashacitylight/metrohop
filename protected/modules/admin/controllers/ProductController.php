<?php

class ProductController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }


    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index', 'create', 'update', 'delete', 'view'),
                'roles'=>array('2'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


	public function actionView($id)
	{
		$this->render('view', array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model = new Product;

		if(isset($_POST['Product']))
		{
			$model->attributes = $_POST['Product'];
            $model->image = CUploadedFile::getInstance($model, 'ProductArtUrl');
            ////сохраняем адрес картинки в таблицу
            if(isset($model->image)){
                $model->ProductArtUrl = '/images/large/'.$model->image->getName();
            }

            if($model->save())
            {
                /////сохранение в файл jpg с именем этого параметра
                if(isset($model->image)){
                $path = Yii::getPathOfAlias('webroot').'/images/large/'.$model->image->getName();
                $model->image->saveAs($path);
                }
                $this->redirect(array('view', 'id'=>$model->id));
            }
		}

		$this->render('create', array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Product']))
		{
			$model->attributes = $_POST['Product'];

            $model->image = CUploadedFile::getInstance($model, 'ProductArtUrl');
            ////сохраняем адрес картинки в таблицу
            if(isset($model->image)){
                $model->ProductArtUrl = '/images/large/'.$model->image->getName();
            }

			if($model->save()){
                /////сохранение в файл jpg с именем этого параметра
                if(isset($model->image)){
                $path=Yii::getPathOfAlias('webroot').'/images/large/'.$model->image->getName();
                $model->image->saveAs($path);
                }
                $this->redirect(array('view', 'id'=>$model->id));
            }

		}

		$this->render('update', array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		$model = new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes = $_GET['Product'];

		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model = Product::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
