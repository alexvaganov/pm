<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/private'); ?>

    <div id='sidebar-left' class="col-xs-2 col-sm-2">
        <?php
        $this->widget('TaskMenu'); ?>
    </div>

    <div id="content" class="col-md-10">
            <?php echo $content; ?>
    </div>



<?php $this->endContent(); ?>