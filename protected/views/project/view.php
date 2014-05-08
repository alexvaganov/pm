<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title,
);
$this->layout='//layouts/private';
?>

<div id='sidebar-left' class="col-md-2">
    <div class="infoblock">
        <span class="label label-success"><?php echo $model->getAttributeLabel('start') ?></span>
        <p><?php echo $model->start ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-danger"><?php echo $model->getAttributeLabel('deadline') ?></span>
        <p><?php echo $model->deadline ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-info"><?php echo $model->getAttributeLabel('manager_id') ?></span>
        <p><?php echo $model->manager->username ?></p>
    </div>
    <div class="infoblock">
        <span class="label label-info"><?php echo $model->getAttributeLabel('author_id') ?></span>
        <p><?php echo $model->author->username ?></p>
    </div>
</div>

<div id="content" class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?php echo $model->title; ?></strong><?php echo CHtml::link('Редактировать',array('project/update','id'=>$model->id),array('class'=>'btn btn-primary btn-xs pull-right')) ?></div>
        <div class="panel-body">
            <div class="well">
                <p><?php echo nl2br($model->goals) ?></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Задачи проекта</strong></div>
                <div class="panel-body">
                    <?php if(!empty($tree))
                                $this->widget('CTreeView', array('data' => $tree));
                            else
                                echo 'Нет задач для даного проекта';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

