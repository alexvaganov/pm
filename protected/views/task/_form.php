<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<?php
$assets = Yii::app()->assetManager->publish( Yii::getPathOfAlias('application.assets'));
echo CHtml::cssFile($assets.'/plugins/bootstrap/datepicker/css/bootstrap-datetimepicker.min.css');
echo CHtml::cssFile($assets.'/plugins/bootstrap/wysihtml/bootstrap-wysihtml5.css');
echo CHtml::scriptFile($assets.'/plugins/bootstrap/datepicker/js/moment.min.js');
echo CHtml::scriptFile($assets.'/plugins/bootstrap/datepicker/js/bootstrap-datetimepicker.min.js');
echo CHtml::scriptFile($assets. '/plugins/bootstrap/datepicker/js/bootstrap-datetimepicker.ru.js');


?>

<?php Yii::app()->clientScript->registerScript('calendar',"
    $(function () {
        $('#deadline').datetimepicker({
            language: 'ru'
        });
        $('#textarea').wysihtml5({
            'size': 'default',
            'link': false, //Button to insert a link. Default true
            'image': false, //Button to insert an image. Default true,
        });
    });"
) ?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'project-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'htmlOptions'=>array('class'=>'form-horizontal'),
        'clientOptions'=>array(
            'inputContainer'=>'.form-group',
            'errorCssClass'=>'has-error',
        ),
    )); ?>

    <p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

    <?php if($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif ?>


    <div class="form-group">
        <?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-7">
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'essense', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-7">
            <?php echo $form->textArea($model,'essense',array('rows'=>6, 'cols'=>50,'class'=>'form-control', 'id'=>'textarea')); ?>
            <?php echo $form->error($model,'essense'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'deadline',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <div class='input-group date' id='deadline'>
                <?php echo $form->textField($model,'deadline',array('class'=>'form-control', 'data-format'=>'YYYY-MM-DD hh:mm:ss')); ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <?php echo $form->error($model,'deadline'); ?>
        </div>
    </div>

    <?php if($model->isNewRecord): ?>
        <div class="form-group">
            <?php echo $form->labelEx($model,'project_id',array('class'=>'col-sm-2 control-label')); ?>
            <div class="col-sm-4">
                <?php echo $form->dropDownList($model,'project_id',CHtml::listData($projects,'id','title'),array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'project_id'); ?>
            </div>
        </div>
    <?php endif ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <?php echo $form->labelEx($model,'is_burning'); ?>
                <?php echo $form->checkBox($model,'is_burning'); ?>
            </div>
            <?php echo $form->error($model,'is_burning'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'responsible_id',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model,'responsible_id',CHtml::listData($users,'id','username'),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'responsible_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-default')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->