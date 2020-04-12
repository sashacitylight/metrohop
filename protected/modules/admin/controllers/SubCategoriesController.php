<?php

class SubCategoriesController extends Controller
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
		$model = new SubCategories;

		if(isset($_POST['SubCategories']))
		{
			$model->attributes = $_POST['SubCategories'];
            $submodel = SubCategories::model()->findByPk($model->id);

            if(!isset($submodel)){
			if($model->save())
				$this->redirect(array('view', 'id'=>$model->id));
            }
            else
            {
                $this->redirect(array('create'));
            }
        }

		$this->render('create', array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['SubCategories']))
		{
			$model->attributes = $_POST['SubCategories'];
			if($model->save())
				$this->redirect(array('view', 'id'=>$model->id));
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
		$model=new SubCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SubCategories']))
			$model->attributes = $_GET['SubCategories'];

		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model = SubCategories::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'sub-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
