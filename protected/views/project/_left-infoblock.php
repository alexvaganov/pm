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
    <p><?php echo $model->manager->username ?></p>
</div>
<div class="infoblock">
    <span class="label label-info"><?php echo $model->getAttributeLabel('author_id') ?></span>
    <p><?php echo $model->author->username ?></p>
</div>