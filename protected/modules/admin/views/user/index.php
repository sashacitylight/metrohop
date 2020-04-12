<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#newuser-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал пользователей</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->
<br/><br/>

<?php
echo CHtml::form();

echo CHtml::submitButton('Бан',array('name'=>'ban', 'class'=>'buttonAdmin'));
echo CHtml::submitButton('Разбанить',array('name'=>'noban', 'class'=>'buttonAdmin'));
?>

<?php
echo '<br/>';
echo CHtml::submitButton('Админ',array('name'=>'admin_old', 'class'=>'buttonAdmin'));
echo CHtml::submitButton('НеАдмин',array('name'=>'noadmin', 'class'=>'buttonAdmin'));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'newuser-grid',
    'selectableRows'=>2,
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('class'=>'adminGridTable'),
    'columns'=>array(
        'id',
        array(
            'class'=>'CCheckBoxColumn',
            'id'=>'userID',
            'htmlOptions' => array('width'=>'20px'),
        ),
        'username',
        'name',
        'password',

        'email'=>array(
            'name'=>'email',
            'value'=>'$data->email',
            'htmlOptions' => array('width'=>'10px'),
        ),
        'adress',
        'userCreated'=>array(
            'name'=>'userCreated',
            'value'=>'date("j.m.Y H:i",$data->userCreated)',
            'filter'=> false,
        ),
        'ban'=>array(
            'name'=>'ban',
            'value'=> '($data->ban==1)?"Бан":""',
            'filter'=>array('1'=>'Да','0'=>'Нет'),
        ),

        'role'=>array(
            'name'=>'role',
            'value'=> '($data->role==1)?"User":"ADMIN"',
            'filter'=>array('2'=>'ADMIN','1'=>'User'),
        ),
        array(
            'class'=>'CButtonColumn',
        ),

    ),
)); ?>

<?php
echo CHtml::endform();
?>
