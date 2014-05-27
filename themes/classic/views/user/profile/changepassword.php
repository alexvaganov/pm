<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
$this->layout='//layouts/column2-user';
?>

<h1><?php echo UserModule::t("Change password"); ?></h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
        'inputContainer'=>'.form-group',
        'errorCssClass'=>'has-error',
	),
    'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
    <?php if($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif ?>

    <div class="form-group">
	<?php echo $form->labelEx($model,'oldPassword',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
        <?php echo $form->passwordField($model,'oldPassword',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'oldPassword'); ?>
        </div>
	</div>

    <div class="form-group">
	<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'password'); ?>
        </div>
	</div>

    <div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
        <?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'verifyPassword'); ?>
        </div>
	</div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
	    <?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-default')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->