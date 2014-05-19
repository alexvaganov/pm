<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Задачи'=>array('index'),
	'Постановка',
);

?>

<h1>Постановка задачи</h1>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'projects'=>$projects,
    'users'=>$users)); ?>