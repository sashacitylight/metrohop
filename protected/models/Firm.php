<?php
class Firm extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_firm';
	}

	public function rules()
	{
		return array(
			array('firmName, firmState, firmFio, firmInfo', 'required'),
			array('firmPrice', 'numerical', 'integerOnly'=>true),
			array('firmName, firmState, firmFio, firmTime, firmService, firmInfo', 'length', 'max'=>255),
			array('id, firmName, firmState, firmFio, firmTime, firmPrice, firmService, firmInfo', 'safe', 'on'=>'search'),
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
			'id' => 'Поставщик#',
			'firmName' => 'Название фирмы',
			'firmState' => 'Государство(регион)',
			'firmFio' => 'ФИО поставщик',
			'firmTime' => 'Время доставки',
			'firmPrice' => 'Цена доставки',
			'firmService' => 'Служба по СНГ',
			'firmInfo' => 'Информация',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('firmName', $this->firmName, true);
		$criteria->compare('firmState', $this->firmState, true);
		$criteria->compare('firmFio', $this->firmFio, true);
		$criteria->compare('firmTime', $this->firmTime, true);
		$criteria->compare('firmPrice', $this->firmPrice);
		$criteria->compare('firmService', $this->firmService, true);
		$criteria->compare('firmInfo', $this->firmInfo, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    //получить список всех поставщиков
    public static function All(){
        return CHtml::listData(self::model()->findAll(), 'id', 'firmName');
    }
}
