<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Full Page Image Header Area -->
<div id="top" class="header">
    <div class="vert-text">
        <h1>Start Bootstrap</h1>
        <h3>
            <em>We</em> Build Great Templates,
            <em>You</em> Make Them Better</h3>
        <?php if(Yii::app()->user->isGuest) {
            echo CHtml::link('Войти в систему', array('user/login'), array('class' => 'btn btn-large'));
        } else {
            echo CHtml::link('Личный кабинет', array('#'), array('class' => 'btn btn-large'));
        }
        ?>
    </div>
</div>
<!-- /Full Page Image Header Area -->

<!-- Intro -->
<div class="intro">
    <div class="container">
        <div class="row">
            <div class="span4 offset4">

            </div>
        </div>
    </div>
</div>
<!-- /Intro -->

<!-- Services -->
<div id="services" class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <h2>Our Services</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-rocket"></i>
                    <h4>Spacecraft Repair</h4>
                    <p>Did your navigation system shut down in the middle of that asteroid field? We can repair any dings and scrapes to your spacecraft!</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-magnet"></i>
                    <h4>Problem Solving</h4>
                    <p>Need to know how magnets work? Our problem solving solutions team can help you identify problems and conduct exploratory research.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-shield"></i>
                    <h4>Blacksmithing</h4>
                    <p>Planning a time travel trip to the middle ages? Preserve the space time continuum by blending in with period accurate armor and weapons.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-pencil"></i>
                    <h4>Pencil Sharpening</h4>
                    <p>We've been voted the best pencil sharpening service for 10 consecutive years. If you have a pencil that feels dull, we'll get it sharp!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Services -->

<!-- Callout -->
<div class="callout">
    <div class="vert-text">
        <h1>A Dramatic Text Area</h1>
    </div>
</div>
<!-- /Callout -->

<!-- Call to Action -->
<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h3>The buttons below are impossible to resist.</h3>
                <a href="#" class="btn btn-lg btn-default">Click Me!</a>
                <a href="#" class="btn btn-lg btn-primary">Look at Me!</a>
            </div>
        </div>
    </div>
</div>
<!-- /Call to Action -->


<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

<!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
<script>
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
</script>
<script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
