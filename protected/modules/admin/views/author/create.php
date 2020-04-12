<?php
$this->breadcrumbs = array(
	'Authors'=>array('index'),
	'Создать',
);

$this->menu = array(
	array('label'=>'Журнал Авторов', 'url'=>array('index')),
);
?>

<h1>Создать Автора</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>