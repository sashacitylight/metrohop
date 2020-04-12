<?php
class ProductProperties extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_properties';
	}

	public function rules()
	{
		return array(
			array('feature1, feature2', 'required'),
			array('feature1, feature2', 'length', 'max'=>255),
			array('id, feature1, feature2', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => '#ID',
			'feature1' => 'Характеристика1',
			'feature2' => 'Характеристика2',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('feature1', $this->feature1, true);
		$criteria->compare('feature2', $this->feature2, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //получить список всех характеристик
    public static function All(){
        $models = self::model()->findAll();
        $array = CHtml::listData($models, 'id', 'feature1', 'feature2');
        return $array;
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
