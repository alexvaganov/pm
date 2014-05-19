<?php if($model->affairs): ?>
    <?php foreach($model->affairs as $affair): ?>
        <?php if($affair->status==$status): ?>
            <div class="affair" id="<?php echo $affair->id; ?>">
                <?php echo CHtml::checkBox('status'); ?>
                <span class="text"><?php echo $affair->text; ?></span>
                <?php echo CHtml::button('X', array('class'=>'btn btn-default btn-xs remove', 'id'=>$affair->id)); ?>
            </div>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>