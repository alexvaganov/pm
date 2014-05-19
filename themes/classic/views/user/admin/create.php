<?php
$this->layout='//layouts/column2';
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

$this->menu=array(
    array('label'=>'<span class="glyphicon glyphicon-star-empty"></span> Создать пользователя', 'url'=>array('admin/create')),
    array('label'=>'<span class="glyphicon glyphicon-star"></span> Список пользователей', 'url'=>array('user/index')),
    array('label'=>'<span class="glyphicon glyphicon-cog"></span> Настройка полей', 'url'=>array('profileField/admin')),
    array('label'=>'<span class="glyphicon glyphicon-tower"></span> Назначить права', 'url'=>array('/rights')),
); ?>

<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>