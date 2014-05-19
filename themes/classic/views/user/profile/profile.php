<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
$this->layout='//layouts/column2-user';
?>

<h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>

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
                                    <?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
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
