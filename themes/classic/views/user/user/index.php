<?php
$this->layout='//layouts/column2';
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
$this->menu=array(
    array('label'=>'<span class="glyphicon glyphicon-user"></span> Все пользователи', 'url'=>array('user/index')),
    array('label'=>'<span class="glyphicon glyphicon-star-empty"></span> Менеджеры', 'url'=>array('user/index/Manager')),
    array('label'=>'<span class="glyphicon glyphicon-star"></span> Старшие менеджеры', 'url'=>array('user/index/Senior')),
    array('label'=>'<span class="glyphicon glyphicon-tower"></span> Администраторы', 'url'=>array('user/index/Admin')),
); ?>

<h1><?php echo UserModule::t("List User"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        array(
            'name' => 'username',
            'type'=>'raw',
            'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
        ),
        'create_at',
        'lastvisit_at',
    ),
)); ?>

