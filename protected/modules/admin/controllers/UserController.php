<?php

class UserController extends Controller
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
                'actions'=>array('index','create','update','delete','view','Password'),
                'roles'=>array('2'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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

    public function actionPassword($id){

        $model = $this->loadModel($id);

        if(isset($_POST['password'])){
            $model->password = $_POST['password'];
            if($model->save()){
                $this->redirect(array('view','id'=>$model->id));
            }

        }
        $this->render('password',array('model'=>$model));
    }

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
        if(isset($_POST['ban'])){
            $model = User::model()->updateByPk($_POST['userID'], array('ban'=>1));
        }
        else if(isset($_POST['noban'])){
            $model = User::model()->updateByPk($_POST['userID'], array('ban'=>0));
        }

        if(isset($_POST['admin_old'])){
            $model = User::model()->updateByPk($_POST['userID'], array('role'=>2));
        }
        else if(isset($_POST['noadmin'])){
            ///чтобы нельзя было самого себя убрать из админов
            $model = User::model()->updateByPk($_POST['userID'], array('role'=>1), array('condition'=>'id<>'.Yii::app()->user->id));
        }

		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model = User::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'userForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
