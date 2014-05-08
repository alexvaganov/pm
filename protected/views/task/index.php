<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks',
);

?>

<h1 class="col-lg-5">Мои задачи</h1>
<?php echo CHtml::link('Создать задачу',array('task/create'), array('class'=>'btn btn-success btn-lg pull-right')) ?>
<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
    'itemsCssClass'=>'',
    'htmlOptions'=>array('class'=>'panel-group', 'id'=>'accordion')
)); ?>