<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="form-group">
        <?php echo $form->label($model,'id',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'username',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'email',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'activkey',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'create_at',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'create_at',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'lastvisit_at',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'lastvisit_at',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'superuser',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus'),array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'status',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus'),array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton(UserModule::t('Search'),array('class'=>'btn btn-default')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->