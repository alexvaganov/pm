<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

                <div class="success">
                    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                </div>

            <?php endif; ?>

            <?php echo CHtml::errorSummary($model, null, null, array('class'=>'alert alert-danger')); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="text-center">Вход в систему</h3>
                        </div>

                        <div class="modal-body overflow-auto">
                            <?php echo CHtml::beginForm('', 'post', array('class'=>'form col-md-12 center-block')); ?>

                            <div class="form-group">
                                <?php echo CHtml::activeTextField($model,'username', array('class'=>'form-control input-lg', 'placeholder'=>'Логин')) ?>
                            </div>

                            <div class="form-group">
                                <?php echo CHtml::activePasswordField($model,'password', array('class'=>'form-control input-lg', 'placeholder'=>'Пароль')) ?>
                            </div>

                            <div class="form-group">
                                <p class="hint">
                                    <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                                </p>
                            </div>

                            <div class="form-inline">
                                <?php echo CHtml::activeCheckBox($model,'rememberMe') ?>
                                <?php echo CHtml::activeLabelEx($model,'rememberMe') ?>
                            </div>

                            <div class="group">
                                <?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'btn btn-primary btn-lg btn-block')); ?>
                            </div>
                            <?php echo CHtml::endForm(); ?>
                        </div>
                    </div>
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