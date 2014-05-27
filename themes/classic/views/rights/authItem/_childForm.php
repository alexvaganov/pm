<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="form-group">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	</div>

    <div class="form-group">
		<?php echo CHtml::submitButton(Rights::t('core', 'Add'),array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>