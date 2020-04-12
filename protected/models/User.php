<?php
class User extends CActiveRecord
{
    public $verifyCode;
    const ROLE_ADMIN = 'admin_old';
    const ROLE_USER = 'newuser';
    const ROLE_BANNED = 'banned';

	public function tableName()
	{
		return 'tbl_user';
	}

	public function rules()
	{
		return array(
			array('username, name, telefon, email, password', 'required'),
            array('email', 'email'),
            array('username', 'match', 'pattern'=>'/^([A-Za-z0-9 ]+)$/u', 'message'=>'Допустимые символы A-Za-z0-9 .'),
            array('role, ban, userCreated', 'numerical', 'integerOnly'=>true),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
			array('username, name, adress, telefon, email, password', 'length', 'max'=>255),
			array('id, username, adress, name, telefon, email, password, role, ban, userCreated', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Логин',
			'name' => 'Имя пользователя',
			'telefon' => 'Телефон',
			'email' => 'Эмейл',
			'password' => 'Пароль',
			'role' => 'Роль',
			'ban' => 'Бан',
            'adress'=>'Адрес пользователя',
            'userCreated'=>'Дата регистрации',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
        $criteria->order = 'userCreated DESC';

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('telefon', $this->telefon, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('role', $this->role);
		$criteria->compare('ban', $this->ban);
        $criteria->compare('adress', $this->adress);
        $criteria->compare('userCreated', $this->adress);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave(){
        if(parent::beforeSave()){
            if ($this->isNewRecord)
                $this->role = 1;
                $this->ban = 0;
                $this->password = md5($this->password);
                $this->userCreated = time();
               return true;
        }
        return false;
    }
}
