<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Проекты'=>array('index'),
	'Администрирование',
);
$this->pageTitle='Администрирование проектов'.' - '.Yii::app()->name;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление проектами</h1>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'users'=>$users,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'goals',
		'start',
		'deadline',
	    array(
            'name'=>'manager_id',
            'type'=>'raw',
            'value'=>'$data->manager->profile->fullname'
        ),
        array(
            'name'=>'author_id',
            'type'=>'raw',
            'value'=>'$data->author->profile->fullname',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
