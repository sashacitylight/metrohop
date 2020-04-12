<?php
class CProductViewed extends CController
{
    private $_viewedProductCookieName='ProductViewedCookieName';
    private $_viewedProductCookie;


    //в конструкторе создаём объект класса CCookies
    public function CProductViewed(){
        $this->_viewedProductCookie = new CCookies($this->_viewedProductCookieName);
    }

    //при подробном просмотре товара записываем его ID в массив куки просмотренных товаров
    public function addProductViewed($id)
    {
        ///закидываем просмотренный товар в куки по id

        //если уже есть массив просматренных товаров
        if($this->_viewedProductCookie->hasCookie())
        {
            if($this->_viewedProductCookie->getCookie())
            {
                //читаем с куки
                $productViewedListCookie = unserialize($this->_viewedProductCookie->getCookie());
                //добавление в массив товара
                $productViewedListCookie[] = $id;
                //уникальность массива чтобы без повторов проверить
                $productViewedListCookie = array_unique($productViewedListCookie);
                //опять его сериализуем в строку и запись в куки
                $this->_viewedProductCookie->setCookie(serialize($productViewedListCookie));
                ///переворачиваем массив
                $productViewedListCookie = array_reverse($productViewedListCookie);
                return $productViewedListCookie;
            }
            else
            {
                return NULL;
            }
        }
        else
        {
            //если пустой массив значений просмотренных товаров
            $productViewedListCookie = array();
            $productViewedListCookie[] = $id;
            //запись в куки
            $this->_viewedProductCookie->setCookie(serialize($productViewedListCookie));
            return $productViewedListCookie;
        }
    }

    //получить unserialize массив просмотренных товаров с куки
    public function getProductsViewed()
    {
        ///очистить ранее просмотренные товары
        if($this->_viewedProductCookie->hasCookie()){
            if($this->_viewedProductCookie->getCookie())
            {
                //читаем с куки массив
                $productViewedListCookie = unserialize($this->_viewedProductCookie->getCookie());
                ///переворачиваем массив
                $productViewedListCookie = array_reverse($productViewedListCookie);
                return $productViewedListCookie;
            }
            else{
                return NULL;
            }
        }
        else
        {
            return NULL;
        }
    }

    //очистить массив куки просмотренных товаров
    public function clearProductsViewed(){
        $this->_viewedProductCookie->clearCookie();
    }

}
?>