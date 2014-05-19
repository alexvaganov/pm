<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
$this->layout='//layouts/column2-user';
?>

<h1><?php echo UserModule::t('Edit profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array(
        'enctype'=>'multipart/form-data',
        'class'=>'form-horizontal'
    ),
    'clientOptions'=>array(
        'inputContainer'=>'.form-group',
        'errorCssClass'=>'has-error',
    ),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
        <div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname); ?>
            <div class="col-sm-5">
                <?php if ($widgetEdit = $field->widgetEdit($profile)) {
                    echo $widgetEdit;
                } elseif ($field->range) {
                    echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
                } elseif ($field->field_type=="TEXT") {
                    echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
                } else {
                    echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
                }
                echo $form->error($profile,$field->varname); ?>
            </div>
	</div>	
			<?php
			}
		}
?>

    <div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($profile,'first_name',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($profile,'first_name',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($profile,'first_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($profile,'last_name',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($profile,'last_name',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($profile,'last_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
		    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>'btn btn-default')); ?>
	    </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
