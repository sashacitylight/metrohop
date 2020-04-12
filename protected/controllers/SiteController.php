<?php

class SiteController extends Controller
{
    public $searchModel; //модель формы , передаём в layout SearchForm

    public function actionProductSearch(){
        //создаём модель формы
        $model = new SearchForm;

        if(isset($_POST['SearchForm'])){
            $model->attributes = $_POST['SearchForm'];
            $model->Title = $_POST['SearchForm']['Title'];
            $model->price1 = $_POST['SearchForm']['price1'];
            $model->price2 = $_POST['SearchForm']['price2'];
            $model->SubCategoriesId = $_POST['SearchForm']['SubCategoriesId'];
            $model->overallRating = $_POST['SearchForm']['overallRating'];
            $model->pDiscount = $_POST['SearchForm']['pDiscount'];
            $model->authorName = $_POST['SearchForm']['authorName'];
            ///запись в форму поиска данных на страницу
            $this->searchModel = $model;

            ///поиск ID авторов по имени автора
            if($model->authorName != '')
            {
                $authorCriteria = new CDbCriteria();
                $authorCriteria->addSearchCondition('Name', $model->authorName, true, 'AND', 'LIKE');
                $authorModel = Author::model()->findAll($authorCriteria);

                //сохраняем все ID авторов
                foreach($authorModel as $authorModel){
                    $arrayAuthorIDs[] = $authorModel->id;
                }
            }

            $criteria = new CDbCriteria;
            $stringCondition = '';
            $arrayParams = array();

            $flag = 0; //пустая строка поиска

            //добавляем в condition и в params
            if(!empty($model->SubCategoriesId)){
                $arrayParams[':SubCategoriesId'] = $model->SubCategoriesId;
                $stringCondition.='SubCategoriesId = :SubCategoriesId';
                $flag++;
            }

            if(!empty($model->pDiscount)&&$model->pDiscount != 0&&$model != ''){
                $arrayParams[':pDiscount'] = $model->pDiscount;
                //$flag!=0 уже не первое условие поэтому добавляем в $stringCondition AND
                ($flag != 0)? $stringCondition.=' AND pDiscount = :pDiscount': $stringCondition.='pDiscount = :pDiscount';
                $flag++;
            }

            if(!empty($model->overallRating)&&$model->overallRating != 0&&$model != ''){
                $arrayParams[':overallRating'] = $model->overallRating;
                ($flag != 0)? $stringCondition.=' AND overallRating = :overallRating': $stringCondition.='overallRating = :overallRating';
            }

            $criteria->condition = $stringCondition;
            $criteria->params = $arrayParams;
            $criteria->addSearchCondition('Title', $model->Title, true, 'AND', 'LIKE');
            $criteria->addSearchCondition('AdditionalInfo', $model->info, true, 'OR', 'LIKE');

            ///массив содержащий ID авторов
            if(isset($arrayAuthorIDs)){
                $criteria->addInCondition('AuthorID', $arrayAuthorIDs, 'OR');
            }
            $criteria->addBetweenCondition('Price', $model->price1, $model->price2);
            $count = Product::model()->count($criteria);

            $pages = new CPagination($count);
            $pages->pageSize = 12;
            $pages->applyLimit($criteria);

            $сProductsViewed = new CProductViewed();
            $categoryModel = Categories::model()->findAll();
            $productsViewedModel = $сProductsViewed->getProductsViewed();

            $this->render('index',
                array(
                    'allProducts'=>Product::model()->findAll($criteria),
                    'categoryModel'=>$categoryModel,
                    'pages' => $pages,
                    'productsViewedModel'=>$productsViewedModel
                )
            );
        }
        else
        {
            $this->redirect(array('site/index'));
        }
    }

    ///// просмотр страницы где есть все категории
    ///// просмотр страницы где есть все категории
    public function actionShowAllCategories()
    {
        $сProductsViewed = new CProductViewed();
       // $subCategoriesModel = SubCategories::model()->findAll();
        $categoryModel = Categories::model()->findAll();
        //получить массив случайные ID товара
        $randomProductModel = Product::getRandomProducts();
        //получить массив просмотренные товары
        $productsViewedModel = $сProductsViewed->getProductsViewed();

        $this->render('ShowAllCategories', array('categoryModel'=>$categoryModel,
            'randomProductModel'=>$randomProductModel, 'productsViewedModel'=>$productsViewedModel));
    }

