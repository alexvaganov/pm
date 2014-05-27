<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="form-group">
        <div class="col-md-4">
            <?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'itemname'); ?>
        </div>
	</div>

    <div class="form-group">
        <div class="col-md-4">
		    <?php echo CHtml::submitButton(Rights::t('core', 'Assign'), array('class'=>'btn btn-default')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div>