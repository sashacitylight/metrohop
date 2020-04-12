<?php
$this->breadcrumbs = array(
	'Sub Categories'=>array('index'),
	'Создать',
);

$this->menu = array(
	array('label'=>'Журнал ПодКатегорий', 'url'=>array('index')),
);
?>

<h1>Создать ПодКатегорию</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>