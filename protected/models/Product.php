<?php

class Product extends CActiveRecord
{
    public $image; /////////////////////объевляем параметр куда будем заливать image

	public function tableName()
	{
		return 'tbl_product';
	}

	public function rules()
	{
		return array(
			array('SubCategoriesId, Title', 'required'),
			array('SubCategoriesId, id, pFirmID, ToolId, pDiscount, pNumberOrders, overallRating, pCommentsNumber', 'numerical', 'integerOnly'=>true),
            array('Price', 'numerical'),
			array('Title', 'length', 'max'=>160),
			array('ProductArtUrl', 'length', 'max'=>1024),
			array('AdditionalInfo', 'safe'),
			array('id, SubCategoriesId, pFirmID, Title, Price, ProductArtUrl, AuthorId, AdditionalInfo, ToolId, pDiscount, coment_id, pNumberOrders, overallRating, pCommentsNumber', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'SubCategory' => array(self::BELONGS_TO, 'SubCategories', 'SubCategoriesId'),
            'Firm' => array(self::BELONGS_TO, 'Firm', 'pFirmID'),
            'Author' => array(self::BELONGS_TO, 'Author', 'AuthorId'),
        );
	}

	public function attributeLabels()
	{
		return array(
			'id' => '№ Товара',
			'SubCategoriesId' => 'Подкатегории',
			'AuthorId' => 'Автор',
			'Title' => 'Название',
			'Price' => 'Цена',
			'ProductArtUrl' => 'Картинка',
			'pFirmID' => '№ Поставщика',
			'AdditionalInfo' => 'Подробное описание',
			'ToolId' => 'Cвойста товара',
			'pDiscount' => 'Скидка',
			'pNumberOrders' => 'Количество заказов',
			'overallRating' => 'Рейтинг',
			'pCommentsNumber' => 'Количество отзывов',
            'SubCategory'=>'Категория',
            'Firm'=>'Поставщик',
            'Author'=>'Автор',
            'Category'=>'Категория'
		);
	}
    public function newSearch()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('SubCategoriesId', $this->SubCategoriesId);
        $criteria->compare('pFirmID', $this->pFirmID);
        $criteria->compare('Title', $this->Title, true);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('ProductArtUrl', $this->ProductArtUrl, true);
        $criteria->compare('AuthorId', $this->AuthorId);
        $criteria->compare('AdditionalInfo', $this->AdditionalInfo, true);
        $criteria->compare('ToolId', $this->ToolId);
        $criteria->compare('pDiscount', $this->pDiscount);
        $criteria->compare('pNumberOrders', $this->pNumberOrders);
        $criteria->compare('overallRating', $this->overallRating);
        $criteria->compare('pCommentsNumber', $this->pCommentsNumber);

        return Product::model()->findAll($criteria);
    }

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('SubCategoriesId', $this->SubCategoriesId);
        $criteria->compare('pFirmID', $this->pFirmID);
		$criteria->compare('Title', $this->Title, true);
		$criteria->compare('Price', $this->Price);
		$criteria->compare('ProductArtUrl', $this->ProductArtUrl, true);
        $criteria->compare('AuthorId', $this->AuthorId);
		$criteria->compare('AdditionalInfo', $this->AdditionalInfo, true);
		$criteria->compare('ToolId', $this->ToolId);
		$criteria->compare('pDiscount', $this->pDiscount);
		$criteria->compare('pNumberOrders', $this->pNumberOrders);
		$criteria->compare('overallRating', $this->overallRating);
		$criteria->compare('pCommentsNumber', $this->pCommentsNumber);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /// читать случайные товары для страницы все товары
    public static function getRandomProducts()
    {
        //осуществлён поиск максимального и минимального ID продукта
        // Массив случайных чисел, который мы генерируем в следующем цикле
        $numbers = array();
        $listProduct= array();

        $criteria = new CDbCriteria;
        $criteria->select='MIN(id) as id';
        $product = self::model()->find($criteria);
        $minValue = $product->id;

        $criteria = new CDbCriteria;
        $criteria->select='MAX(id) as id';
        $product = self::model()->find($criteria);
        $maxValue = $product->id;

        for ($i=$minValue; $i <= $maxValue; $i++) {
            do {
                $num = mt_rand($minValue, $maxValue);
            } while(in_array($num, $numbers));
            $numbers[$i] = $num;
        }

        foreach ($numbers as $i => $offset) {
            $listProduct[$i]=self::model()->find('id=:id', array(':id'=>$offset));
        }
        return $listProduct;
    }

    //получить список товаров по ID товара
    public static function All($id){
        $models = self::model()->findAll();
        $array = CHtml::listData($models, $id, 'name');
        return $array;
    }
    //получить имя категории по ID Субкатегории(для таблицы)
    public static function getCategoryName($id){
        $model = SubCategories::model()->findByPk($id);
        return $model->Category->name;
    }

    //получить ID Категории по ID ПодКатегории
    public static function getCategoryId($id){
        $model = SubCategories::model()->findByPk($id);
        return $model->Category->id;
    }


    public function loadModel($id)
    {
        $model = self::model()->findByPk($id);
        if($model === null)
//            throw new CHttpException(404,'Страница не найдена.');
            $this->redirect(array('site/index'));
        return $model;
    }



}
