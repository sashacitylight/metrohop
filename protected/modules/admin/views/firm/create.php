<?php
$this->breadcrumbs = array(
	'Firms'=>array('index'),
	'Создать',
);

$this->menu = array(
    array('label'=>'Журнал Поставщиков', 'url'=>array('index')),
);
?>

<h1>Создать Поставщика</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>