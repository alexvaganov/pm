<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    echo CHtml::scriptFile(CHtml::asset(Yii::getPathOfAlias('application.assets') . '/bootstrap/js/bootstrap.js'));
    echo CHtml::cssFile(CHtml::asset(Yii::getPathOfAlias('application.assets') . '/bootstrap/css/bootstrap.min.css'));
    echo CHtml::cssFile(CHtml::asset(Yii::getPathOfAlias('application.assets'). '/font-awesome/css/font-awesome.min.css'));
    echo CHtml::cssFile(CHtml::asset(Yii::getPathOfAlias('application.assets'). '/css/stylish-portfolio.css'));
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <div id="mainmenu" class="navbar">
        <div class="navbar-inner">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Главная', 'url'=>array('/')),
                array('label'=>'', array('class'=>'divider-vertical')),
                array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
            'htmlOptions'=>array(
                'class'=>'nav'
            ),
        )); ?>
        </div>
    </div><!-- mainmenu -->

    <div id="container">
        <?php echo $content; ?>
    </div><!-- page -->
</body>
</html>
