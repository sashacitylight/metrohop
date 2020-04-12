<?php
class CXML extends CController
{

    private $_xml;
    private $_second;
    private $_first;

    //создаём объект xml и разделительный тег
    public function CXML($name){
        $this->_xml = new DOMDocument("1.0","utf-8");
        $this->_first = $this->_xml->createElement($name);
        $this->_xml->appendChild($this->_first);
    }
    //начальный тег без названия
    public function emptyTag($name){
        $this->_second = $this->_xml->createElement($name);
        $this->_first->appendChild($this->_second);
    }

    //тег со значением
    public function valueTag($name, $value){
        $firmID = $this->_xml->createElement($name);
        $this->_second->appendChild($firmID);
        $firmIDValue = $this->_xml->createTextNode($value);
        $firmID->appendChild($firmIDValue);
    }

    //сохранить в файл
    public function save($name){
        $this->_xml->formatOutput=true;
        $dirpath = dirname(Yii::app()->request->scriptFile).'/XML/'.$name;
        $this->_xml->save($dirpath);
    }

}