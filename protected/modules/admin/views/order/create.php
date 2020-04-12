<?php
$this->breadcrumbs = array(
	'Orders'=>array('index'),
	'Создать',
);

$this->menu = array(
	array('label'=>'Журнал Заказов', 'url'=>array('index')),
);
?>

<h1>Создать Заказ</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>