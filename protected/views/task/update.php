<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Задачи'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);
$this->pageTitle='Редактирование задачи "'.$model->title.'" - '.Yii::app()->name;
?>

<h1>Редактирование задачи <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'projects'=>$projects,'users'=>$users)); ?>