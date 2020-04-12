<?php
class Categories extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_categories';
	}

	public function rules()
	{
		return array(
			array('id, name', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'SubCategories' =>array(self::HAS_MANY, 'SubCategories', 'catID'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Категория#',
			'name' => 'Название',
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function All(){

        return CHtml::listData(self::model()->findAll(), 'id', 'name');
    }


    public static function getCategory($id){
        $model = SubCategories::model()->findByPk($id);
        $cat = $model->catID;
        $model = self::model()->findByPk($cat);

        return $model->name;
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
