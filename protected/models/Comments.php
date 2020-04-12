<?php

class Comments extends CActiveRecord
{
    public $verifyCode;
	public function tableName()
	{
		return 'tbl_comments';
	}

	public function rules()
	{

		return array(
			array('cName, cReiting, cText', 'required'),
			array('cProductID, cReiting', 'numerical', 'integerOnly'=>true),
			array('cName, cText', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'comments'),
            array('id, cProductID, cName, created, cReiting, cText', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'Product' => array(self::BELONGS_TO, 'Product', 'cProductID')
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Комментарий#',
			'cProductID' => '№Товар#',
			'cName' => 'Покупатель  (Имя)',
			'created' => 'Дата заказа ',
			'cReiting' => 'Рейтинг',
			'cText' => 'Содержание',
            'Product'=>'Товар',
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
        $criteria->order = 'created DESC';

		$criteria->compare('id', $this->id);
		$criteria->compare('cProductID', $this->cProductID);
		$criteria->compare('cName', $this->cName, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('cReiting', $this->cReiting);
		$criteria->compare('cText', $this->cText, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function searchWithFilter($id)
    {
        $criteria = new CDbCriteria;

        $criteria->order = 'created DESC';
        $criteria->compare('id', $this->id);
        $criteria->compare('cProductID', $id);
        $criteria->compare('cName', $this->cName, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('cReiting', $this->cReiting);
        $criteria->compare('cText', $this->cText);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>7,
            ),
        ));
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave(){
        if(parent::beforeSave())
            {
                if ($this->isNewRecord)
                    $this->created = time();
                return true;
            }
            return false;
    }

    //получить количество комментариев для данного продукта по ID продукта
    public static function getProductCommentsCount($id){
        $criteria = new CDbCriteria;
        $criteria->compare('cProductID',$id);
        return count(self::model()->findAll($criteria));
    }

    ///получить рейтинг продукта по ID продукта
    public static function getProductRating($id){
        $criteria = new CDbCriteria;
        $criteria->compare('cProductID', $id);
        $model = self::model()->findAll($criteria);
        $count = count($model);
        $summ = 0;
        $resultReiting = 0;
        foreach($model as $model){
            $summ += $model->cReiting;
        }
        if(!empty($model)){
            $resultReiting = number_format($summ/$count, 2, '.', '');
        }
        return round($resultReiting);
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
