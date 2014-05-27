<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Задачи'=>array('index'),
	'Постановка',
);
$this->pageTitle='Создание задачи'.' - '.Yii::app()->name;
?>

<h1>Постановка задачи</h1>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'projects'=>$projects,
    'users'=>$users)); ?>