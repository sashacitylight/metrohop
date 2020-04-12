<?php
class ProductPropertiesList extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_propertieslist';
	}

	public function rules()
	{
		return array(
			array('ProductID, propertiesID, number', 'required'),
			array('ProductID, propertiesID, number', 'numerical', 'integerOnly'=>true),
			array('id, ProductID, propertiesID, number', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'Properties' => array(self::BELONGS_TO, 'ProductProperties', 'propertiesID'),
            'Product' => array(self::BELONGS_TO, 'Product', 'ProductID'),
        );
	}

	public function attributeLabels()
	{
		return array(
			'id' => '#ID',
			'ProductID' => '#ID товара',
			'propertiesID' => '#ID характеристики',
			'number' => 'Кол-во(в наличии)',
            'Properties' => 'Характеристики',
            'Product' => 'Товар'
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('ProductID', $this->ProductID);
		$criteria->compare('propertiesID', $this->propertiesID);
		$criteria->compare('number', $this->number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //получить список для выбора характеристики товара по ID товара
    public static function getListProperty1Property2($id){
        $criteria = new CDbCriteria();
        $criteria->compare('ProductID', $id);
        $model = self::model()->findAll($criteria);

        $array = array();
        foreach ($model as $model){
            $array[] = $model->Properties->id;
        }
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $array);
        $model = ProductProperties::model()->findAll($criteria);
        return CHtml::listData($model, 'id', 'feature2', 'feature1');
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
