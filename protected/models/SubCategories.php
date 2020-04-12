<?php
class SubCategories extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_subcategories';
	}

	public function rules()
	{
		return array(
            array('id, Name, catID', 'required'),
            array('catID', 'numerical'),
            array('id', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>120),
			array('Description', 'safe'),
			array('id, Name, Description, catID', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'Category' => array(self::BELONGS_TO, 'Categories', 'catID'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Подвид#',
			'Name' => 'Название',
			'Description' => 'Описание',
			'catID' => 'Категория#',
            'Category'=>'Категория',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('Name', $this->Name, true);
		$criteria->compare('Description', $this->Description, true);
		$criteria->compare('catID', $this->catID, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //для всплывающего меню сайта слева
    public static function jsMenuSubCategories(){
        $model = self::model()->findAll();
        foreach($model as $model){
            $arrayResult[] = array(array('id'=>$model->catID, 'SubCategories_Id'=>$model->id, 'SubCategories_name'=>$model->Name));
        }
        return $arrayResult;
    }

    ///получить список всех ПодКатегорий
    public static function All(){
        return CHtml::listData(self::model()->findAll(), 'id', 'Name');
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
