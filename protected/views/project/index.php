<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Project',
);
?>

<h1 class="col-lg-5">Проекты</h1>
<?php echo CHtml::link('Создать проект',array('project/create'), array('class'=>'btn btn-success btn-lg pull-right')) ?>
<div class="clearfix"></div>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
    'itemsCssClass'=>'',
    'htmlOptions'=>array('class'=>'panel-group', 'id'=>'accordion')
)); ?>


