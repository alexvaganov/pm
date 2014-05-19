<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

    <div class="form-group">
		<?php echo $form->label($model,'id',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
		    <?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->label($model,'title',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
		    <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->label($model,'goals',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
		    <?php echo $form->textArea($model,'goals',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->label($model,'start',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
		    <?php echo $form->textField($model,'start',array('class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->label($model,'deadline',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
		    <?php echo $form->textField($model,'deadline',array('class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->label($model,'manager',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model,'manager_id',CHtml::listData($users,'id','profile.fullname'),array('class'=>'form-control')); ?>
        </div>
	</div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
		    <?php echo CHtml::submitButton('Поиск',array('class'=>'btn btn-default')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->