    /// главная страница на которой показываются все товары по порядку
    public function actionIndex()
    {
        
        $сProductsViewed = new CProductViewed();
        $categoryModel = Categories::model()->findAll();
        $productsViewedModel = $сProductsViewed->getProductsViewed();

        $criteria = new CDbCriteria();
        $criteria->select = "*";
        $criteria->order = "id ASC";
        $count = Product::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);

        $this->render('index',
            array(
                'allProducts'=>Product::model()->findAll($criteria),
                'categoryModel'=>$categoryModel,
                'pages' => $pages,
                'productsViewedModel'=>$productsViewedModel
            )
        );
    }

    //// показать отсортированные по категориям товары с меню по id идёт в  раскрывающемся меню
    public function actionShowProductsSortingBySubCategories()
    {
        
        
        $cProductsViewed = new CProductViewed();
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $subCategoryModel = SubCategories::loadModel($id);

            $criteria = new CDbCriteria();
            $criteria->condition = 'SubCategoriesId=:SubCategoriesId';
            $criteria->params = array(':SubCategoriesId'=>$subCategoryModel->id);
            $count = Product::model()->count($criteria);

            $pages = new CPagination($count);
            $pages->pageSize = 12;
            $pages->applyLimit($criteria);

            $allProductsModel = Product::model()->findAll($criteria);
            $productsViewedModel = $cProductsViewed->getProductsViewed();

            $this->render('index',array('flag'=>'SC',
                        'allProducts'=>$allProductsModel,
                        'subCategoryModel'=>$subCategoryModel, 'pages'=>$pages,
                        'productsViewedModel'=>$productsViewedModel));
        }
        else
        {
            $this->redirect(array('site/index'));
        }

    }



    //// При выборе в стационарном меню категории показать отсортированные по категориям товары  в стационарном меню со стрелками,
    ////    которое находится вверху страницы при выборе именно категории
    public function actionShowProductsSortingByCategories()
    {
        $cProductsViewed = new CProductViewed();
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $categoryModel = Categories::loadModel($id);

            $subCategoriesModel = SubCategories::model()->findAllByAttributes(array('catID'=>$categoryModel->id));
            $productsViewedModel = $cProductsViewed->getProductsViewed();
            ///категории найти по айди имя
            $listIDsSubCategoriesCategory = array();

            foreach($categoryModel->SubCategories as $one){
                 $listIDsSubCategoriesCategory[] = $one->id;
            }
            $model = Product::model()->findAllByAttributes(array('SubCategoriesId'=>$listIDsSubCategoriesCategory));
            $dataProvider = new CActiveDataProvider('Product');
            $dataProvider->setData($model);
            $count = count($model);

            if($count != 0)
            {
                $dataProvider = new CActiveDataProvider('Product',array(
                    'criteria'=>array(
                        'condition'=>'SubCategoriesId IN ('.implode(',', $listIDsSubCategoriesCategory).')',
                    )
                ));
                $pages = new CPagination($count);
                $pages->pageSize = 12;
                $pages->applyLimit($dataProvider->criteria);
                $allProductsModel = Product::model()->findAll($dataProvider->criteria);
            }
            else
            {
                $this->redirect(array('site/ShowAllCategories'));
            }

            $this->render('index',array('flag'=>'C', 'categoryModel'=>$categoryModel, 'subCategoryModel'=>$subCategoriesModel,
                'allProducts'=>$allProductsModel, 'productsViewedModel'=>$productsViewedModel,
                'pages'=>$pages));
        }
        else
        {
            $this->redirect(array('site/index'));
        }
    }





    //// просмотр инструкций вход на страницу с главного меню
    public function actionInstruction()
    {
        $this->render('instructions');
    }

    //// написать жалобу или пожелание переход на страницу отзывов о сайте в главном меню ссылка
    public function actionContact()
	{
		$model = new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes = $_POST['ContactForm'];
			if($model->validate())
			{
                $name = '=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers = "From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";


				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Спасибо за добавленный комментарий.');
			}
		}
		$this->render('contact', array('model'=>$model));
	}



    public function actionError()
    {
        if($error = Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    //// метод для админки вход в админку под правами админа или другими правами
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
                //успех
                $this->redirect(Yii::app()->user->returnUrl);
            }
            else
            {
                $this->refresh();
            }
		}

		$this->render('login', array('model'=>$model));
	}

    /// выход с админки
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

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



}