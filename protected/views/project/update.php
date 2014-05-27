<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Проекты'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);
$this->pageTitle='Редактирование проекта "'.$model->title.'" - '.Yii::app()->name;
?>

<h2>Редактирование проекта "<?php echo $model->title; ?>"</h2>

<?php $this->renderPartial('_form', array('model'=>$model,'managers'=>$managers)); ?>