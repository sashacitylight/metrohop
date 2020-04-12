<?php
class CHelperMethods extends CController
{
   public function CHelperMethods(){}

    //подключить javascript с файла
    public function includeJavascript($url){
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl.$url);
    }
}
?>