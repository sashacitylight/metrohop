<?php
class CProductProperties extends CController
{
    private $_baseUrl;
    private $_wayLogoDiscount5 = "/images/logo/discount5.jpg";
    private $_wayLogoDiscount10 = "/images/logo/discount10.png";
    private $_wayLogoDiscount15 = "/images/logo/discount15.png";
    private $_wayLogoDiscount20 = "/images/logo/discount15.png";
    private $_wayLogoDiscount50 = "/images/logo/discount50.png";

    public function CProductProperties(){
    }

    //получить адрес картинки в зависимости от скидки.
    //Входные данные - процент скидки с таблицы товаров и _baseUrl
    //Выходные данные - путь картинки
    public function getProductImageDiscount($percent){
        $imgHrefDiscount = '';
        $this->_baseUrl = Yii::app()->request->baseUrl;
        ////////////////скидки src
        if($percent == 5){
            $imgHrefDiscount = $this->_baseUrl.$this->_wayLogoDiscount5;
        }else if($percent == 10){
            $imgHrefDiscount = $this->_baseUrl.$this->_wayLogoDiscount10;
        }else if($percent == 15){
            $imgHrefDiscount = $this->_baseUrl.$this->_wayLogoDiscount15;
        }else if($percent == 20){
            $imgHrefDiscount = $this->_baseUrl.$this->_wayLogoDiscount20;
        }else if($percent == 50){
            $imgHrefDiscount = $this->_baseUrl.$this->_wayLogoDiscount50;
        }
        return $imgHrefDiscount;
    }
    //начальная цена
    public static function getOldProductPrice($price,$discount){
        if(!empty($discount)){
             $result = $price/((100-$discount)/100);
             $result = number_format($result, 2, '.', '');
             return $result;
        }
        else return 0;
    }
    //оптовая цена
    public static function getNewProductPriceWholeSale($price, $discount){
        if(!empty($discount)){
            $beginPrice = self::getOldProductPrice($price, $discount);
            $resultPriceWhole = $beginPrice - $beginPrice*(($discount+10)/100);
            return 10*$resultPriceWhole;
        }
        else return 0;
    }
    //для рейтинга в таблицах
    public static function getStars($reiting)
    {
        switch ($reiting) {
            case "1":
                return "<span>&#9733</span>";
                break;
            case "2":
                return "<span>&#9733</span><span>&#9733</span>";
                break;
            case "3":
                return "<span>&#9733</span><span>&#9733</span><span>&#9733</span>";
                break;
            case "4":
                return "<span>&#9733</span><span>&#9733</span><span>&#9733</span><span>&#9733</span>";
                break;
            case "5":
                return "<span>&#9733</span><span>&#9733</span><span>&#9733</span><span>&#9733</span><span>&#9733</span>";
                break;
        }
    }


}
?>