<?php
class CCart extends CController
{

    private $_cartCookieName = 'CartCookieName';
    private $_cartCookie;

    //в конструкторе создаём объект класса CCookies
    public function CCart(){
        $this->_cartCookie = new CCookies($this->_cartCookieName);
    }

    //проверка на пустоту корзины
    public function hasProducts(){
       return $this->_cartCookie->hasCookie();
    }

    //добавление в корзину
    public function addToCart($id, $number, $property1, $property2, $propertyID){
        $model = Product::loadModel($id);

        $title = $model->Title;
        $price = $model->Price;
        $imgUrl = $model->ProductArtUrl;

        if ($this->_cartCookie->hasCookie())
        {
            $cookieValue = $this->_cartCookie->getCookie();
            $listCookieValues = unserialize($cookieValue);
            $count = count($listCookieValues)+1;

            if($count>9){
                //если корзина переполнена
                return json_encode($listCookieValues);
            }
            else
            {
                array_unshift($listCookieValues, array('id'=>$id, 'title'=>$title, 'price'=>$price,'imgUrl'=>$imgUrl,
                    'propertyID'=>$propertyID, 'number'=>$number, 'property1'=>$property1, 'property2'=>$property2,
                    'allCount'=>$count));
                $resultToCookie = serialize($listCookieValues);
                $this->_cartCookie->setCookie($resultToCookie);
                return json_encode($listCookieValues);
            }
        }
        else
        {
            //если только первая запись в кукис корзины
            $listToCart = array();

            $listToCart[] = array('id'=>$id, 'title'=>$title, 'price'=>$price, 'imgUrl'=>$imgUrl, 'propertyID'=>$propertyID,
                'number'=>$number, 'property1'=>$property1, 'property2'=>$property2);
            $resultToCookie = serialize($listToCart);
            $this->_cartCookie->setCookie($resultToCookie);
            return json_encode($listToCart);
        }
    }

    //удаление товара с корзины
    public function deleteProduct($productID){
        $cookieValue = $this->_cartCookie->getCookie();
        $listCookieValues = unserialize($cookieValue);
        unset($listCookieValues[$productID]);

        $resultToCookie = serialize($listCookieValues);
        $this->_cartCookie->setCookie($resultToCookie);

        if (empty($listCookieValues)){
            ////////очищаем полностью уже куки до конца передаём оповещение
            echo 'empty';
            $this->_cartCookie->clearCookie();
        }
    }

    //очистка корзины
    public function clearCart(){
        unset(Yii::app()->request->cookies[$this->_cartCookieName]);
    }

    // получить массив с куки товаров которые есть в корзине
    public function getListProductsCart(){

        if($this->_cartCookie->hasCookie())
        {
            if($this->_cartCookie->getCookie())
            {
                $cookieValue = $this->_cartCookie->getCookie();
                $listCookieValues = unserialize($cookieValue);
                return $listCookieValues;
            }
            else
            {
                return NULL;
            }
        }
        else
        {
            return NULL;
        }
    }

    //количество товаров в корзине
    public function countCart(){
        if($this->hasProducts())
        {
            if($this->getListProductsCart())
            {
                $listValuesCookieIs = $this->getListProductsCart();
                return count($listValuesCookieIs);
            }
            //если пусто то значение 0
            else
            {
                return 0;
            }
        }
        //если пусто то значение 0
        else
        {
           return 0;
        }
    }

}
?>