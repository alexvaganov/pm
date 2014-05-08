<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Update Task', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Task', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
$this->layout='//layouts/private';
?>

<div id='sidebar-left' class="col-md-2">
    <div class="infoblock">
        <span class="label label-success"><?php echo $model->getAttributeLabel('project_id') ?></span>
        <p><?php echo $model->project->title ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-danger"><?php echo $model->getAttributeLabel('deadline') ?></span>
        <p><?php echo $model->deadline ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-info"><?php echo $model->getAttributeLabel('responsible_id') ?></span>
        <p><?php echo $model->responsible->username ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-info"><?php echo $model->getAttributeLabel('author_id') ?></span>
        <p><?php echo $model->author->username ?></p>
    </div>
</div>

<div id="content" class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?php echo $model->title; ?></strong><?php echo CHtml::link('Редактировать',array('task/update','id'=>$model->id),array('class'=>'btn btn-primary btn-xs pull-right')) ?></div>
        <div class="panel-body">
            <div class="well">
                <p><?php echo nl2br($model->essense) ?></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong><?php echo $model->getAttributeLabel('subtasks') ?></strong></div>
                <div class="panel-body">
                    <?php $this->widget('CTreeView', array('data' => $tree)) ?>
                </div>
            </div>
        </div>
    </div>
</div>

