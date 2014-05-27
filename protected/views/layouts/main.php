<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $assets = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.assets'));
    echo CHtml::cssFile($assets.'/plugins/bootstrap/css/bootstrap.min.css');
    echo CHtml::cssFile($assets.'/font-awesome/css/font-awesome.min.css');
    echo CHtml::scriptFile($assets.'/plugins/jquery/jquery-2.1.0.js');
    echo CHtml::cssFile($assets.'/css/style.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>


        <?php echo $content; ?>


    <?php
    echo CHtml::scriptFile($assets. '/plugins/bootstrap/js/bootstrap.min.js');
    ?>
</body>
</html>
