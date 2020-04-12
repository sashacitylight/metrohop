<?php
$model = Product::model()->findAll();
$comment_model = new Comments();
foreach($model as $models){
    $comment_model->setAttributes(
        array(
            'cProductID'=>$models->id,
            'cName' => 'user11',
            'created' => time(),
            'cReiting' => 2,
            'cText'=>'Доставка,иногда бывает ,что 2 месяца ждать приходить,ну а так минусов не вижу).
                если повезет, то можно сделать более менее удачную покупку.
                не советую покупать более дорогие товары они качественнее не будут. мой горький опыт.',
        ), false);
    $comment_model->save(false);


    /*$comment_model->setAttributes(
        array(
            'cProductID'=>$models->id,
            'cName' => 'Natasha234',
            'created' => time(),
            'cReiting' => 5,
            'cText'=>'Я обратила внимание, что многие пишут что на али торгуют одни мошенники... я не согласна с этим... Из 86 заказов был только 1 спор, при завершении которого мне вернули полную стоимость товара',
        ), false);
    $comment_model->save(false);


    $comment_model->setAttributes(
        array(
            'cProductID'=>$models->id,
            'cName' => 'Vasya22',
            'created' => time(),
            'cReiting' => 3,
            'cText'=>'Оплачиваешь заказ, не можешь его отследить, ждешь 1-2 месяца',
        ), false);
    $comment_model->save(false);


    $comment_model->setAttributes(
        array(
            'cProductID'=>$models->id,
            'cName' => 'Katya',
            'created' => time(),
            'cReiting' => 4,
            'cText'=>'Оплачиваешь заказ, не можешь его отследить, ждешь 1-2 месяца, открываешь спор',
        ), false);
    $comment_model->save(false);*/
}?>