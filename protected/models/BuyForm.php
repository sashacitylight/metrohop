<?php
class BuyForm extends CFormModel
{
    //форма покупки на странице товары
    public $productIDValue; //ProductId
    public $propertyIDValue; //PropertyId с таблицы ProductPropertiesList
    public $numberValue; //количество товара

    public function rules()
    {

        return array(
            array('productIDValue, numberValue', 'required'),
            array('productIDValue, numberValue', 'numerical', 'integerOnly' => TRUE, 'min' => '1'),
            array('propertyIDValue', 'numerical', 'integerOnly' => TRUE),
        );
    }

    public function attributeLabels()
    {
        return array(
           'productIDValue'=>'Номер Товара',
           'propertyIDValue'=>'Характеристика товара',
           'numberValue'=>'Количество'
        );
    }

}
