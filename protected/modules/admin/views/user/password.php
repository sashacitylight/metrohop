<?php
$this->menu = array(
    array('label'=>'Журнал Пользователей', 'url'=>array('index')),
    array('label'=>'Просмотр Пользователя', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить Пользователя', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>Укажите пароль</h1><br/>
<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::submitButton('Изменить');
    echo CHtml::endForm();
?>
