<?php
$this->breadcrumbs = array(
	'Products'=>array('index'),
	'Создать',
);

$this->menu = array(
	array('label'=>'Журнал товаров', 'url'=>array('index')),
);
?>

<h1>Создать Товар</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>