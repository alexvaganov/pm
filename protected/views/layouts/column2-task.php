<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/private'); ?>

    <div id='sidebar-left' class="col-xs-2 col-sm-2">
        <?php
        $this->widget('TaskMenu'); ?>
    </div>

    <div id="content" class="col-md-10">
        <div class="row">
            <div class="col-xs-12" id="breadcrumb">
                <?php if(isset($this->breadcrumbs)):
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>false,
                    'tagName'=>'ul',
                    'separator'=>'',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'htmlOptions'=>array ('class'=>'breadcrumb')
                )); ?><!-- breadcrumbs -->
                <?php endif; ?>
            </div>
        </div>
        <?php echo $content; ?>
    </div>



<?php $this->endContent(); ?>