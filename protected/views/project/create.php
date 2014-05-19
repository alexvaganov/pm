<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Проекты'=>array('index'),
	'Создание',
);

?>

<h2>Создать проект</h2>

<?php $this->renderPartial('_form', array('model'=>$model,'managers'=>$managers)); ?>