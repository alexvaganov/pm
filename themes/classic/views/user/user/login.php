<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<div class="container">
    <div class="row">
        <div class="span6 offset3">
            <?php echo CHtml::errorSummary($model, null, null, array('class'=>'alert alert-error')); ?>
        </div>
    </div>

    <div class="row">
        <div class="span6 offset3">
            <div class="form-signin">
                <h3 class="form-signin-heading">Вход в систему</h3>
                <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

                <div class="success">
                    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                </div>

                <?php endif; ?>

                <?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>

                <div class="group">
                    <?php echo CHtml::activeLabelEx($model,'username'); ?>
                    <?php echo CHtml::activeTextField($model,'username') ?>
                </div>

                <div class="group">
                    <?php echo CHtml::activeLabelEx($model,'password'); ?>
                    <?php echo CHtml::activePasswordField($model,'password') ?>
                </div>

                <div class="group">
                    <p class="hint">
                        <?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                    </p>
                </div>

                <div class="form-inline">
                    <?php echo CHtml::activeCheckBox($model,'rememberMe') ?>
                    <?php echo CHtml::activeLabelEx($model,'rememberMe') ?>
                </div>

                <div class="group">
                    <?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'btn')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
        </div>
    </div>
</div>


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>