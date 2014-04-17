<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
$this->breadcrumbs=array(
	'Авторизация',
);
?>

<div class="container">
    <div class="row">
        <div class="span4 offset4"
            <div class="form-horizontal">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                    'htmlOptions'=>array(

                    )
                )); ?>
                <?php CHtml::$errorContainerTag = 'span'; ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <div class="control-group">
                            <?php echo $form->labelEx($model,'username', array('class'=> 'control-label')); ?>
                            <?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model,'username', array('class' => 'help-inline')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'password', array('class'=> 'col-lg-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model,'password'); ?>
                        </div>
                        <p class="hint">
                            Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
                        </p>
                    </div>

                    <div class="row rememberMe">
                        <?php echo $form->checkBox($model,'rememberMe'); ?>
                        <?php echo $form->label($model,'rememberMe'); ?>
                        <?php echo $form->error($model,'rememberMe'); ?>
                    </div>

                    <div class="row buttons">
                        <?php echo CHtml::submitButton('Login'); ?>
                    </div>

                <?php $this->endWidget(); ?>
            </div><!-- form -->
    </div>
</div>