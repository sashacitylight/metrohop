<?php
$this->breadcrumbs = array(
	'Product Properties'=>array('index'),
	'Создать',
);

$this->menu=array(
    array('label'=>'Журнал Характеристик', 'url'=>array('index')),
);
?>

<h1>Создать Характеристику</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>