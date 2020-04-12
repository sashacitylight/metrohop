<?php
class SearchForm extends CFormModel
{
    public $SubCategoriesId;
    public $Title;
    public $pFirmID;
    public $info;
    public $pDiscount;
    public $overallRating;
    public $price1;
    public $price2;
    public $authorName;
    public $AdditionalInfo;
    public $CategoryId;

    public function rules()
    {
        return array(
            // username and password are required
            array('SubCategoriesId, id, price1, price2, AuthorId, pFirmID, ToolId, pDiscount, pNumberOrders, overallRating, pCommentsNumber', 'numerical', 'integerOnly'=>true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => '№ Товара',
            'info'=>'Подробности',
            'SubCategoriesId' => 'Подкатегории',
            'AuthorId' => 'Автор',
            'authorName'=>'Автор',
            'Title' => 'Название',
            'Price' => 'Цена',
            'price1'=>'Начальная Цена',
            'price2'=>'Конечная Цена',
            'ProductArtUrl' => 'Картинка',
            'pFirmID' => '№ Поставщика',
            'AdditionalInfo' => 'Подробное описание',
            'ToolId' => 'Cвойства товара',
            'pDiscount' => 'Скидка',
            'pNumberOrders' => 'Количество заказов',
            'overallRating' => 'Рейтинг',
            'pCommentsNumber' => 'Количество отзывов',
            'SubCategory'=>'Категория',
            'Firm'=>'Поставщик',
            'Author'=>'Автор',
            'Category'=>'Категория'
        );
    }


}
?>
