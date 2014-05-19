<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Проекты'=>array('index'),
	$model->title,
);
$this->layout='//layouts/private';
?>

<div id='sidebar-left' class="col-md-2">
    <?php $this->renderPartial('_left-infoblock',array('model'=>$model)); ?>
</div>

<div id="content" class="col-md-10">

    <div class="row">
        <div class="col-xs-12" id="breadcrumb">
            <?php if(isset($this->breadcrumbs)):
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'homeLink'=>false,
                'tagName'=>'ul',
                'separator'=>'',
                'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                'inactiveLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                'htmlOptions'=>array ('class'=>'breadcrumb')
            )); ?><!-- breadcrumbs -->
            <?php endif; ?>
        </div>
    </div>

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

