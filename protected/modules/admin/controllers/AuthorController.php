<?php

class AuthorController extends Controller
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
		$model = new Author;
		if(isset($_POST['Author']))
		{
			$model->attributes = $_POST['Author'];
            //загружаем картинку для автора
            $model->image = CUploadedFile::getInstance($model, 'AuthorArtUrl');
            if(isset($model->image)){
                $model->AuthorArtUrl = '/images/authors/'.$model->image->getName();
            }

			if($model->save()){
                if(isset($model->image)){
                $path = Yii::getPathOfAlias('webroot').'/images/authors/'.$model->image->getName();
                $model->image->saveAs($path);
                }
                $this->redirect(array('view', 'id'=>$model->id));
            }
		}

		$this->render('create', array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Author']))
		{
			$model->attributes = $_POST['Author'];

            ///если пользователь загрузил картинку то image,
            //если считываем просто адрес при редактровании то !image
            if(CUploadedFile::getInstance($model, 'AuthorArtUrl')){
                $model->image = CUploadedFile::getInstance($model, 'AuthorArtUrl');
                $model->AuthorArtUrl = '/images/authors/'.$model->image->getName();
            }

			if($model->save()){
               if(isset($model->image)){
                   $path = Yii::getPathOfAlias('webroot').'/images/authors/'.$model->image->getName();
                   $model->image->saveAs($path);
               }

                $this->redirect(array('view', 'id'=>$model->id));
            }
		}

		$this->render('update', array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		$model=new Author('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Author']))
			$model->attributes = $_GET['Author'];

		$this->render('index', array(
			'model'=>$model,
		));
	}


	public function loadModel($id)
	{
		$model = Author::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'author-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
