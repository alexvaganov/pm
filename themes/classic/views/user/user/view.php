<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('index'),
	$model->username,
);
$this->layout='//layouts/column2-user';
$this->menu=array(
    array('label'=>UserModule::t('List User'), 'url'=>array('index')),
);
?>
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo $model->profile->fullname; ?></h2>
                    <div class="indent-vertical-10">
                        <p>
                            <strong><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</strong>
                            <?php echo CHtml::encode($model->username); ?>
                        </p>
                        <p>
                            <strong><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</strong>
                            <?php echo CHtml::encode($model->email); ?>
                        </p>
                        <?php
                        $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
                        if ($profileFields) {
                            foreach($profileFields as $field) {
                                //echo "<pre>"; print_r($profile); die();
                                ?>
                                <p>
                                    <strong><?php echo CHtml::encode(UserModule::t($field->title)); ?>:</strong>
                                    <?php echo (($field->widgetView($model->profile))?$field->widgetView($model->profile):CHtml::encode((($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname)))); ?>
                                </p>
                            <?php
                            }//$profile->getAttribute($field->varname)
                        }
                        ?>
                        <p>
                            <strong><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</strong>
                            <?php echo CHtml::encode($model->create_at); ?>
                        </p>
                        <p>
                            <strong><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</strong>
                            <?php echo CHtml::encode($model->lastvisit_at); ?>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/no_photo.jpg', 'avatar', array(
                            'height'=>'200'
                        )); ?>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
