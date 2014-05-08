<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id='sidebar-left' class="col-xs-2 col-sm-2">
    <?php if( $this->id!=='install' ): ?>

        <div id="menu">
            <?php $this->renderPartial('/_menu'); ?>
        </div>

    <?php endif; ?>
</div>

<div id="content" class="col-md-10">

		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

</div>

<?php $this->endContent(); ?>