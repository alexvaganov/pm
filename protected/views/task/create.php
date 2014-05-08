<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	'Create',
);

?>

<h1>Постановка задачи</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'projects'=>$projects,'users'=>$users)); ?>