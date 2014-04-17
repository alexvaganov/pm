
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'action' => array('site/login'),
    'htmlOptions'=>array(
        'class'=>'form-signin',
    ),
)); ?>

<h3 class="form-signin-heading">Вход в систему</h3>
<div class="control-group">
    <?php echo $form->textField($model,'username', array('class' => 'input-block-level', 'placeholder' => 'Логин')); ?>
</div>
<div class="control-group">
    <?php echo $form->passwordField($model,'password', array('class' => 'input-block-level', 'placeholder' => 'Пароль')); ?>
</div>

<div class="form-control">
    <?php echo $form->labelEx($model, 'rememberMe', array('class' => 'checkbox', 'label' => $form->checkBox($model,'rememberMe') . 'Запомнить')); ?>
</div>
<?php echo CHtml::submitButton('Вход', array('class' => 'btn btn-large btn-primary')); ?>
<?php $this->endWidget(); ?>

