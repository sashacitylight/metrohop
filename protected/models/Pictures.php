<?php
class Pictures extends CActiveRecord
{
    public $image; /////////////////////объевляем параметр куда будем заливать image
	public function tableName()
	{
		return 'tbl_pictures';
	}

	public function rules()
	{
		return array(
			array('picProductID, picUrl', 'required'),
            array('image', 'file', 'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 5, // 5 MB
                'allowEmpty'=>'true',
            ),
            array('picProductID', 'numerical', 'integerOnly'=>true),
			array('picUrl', 'length', 'max'=>255),
			array('id, picProductID, picUrl', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'Product' => array(self::BELONGS_TO, 'Product', 'picProductID'),
        );
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'Картинка#',
			'picProductID' => 'Товар#',
			'picUrl' => 'Адрес картинки',
            'Product' => 'Товар',
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('picProductID', $this->picProductID);
		$criteria->compare('picUrl', $this->picUrl, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //получить массив картинок по ID товара
    public static function getPicturesFromProductID($id)
    {
        $criteria = new CDbCriteria;
        $criteria->compare('picProductID', $id);
        $pictModel = self::model()->findAll($criteria);
        return $pictModel;
    }

    //Список Изображений по Id товара
    public function productPicturesList($id){
        $criteria = new CDbCriteria;
        $criteria->compare('picProductID', $id);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
