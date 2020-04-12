<?php
class CCookies extends CController
{
    private $_cookieName;
    private $_cookieValue;

    //записываем имя куки
    public function CCookies($name){
        $this->_cookieName = $name;
    }

    //запись значения куки
    public function setCookie($value){
        $this->_cookieValue = $value;
        $cookie = new CHttpCookie($this->_cookieName, $this->_cookieValue);
        $cookie->expire = time()+60*60*24*180;
        Yii::app()->request->cookies[$this->_cookieName] = $cookie;
    }

    //получение данного куки
    public function getCookie(){
        return Yii::app()->request->cookies[$this->_cookieName]->value;
    }

    //пустые ли куки или нет
    public function hasCookie(){
        return !empty(Yii::app()->request->cookies[$this->_cookieName]->value);
    }

    //очистка куки
    public function clearCookie(){
        unset(Yii::app()->request->cookies[$this->_cookieName]);
    }

}
?>