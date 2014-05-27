<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Задачи',
);
$this->pageTitle='Задачи'.' - '.Yii::app()->name;
?>

<h1 class="col-lg-5">Задачи</h1>
<?php echo CHtml::link('Создать задачу',array('task/create'), array('class'=>'btn btn-success btn-lg pull-right')) ?>
<div class="clearfix"></div>

<div id="task-list">
    <?php $this->renderPartial('_index-part', array('dataProvider'=>$dataProvider)); ?>
</div>