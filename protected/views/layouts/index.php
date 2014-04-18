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
    echo CHtml::scriptFile($this->assetsBase . '/js/main.js');
    echo CHtml::scriptFile($this->assetsBase . '/bootstrap/js/bootstrap.min.js');
    echo CHtml::cssFile($this->assetsBase . '/css/stylish-portfolio.css');
    echo CHtml::cssFile($this->assetsBase . '/bootstrap/css/bootstrap.min.css');
    echo CHtml::cssFile($this->assetsBase . '/css/font-awesome.min.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!-- Side Menu -->
<a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand"><a href="http://startbootstrap.com">Start Bootstrap</a>
        </li>
        <li><a href="#top">Home</a>
        </li>
        <li><a href="#about">About</a>
        </li>
        <li><a href="#services">Services</a>
        </li>
        <li><a href="#portfolio">Portfolio</a>
        </li>
        <li><a href="#contact">Contact</a>
        </li>
    </ul>
</div>
<!-- /Side Menu -->

<?php echo $content ?>

</body>
</html>
