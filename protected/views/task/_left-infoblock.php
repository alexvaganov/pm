<div class="infoblock">
    <h4><span class="label label-info"><?php echo $model->getAttributeLabel('project_id') ?></span></h4>
    <p><?php echo $model->project->title ?></p>
</div>
<div class="infoblock">
    <h4><span class="label label-info"><?php echo $model->getAttributeLabel('status') ?></span></h4>
    <p><?php echo $model->statusAlias($model->status); ?></p>
</div>
<div class="infoblock">
    <h4><span class="label label-danger"><?php echo $model->getAttributeLabel('deadline') ?></span></h4>
    <p><?php echo $model->deadline ?></p>
</div>
<div class="infoblock">
    <h4><span class="label label-info"><?php echo $model->getAttributeLabel('responsible_id') ?></span></h4>
    <p><?php echo $model->responsible->username ?></p>
</div>
<div class="infoblock">
    <h4><span class="label label-info"><?php echo $model->getAttributeLabel('author_id') ?></span></h4>
    <p><?php echo $model->author->username ?></p>
</div>