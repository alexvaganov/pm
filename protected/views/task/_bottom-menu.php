<?php

?>
<div class="btn-group">
    <?php echo CHtml::link('Редактировать',array('task/update/','id'=>$model->id),array('class'=>'btn btn-primary btn-sm', 'visible'=>Yii::app()->user->checkAccess('updateOwnTask'))); ?>
    <?php if($model->responsible_id==Yii::app()->user->id)
        echo CHtml::ajaxButton('Принять к исполнению',array('task/changeStatus/','id'=>$model->id),
            array(
                'type' => 'POST',
                'data'=>array(
                    'status'=>Task::ACCEPTED_FOR_EXECUTIVE,
                ),
                'success'=>"function(){
                    $('.btn').prop('disabled', false);
                    $('#accepted-executive').prop('disabled', true);
                }",
            ),
            array(
                'class'=>'btn btn-success',
                'id'=>'accepted-executive',
                'disabled'=>($model->status==Task::ACCEPTED_FOR_EXECUTIVE||$model->status==Task::SENT_FOR_REVIEW),
            ));
        echo CHtml::ajaxButton('Отправить на проверку',array('task/changeStatus/','id'=>$model->id),
            array(
                'type' => 'POST',
                'data'=>array(
                    'status'=>Task::SENT_FOR_REVIEW,
                ),
                'success'=>"function(){
                        $('.btn').prop('disabled', false);
                        $('#sent-review').prop('disabled', true);
                    }",
            ),
            array(
                'class'=>'btn btn-success',
                'id'=>'sent-review',
                'disabled'=>($model->status==Task::NOT_ACCEPTED||
                        $model->status==Task::SENT_FOR_REVIEW)
            ));
    ?>
    <?php
    if($model->author_id==Yii::app()->user->id)
    {
        echo CHtml::ajaxButton('Принять работу',array('task/changeStatus/','id'=>$model->id),
            array(
                'type' => 'POST',
                'data'=>array(
                    'status'=>Task::COMPLETED,
                ),
                'success'=>"function(){
                    $('.btn').prop('disabled', false);
                    $('#complete').prop('disabled', true);
                }",
            ),
            array(
                'class'=>'btn btn-success',
                'id'=>'complete',
                'disabled'=>$model->status==Task::COMPLETED,
                'visible'=>Yii::app()->user->checkAccess('Task.Create'),
            ));

        echo CHtml::ajaxButton('Удалить',array('task/delete/','id'=>$model->id),
            array(
                'type' => 'POST',
                'beforeSend'=>"function(){
                    return confirm('Вы действительно хотите удалить данную задачу?');
                }",
                'success'=>"function(){
                    location.href='".CHtml::normalizeUrl(array('task/index'))."'
                }",
            ),
            array(
                'class'=>'btn btn-danger',
                'visible'=>Yii::app()->user->checkAccess('Task.Delete'),
            ));
    }
    ?>
    <?php echo CHtml::link('Добавить подзадачу',array('task/create/','id'=>$model->id),array('class'=>'btn btn-primary btn-sm', 'visible'=>Yii::app()->user->checkAccess('createTask'))); ?>

</div>
