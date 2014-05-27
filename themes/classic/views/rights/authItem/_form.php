<div class="form">

<?php if( $model->scenario==='update' ): ?>

	<h3><?php echo Rights::getAuthItemTypeName($model->type); ?></h3>

<?php endif; ?>

<br />
<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions'=>array(
        'class'=>'form-horizontal'
    ),
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'name',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'name', array('maxlength'=>255, 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
            <p class="hint"><?php echo Rights::t('core', 'Do not change the name unless you know what you are doing.'); ?></p>
        </div>
    </div>

    <div class="form-group">
		<?php echo $form->labelEx($model, 'description',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-5">
            <?php echo $form->textField($model, 'description', array('maxlength'=>255, 'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'description'); ?>
            <p class="hint"><?php echo Rights::t('core', 'A descriptive name for this item.'); ?></p>
        </div>
	</div>

	<?php if( Rights::module()->enableBizRule===true ): ?>

        <div class="form-group">
			<?php echo $form->labelEx($model, 'bizRule',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-5">
                <?php echo $form->textField($model, 'bizRule', array('maxlength'=>255, 'class'=>'form-control')); ?>
                <?php echo $form->error($model, 'bizRule'); ?>
                <p class="hint"><?php echo Rights::t('core', 'Code that will be executed when performing access checking.'); ?></p>
            </div>
        </div>

	<?php endif; ?>

	<?php if( Rights::module()->enableBizRule===true && Rights::module()->enableBizRuleData ): ?>

        <div class="form-group">
			<?php echo $form->labelEx($model, 'data',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-5">
                <?php echo $form->textField($model, 'data', array('maxlength'=>255, 'class'=>'form-control')); ?>
                <?php echo $form->error($model, 'data'); ?>
                <p class="hint"><?php echo Rights::t('core', 'Additional data available when executing the business rule.'); ?></p>
		    </div>
        </div>

	<?php endif; ?>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-5">
		    <?php echo CHtml::submitButton(Rights::t('core', 'Save'), array('class'=>'btn btn-default')); ?> | <?php echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl,array('class'=>'btn btn-default')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div>