<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
    echo CHtml::scriptFile($this->assetsBase. '/bootstrap/js/bootstrap.js');
    echo CHtml::cssFile($this->assetsBase . '/bootstrap/css/bootstrap.min.css');
    echo CHtml::cssFile($this->assetsBase . '/css/font-awesome.min.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('post/index')),
                array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('site/contact')),
                array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); ?>
    </div><!-- mainmenu -->

    <div id="container">
        <?php echo $content; ?>
    </div><!-- page -->
</body>
</html>
