<div style="text-align: center"><h1>Просмотр пользователя #<?php echo $userModel->username; ?></h1></div>

<div class="personalAccountUser">
<?php
//информация о пользователе
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$userModel,
    'htmlOptions'=>array('class'=>'registrationForm'),
    'attributes'=>array(
        'username',
        'name',
        'telefon',
        'email',
        'adress'=>array(
            'visible'=>$model->adress == null ? false : true,   ////ЕСЛИ ПУСТАЯ ЯЧЕЙКА
            'name'=>'adress',
            'value' => $model->adress
        ),
        'role'=>array(
            'name'=>'Роль',
            'value'=> ($userModel->role==1)?"User":"ADMIN",
        ),
        'number'=>array(
            'name'=>'Заказов',
            'number'=>'Количество заказов',
            'value'=> (empty($countOrder))?"Нет заказов":($countOrder),
        ),
    ),
)); ?>
</div>



<?php
//если у пользователя есть заказы
//список заказов пользователя
    if($countOrder>0){
?>
<div style="text-align: center"><h1>Заказы пользователя #<?php echo $userModel->username; ?></h1></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'orderGrid',
    'htmlOptions' => array('class' => 'personalAccountTable'),
    'dataProvider'=>$model->searchWithFilter($userModel->id),
    'columns'=>array(
        'order_number'=>array(
            'name'=>'Имя пользователя',
           // 'value'=>'$data->product->Title',
            'value' => 'CHtml::link($data->product->Title,array(\'ProductDescription/ProductDetailedDescription\',\'id\'=>$data->product->id))',
            'type'=>'html',
            'htmlOptions'=>array('width'=>'15px'),
        ),
        'img'=>array(
            'name'=>'Картинка',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl . $data->product->ProductArtUrl,
                 "",
                array(\'width\'=>100, \'height\'=>100))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'25px'),
        ),

        array(
            'name'=>'Properties',
            'value'=>'(empty($data->Property->feature1)) ? "" : $data->Property->feature1',
            'htmlOptions'=>array('width'=>'10px'),
        ),

        array(
            'name'=>'Properties',
            'value'=>'(empty($data->Property->feature2)) ? "" : $data->Property->feature2',
            'htmlOptions'=>array('width'=>'10px'),
        ),
        'id'=>array(
            'name'=>'№ заказа',
            'value'=>'$data->id',
            'htmlOptions'=>array('width'=>'5px'),
        ),
        'number'=>array(
            'name'=>'number',
            'value'=>'$data->number',
            'htmlOptions'=>array('width'=>'5px'),
        ),
        'username'=>array(
            'name'=>'username',
            'value'=>'$data->username',
            'htmlOptions'=>array('width'=>'10px'),
        ),
        'email'=>array(
            'name'=>'email',
            'value'=>'$data->email',
            'htmlOptions'=>array('width'=>'10px'),
        ),
        'telefone',

        'adress'=>array(
            'name'=>'adress',
            'value'=>'(empty($data->adress)) ? "0" : $data->adress',
            'htmlOptions'=>array('width'=>'10px'),
        ),

        'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y H:i",$data->created)',
            'filter'=> false,
            'htmlOptions'=>array('width'=>'10px'),
        ),

        array(
            'class'=>'CButtonColumn',

            'updateButtonOptions'=>array('style'=>'display:none'),
            'viewButtonOptions'=>array('style'=>'display:none'),
            'deleteButtonOptions'=>array('style'=>'display:none'),
        ),
    ),
)); ?>

<?php
    }else{
        echo "<div style='text-align: center'><h1>Заказов нет</h1></div>";
    }
?>