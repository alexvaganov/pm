<div class="infoblock">
    <span class="label label-success"><?php echo $model->getAttributeLabel('start') ?></span>
    <p><?php echo $model->start ?></p>
</div>
<div class="infoblock">
    <span class="label label-danger"><?php echo $model->getAttributeLabel('deadline') ?></span>
    <p><?php echo $model->deadline ?></p>
</div>
<div class="infoblock">
    <span class="label label-info"><?php echo $model->getAttributeLabel('manager_id') ?></span>
    <p class="name"><?php echo CHtml::link($model->manager->username, array('/user/user/view/','id'=>$model->manager->id)); ?></p>

</div>
<div class="infoblock">
    <span class="label label-info"><?php echo $model->getAttributeLabel('author_id') ?></span>
    <p class="name"><?php echo CHtml::link($model->author->username, array('/user/user/view/','id'=>$model->author->id)); ?></p>
</div>