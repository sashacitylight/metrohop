<?php
$this->breadcrumbs = array(
	'Categories'=>array('index'),
	'Создать',
);

$this->menu = array(
    array('label'=>'Журнал Категорий', 'url'=>array('index')),
);
?>

<h1>Создать Категорию</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>