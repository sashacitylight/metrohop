<?php
class Author extends CActiveRecord
{
    public $image;///загружаем картинку

    public function tableName()
	{
		return 'tbl_author';
	}

	public function rules()
	{
        return array(
			array('Name', 'length', 'max'=>120),
			array('AuthorArtUrl', 'length', 'max'=>1000),
            array('image', 'file', 'types'=>'jpg, gif, png',
            'maxSize'=>1024 * 1024 * 5, // 5 MB
			'allowEmpty'=>'true',
            ),

			array('bio', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Name, bio, AuthorArtUrl', 'safe', 'on'=>'search'),
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
			'id' => 'Автор',
			'Name' => 'ФИО',
			'bio' => 'Биография',
			'AuthorArtUrl' => 'Адрес картинки',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('Name', $this->Name, true);
		$criteria->compare('bio', $this->bio, true);
		$criteria->compare('AuthorArtUrl', $this->AuthorArtUrl, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function All(){
        $models = self::model()->findAll();
        $array = CHtml::listData($models, 'id', 'Name');
        return $array;
    }

}
