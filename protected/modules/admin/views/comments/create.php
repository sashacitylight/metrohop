<?php
$this->breadcrumbs = array(
	'Comments'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Журнал Комментариев', 'url'=>array('index')),
);
?>

<h1>Создать Комментарий</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>