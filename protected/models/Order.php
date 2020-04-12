<?php

class Order extends CActiveRecord
{
    public $verifyCode;

	public function tableName()
	{
		return 'tbl_order';
	}

	public function rules()
	{
		return array(
			array('username, email, telefone, productID, number', 'required'),
            array('email', 'email'),
			array('userID, number, PropertyID', 'numerical', 'integerOnly'=>true),
			array('username, email, telefone, adress, productID', 'length', 'max'=>255),
			array('id, userID, username, created, email, telefone, adress, productID, number,PropertyID', 'safe', 'on'=>'search'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'order'),
        );
	}

	public function relations()
	{
		return array(
            'product' => array(self::BELONGS_TO, 'Product', 'productID'),
            'user' => array(self::BELONGS_TO, 'User', 'userID'),
            'Property' => array(self::BELONGS_TO, 'ProductProperties', 'PropertyID'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => '#ID',
			'userID' => 'Ключ пользователя',
			'username' => 'Логин',
			'created' => 'Дата заказа',
			'email' => 'Эмейл',
			'telefone' => 'Телефон',
			'adress' => 'Адрес',
			'productID' => 'Номер продукта',
			'number' => 'Количество',
            'product'=>'Товар',
            'Product'=>'Товар',
            'PropertyID'=>'Характеристики',
            'Property'=>'Характеристики'
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
        $criteria->order = 'created DESC';

        $criteria->compare('id', $this->id);
		$criteria->compare('userID', $this->userID);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('telefone', $this->telefone, true);
		$criteria->compare('adress', $this->adress, true);
		$criteria->compare('productID', $this->productID, true);
		$criteria->compare('number', $this->number);
        $criteria->compare('PropertyID', $this->PropertyID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function searchWithFilter($id)
    {
        $criteria=new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('userID', $this->userID);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telefone', $this->telefone, true);
        $criteria->compare('adress', $this->adress, true);
        $criteria->compare('productID', $this->productID, true);
        $criteria->compare('number', $this->number);
        $criteria->compare('userID', $id);
        $criteria->compare('PropertyID', $this->PropertyID);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave(){
        if(parent::beforeSave())
        {
              if(!Yii::app()->user->isGuest){
                 $this->userID = Yii::app()->user->id;
              }

              if ($this->isNewRecord)
                 $this->created = time();
                 return true;
        }
        return false;
    }

    //количество заказов у пользователя
    public static function countOrdersUser($userID){
        $criteria = new CDbCriteria;
        $criteria->compare('userID', $userID);
        return count(self::model()->findAll($criteria));
    }
}