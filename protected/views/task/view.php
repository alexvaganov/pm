<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Задачи'=>array('index'),
	$model->title,
);

$this->layout='//layouts/private';
?>

<script type="text/javascript">
        $(function(){
            function updateAffairsBlocks() {
                if($('#performed').find('.affair').text()){
                    $('#performed').show();
                } else {
                    $('#performed').hide();
                }
            }
            updateAffairsBlocks();
            <!--Lost focus of adding affair field-->
            $('#affairField').on('blur',function(){
                $('#addAffair').show();
                $(this).val('').parent().hide();
            });
            <!--Add new affair-->
            $('#affair-form').on('submit',function(){
                $.ajax({
                    "type": "POST",
                    "dataType": "JSON",
                    "url": "<?php echo CHtml::normalizeUrl(array("affair/create")); ?>",
                    "data": $("#affair-form").serialize(),
                    "success": function(data){
                        $('#affairField').blur().val('');
                        var affair=$('.affair.hidden').clone();
                        $(".text", affair).text(data.affair);
                        $(".remove", affair).attr('id',data.id);
                        $(affair).attr('class','affair');
                        $('#not_performed').append(affair);
                    }
                });
            return false;
            });
            <!--Delete affair from task-->
            $('body').on('click', '.remove', function(){
                var button=this;
                $.ajax({
                    "type": "POST",
                    "url": "<?php echo CHtml::normalizeUrl(array("affair/delete")); ?>"+"/"+$(button).attr('id'),
                    "success": function(){
                        $(button).parent('.affair').remove();
                        updateAffairsBlocks();
                    }
                });
            });
            <!--Show affair adding field when adding link was clicked-->
            $('#addAffair').on('click',function(){
                $('.input-group').show().find('#affairField').focus();
                $(this).hide();
                return false;
            });
            <!--Change affair status-->
            $('body').on('click', 'input[name=status]', function(){
                var button=$(this).parent().find('.remove');
                var status;
                var container;
                if(this.checked) {
                    status='<?php echo Affair::PERFORMED; ?>';
                    container='#performed';
                } else {
                    status='<?php echo Affair::NOT_PERFORMED; ?>';
                    container='#not_performed';
                }
                $.ajax({
                    "type": "POST",
                    "data": "status="+status,
                    "url": "<?php echo CHtml::normalizeUrl(array("affair/changeStatus")); ?>"+"/"+$(button).attr('id'),
                    "success": function(){
                        $(button).parent('.affair').appendTo(container);
                        updateAffairsBlocks();
                    }
                });
            });
        });
</script>

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
        <div class="panel-heading"><strong><?php echo $model->title; ?></strong></div>
        <div class="panel-body">
            <div class="well">
                <p><?php echo nl2br($model->essense); ?></p>
            </div>

            <h3>Дела</h3>
            <!--Template for new affairs-->
            <div class="affair hidden">
                <?php echo CHtml::checkBox('status'); ?>
                <span class="text"></span>
                <?php echo CHtml::button('X',array('class'=>'btn btn-default btn-xs remove')); ?>
            </div>


                <div id="not_performed" class="affairs">
                    <?php $this->renderPartial('_affairs', array(
                        'status'=>Affair::NOT_PERFORMED,
                        'model'=>$model)); ?>
                </div>

            <div class="row">
                <div class="indent-vertical-10 col-md-3">
                    <?php $form = $this->beginWidget('CActiveForm',array(
                        'id'=>'affair-form',
                        'action'=>CHtml::normalizeUrl(array("affair/create")))
                    ); ?>
                    <div class="input-group" style="display: none">
                        <?php echo $form->textField($affairModel,'text',array('id'=>'affairField','class'=>'form-control')); ?>
                        <?php echo $form->error($affairModel,'text'); ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                        <?php echo $form->hiddenField($affairModel,'task_id',array('value'=>$model->id)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                    <?php echo CHtml::link('+Добавить дело', '#', array('id'=>'addAffair')); ?>
                </div>
            </div>

            <div id="performed" class="affairs">
                <h5>Завершенные</h5>
                <?php $this->renderPartial('_affairs', array(
                    'status'=>Affair::PERFORMED,
                    'model'=>$model)); ?>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong><?php echo $model->getAttributeLabel('subtasks') ?></strong></div>
                <div class="panel-body">
                    <?php if(!empty($tree))
                        $this->widget('CTreeView', array('data' => $tree)) ;
                    else
                        echo '<i>Нет подзадач</i>';
                    ?>
                </div>
            </div>

            <div class="text-center">
            <?php $this->renderPartial('_bottom-menu',array('model'=>$model)); ?>
            </div>
        </div>
    </div>
</div>

