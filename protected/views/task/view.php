<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->title,
);

$this->layout='//layouts/private';
?>

<script type="text/javascript">
        $(function(){
            if($('#not_performed').find('.affair').text()){
                $('#not_performed').show();
            } else if ($('#performed').find('.affair').text()){
                $('#performed').show();
            }
            $('#affair').on('blur',function(){
                $('#add_affair').show();
                $(this).hide();
            });
            $('#affair-form').on('submit',function(){
                $.ajax({
                    "type": "POST",
                    "dataType": "JSON",
                    "url": "<?php echo CHtml::normalizeUrl(array("task/view/".$model->id)); ?>",
                    "data": $("#affair-form").serialize(),
                    "success": function(data){
                            var affair=$('#affair-tpl').clone();

                            $('#not_performed').append(affair);
                        }
                });
            return false;
            });
            $('#add_affair').on('click',function(){
                addAffairField(this);
                return false;
            });
    });
    function addAffairField(link) {
        $('#affair').show();
        $('#affair').focus();
        $(link).hide();
    }
</script>

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
                <p><?php echo nl2br($model->essense); ?></p>
            </div>


            <?php if($model->affairs): ?>
                <h3>Дела</h3>
                <div id="affair-tpl">
                    <?php echo CHtml::checkBox('status'); ?>
                    <span class="text"></span>
                    <?php echo CHtml::button('X',array('class'=>'btn btn-default')); ?>
                </div>

                <div id="not_performed" class="affairs">
                    <?php foreach($model->affairs as $affair): ?>
                        <?php if($affair->status==Affair::NOT_PERFORMED): ?>
                            <div class="affair">
                                <?php echo CHtml::checkBox('status'); ?>
                                <?php echo $affair->text; ?>
                                <?php echo CHtml::ajaxButton('X',CHtml::normalizeUrl(array("affair/delete/".$affair->id)),
                                    array(
                                        'dataType'=>'json',
                                        'type'=>'post',
                                        'success'=>'function() {
                                            alert("OK");
                                         }',
                                    ),
                                    array('class'=>'btn btn-default btn-xs')); ?>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="row">
                <div class="indent-vertical-10 col-md-3">
                    <?php $form = $this->beginWidget('CActiveForm',array(
                        'id'=>'affair-form',
                        'action'=>CHtml::normalizeUrl(array("task/view/".$model->id)))
                    ); ?>
                    <?php echo $form->textField($affairModel,'text',array('id'=>'affair','class'=>'form-control','style'=>'display: none')); ?>
                    <?php echo $form->hiddenField($affairModel,'task_id',array('value'=>$model->id)); ?>
                    <?php $this->endWidget(); ?>
                    <?php echo CHtml::link('+Добавить дело', '#', array('id'=>'add_affair')); ?>
                </div>
            </div>

            <?php if($model->affairs): ?>
                <div id="performed" class="affairs">
                    <h5>Завершенные</h5>
                    <?php foreach($model->affairs as $affair): ?>
                        <?php if($affair->status==Affair::PERFORMED): ?>
                            <div class="affair">
                                <?php echo CHtml::checkBox('status'); ?>
                                <?php echo $affair->text; ?>
                                <?php echo CHtml::button('X',array('class'=>'btn btn-default')); ?>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="panel panel-default">
                <div class="panel-heading"><strong><?php echo $model->getAttributeLabel('subtasks') ?></strong></div>
                <div class="panel-body">
                    <?php $this->widget('CTreeView', array('data' => $tree)) ?>
                </div>
            </div>
        </div>
    </div>
</div>

