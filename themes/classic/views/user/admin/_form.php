<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'form-horizontal'),
    'clientOptions'=>array(
        'inputContainer'=>'.form-group',
        'errorCssClass'=>'has-error',
    ),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

    <?php if($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary(array($model,$profile)); ?>
        </div>
    <?php endif ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'superuser',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus'),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'superuser'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'status',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus'),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'status'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($profile,'first_name',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($profile,'first_name',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($profile,'first_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($profile,'last_name',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($profile,'last_name',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
            <?php echo $form->error($profile,'last_name'); ?>
        </div>
    </div>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
    <div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname); ?>
        <div class="col-sm-4">
		<?php 
            if ($widgetEdit = $field->widgetEdit($profile)) {
                echo $widgetEdit;
            } elseif ($field->range) {
                echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>'form-control'));
            } elseif ($field->field_type=="TEXT") {
                echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50),array('class'=>'form-control'));
            } else {
                echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
            }
             ?>
            <?php echo $form->error($profile,$field->varname); ?>
        </div>
	</div>
			<?php
			}
		}
?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
		    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>'btn btn-default')); ?>
	    </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->