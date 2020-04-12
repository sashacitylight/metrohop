<?php

class PicturesController extends Controller
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
                'actions'=>array('upload', 'delete', 'update', 'view', 'index'),
                'roles'=>array('2'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


	public function actionUpload($id)
	{
		$model = new Pictures;

	    if(isset($_POST['Pictures']))
		{
            $model->attributes = $_POST['Pictures'];
            $model->image = CUploadedFile::getInstance($model, 'picUrl');
            ////сохраняем адрес картинки в таблицу
            if(isset($model->image)){
                ////адрес картинки записываем в таблицу
                $model->picUrl = '/images/large_imgs/'.$model->picProductID.'/'.$model->image->getName();

                ///есть ли такой файл, если есть то назад
                $filepath = Yii::getPathOfAlias('webroot').$model->picUrl;
                $dirpath = Yii::getPathOfAlias('webroot').'/images/large_imgs/'.$model->picProductID.'/';
                //если уже файл существует то перезагружаемся
                if (file_exists($filepath)) {
                    $this->refresh();
                }

                if(isset($model->image)){
                ///создаём директорию
                    if(!is_dir($dirpath)){
                        CFileHelper::createDirectory($dirpath);
                    }
                     ///записываем картинку в директорию
                    $model->image->saveAs($filepath);
                }
            }
			if($model->save()){
                   $this->refresh();
            }
		}

        $model->picProductID = $id;
		$this->render('upload', array(
			'model'=>$model
		));
	}

	public function actionDelete($id)
	{
        $model = $this->loadModel($id);
        ///удаляем картинку с директории и адрес картинки с базы
        $filepath = Yii::getPathOfAlias('webroot').$model->picUrl;
        if(file_exists($filepath)){
            unlink($filepath);
        }
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('create'));
	}

	public function loadModel($id)
	{
		$model = Pictures::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pictures $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'pictures-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if(isset($_POST['Pictures']))
        {
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
///если пользователь выбрал картинку то сюда , иначе с текстового поля берётся адрес
        if(CUploadedFile::getInstance($model, 'ProductArtUrl')){
            $model->image = CUploadedFile::getInstance($model, 'ProductArtUrl');
            ////сохраняем адрес картинки в таблицу
            $model->ProductArtUrl = '/images/large/'.$model->image->getName();
        }

        if($model->save()){
            /////сохранение в файл jpg с именем этого параметра
            if(isset($model->image)){

                $path = Yii::getPathOfAlias('webroot').'/images/large/'.$model->image->getName();
                $model->image->saveAs($path);
            }
            $this->redirect(array('view', 'id'=>$model->id));
        }

            $model->attributes = $_POST['Pictures'];
            if($model->save())
                $this->redirect(array('view', 'id'=>$model->id));
        }

        $this->render('update', array(
            'model'=>$model,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model'=>$this->loadModel($id),
        ));
    }


    public function actionIndex()
    {
        $model = new Pictures('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Pictures']))
            $model->attributes = $_GET['Pictures'];

        $this->render('index', array(
            'model'=>$model,
        ));
    }
}
