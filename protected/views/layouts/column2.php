<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/private'); ?>
<div class="row">
    <div class="span-4">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
    </div>

    <div class="span-8">
            <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>