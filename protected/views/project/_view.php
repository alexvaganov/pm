<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="<?php echo CHtml::encode($data->url); ?>"><?php echo CHtml::encode($data->title); ?></a>
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#project<?php echo CHtml::encode($data->id); ?>">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </a>
        </h3>
    </div>
    <div id="project<?php echo CHtml::encode($data->id); ?>" class="panel-collapse collapse">
        <div class="panel-body">

            <?php echo nl2br(CHtml::encode($data->goals)); ?>
            <br />

            <div class="project-column">
                <span class="label label-success"><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</span>
                <?php echo CHtml::encode($data->start); ?>
            </div>
            <div class="project-column">
                <span class="label label-danger"><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</span>
                <?php echo CHtml::encode($data->deadline); ?>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></th>
                    <th><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?></th>
                    <th><?php echo CHtml::encode($data->getAttributeLabel('responsible')); ?></th>
                    <th><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->maintasks as $task): ?>
                <tr>
                    <td><?php echo CHtml::link($task->title, $task->url)  ?></td>
                    <td><?php echo $task->deadline ?></td>
                    <td><?php echo $task->responsible->username ?></td>
                    <td><?php echo $task->author->username ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>