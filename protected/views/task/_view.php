<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo CHtml::link(CHtml::encode($data->title), $data->url) ?>
            <?php echo CHtml::link('<i class="glyphicon glyphicon-chevron-down"></i>','#task'.CHtml::encode($data->id),
                array('class'=>'accordion-toggle','data-toggle'=>'collapse','data-parent'=>'#accordion')) ?>
        </h3>
    </div>

    <div id="task<?php echo CHtml::encode($data->id); ?>" class="panel-collapse collapse">
        <div class="panel-body">

            <div class="panel-part">
                <span class="label label-danger"><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</span>
                <?php echo CHtml::encode($data->deadline); ?>
            </div>

            <div class="panel-part">
                <span class="label label-info"><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</span>
                <?php echo CHtml::link(CHtml::encode($data->project->title),$data->project->url) ?>
            </div>
        </div>
    </div>
</div>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_burning')); ?>:</b>
	<?php echo CHtml::encode($data->is_burning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_expire')); ?>:</b>
	<?php echo CHtml::encode($data->is_expire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsible_id')); ?>:</b>
	<?php echo CHtml::encode($data->responsible_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />

	*/ ?>
