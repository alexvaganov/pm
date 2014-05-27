<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Full Page Image Header Area -->
<div id="top" class="header">
    <div class="vert-text">
        <h1>Project Management System</h1>
        <h3>Управление проектами в компании стало проще!</h3>
        <br />

        <?php echo CHtml::link(Yii::app()->user->isGuest? 'Войти в систему' :'Личный кабинет',
                array('project/index'), array('class' => 'btn btn-default btn-lg')); ?>
    </div>
</div>
<!-- /Full Page Image Header Area -->


<!-- Services -->
<div id="services" class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <h2>Особенности системы</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-1 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-archive"></i>
                    <h4>Все в одном месте</h4>
                    <p>Система позволяет работать в едином информационном пространстве всем сотрудникам компании, что значительно повышает производительность труда. </p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-list"></i>
                    <h4>Личный список дел</h4>
                    <p>Покажет вам, что именно требует вашего внимания в первую очередь с учетом сроков и важности.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-shield"></i>
                    <h4>Гибкие права доступа</h4>
                    <p>Ограничат работу с конфиденциальной информацией для отдельных людей.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-tachometer"></i>
                    <h4>Эффективное управление проектами</h4>
                    <p>Создание проектов, управление задачами, назначение управляющих и исполнителей, контроль выполнения.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="service-item">
                    <i class="service-icon fa fa-users"></i>
                    <h4>Работа с клиентами</h4>
                    <p>Единая база данных клиентов и полная история взаимоотношения с ними позволяет не только привлекать новых клиентов, но и удерживать уже существующих.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Services -->

<!-- Callout -->
<div class="callout">
    <div class="vert-text">
        <h2 class="dramatic-text">Профессиональное управление проектами - ключевой фактор эффективности, развития и процветания!</h2>
    </div>
</div>
<!-- /Callout -->

<!-- Call to Action -->
<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <?php echo CHtml::link('Приступить к работе!', array('project/index'), array('class'=>'btn btn-lg btn-default')); ?>
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
