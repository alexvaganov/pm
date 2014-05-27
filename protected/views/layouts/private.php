<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>


    <div id="topmenu" class="navbar navbar-default navbar-static-top">
        <div id="username" class="col-md-2">
            <?php echo CHtml::link(Yii::app()->user->model(Yii::app()->user->id)->profile->fullname, array('/user/profile')) ?>
        </div>
        <div class="container-fluid">
            <div class="navbar-collapse collapse">
                <?php if(!Yii::app()->user->isGuest) {
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Проекты', 'url'=>array('/project/index')),
                            array('label'=>'Задачи', 'url'=>array('/task/index')),
                            array('label'=>'Пользователи', 'url'=>array('/user/user/index')),
                            array('label'=>'Личный таскменеджер', 'url'=>array('/site/taskmanager')),
                        ),
                        'htmlOptions'=>array(
                            'class'=>'nav navbar-nav'
                        ),
                    ));
                ?>

                <div class="navbar-collapse collapse navbar-right">
                <?php  $this->widget('zii.widgets.CMenu',array(
                        'encodeLabel' => false,
                        'items'=>array(
                            array('label'=>Yii::app()->user->username.' <b class="caret"></b>', 'url'=>array('#'), 'visible'=>Yii::app()->user->isAdmin(),
                                'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                                'itemOptions'=>array('class'=>'dropdown'),
                                'submenuOptions'=>array('class'=>'dropdown-menu'),
                                'items'=>array(
                                    array('label'=>'Администрирование задач', 'url'=>array('/task/admin')),
                                    array('label'=>'Администрирование проектов', 'url'=>array('/project/admin')),
                                    array('label'=>'Администрирование пользователей', 'url'=>array('/user/admin/admin')),
                                    array('label'=>'Управление правами', 'url'=>array('/rights')),
                                ),
                            ),
                            array('label'=>'Выход', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                        'htmlOptions'=>array(
                            'class'=>'nav navbar-nav'
                        ),
                    ));
                } ?>
                </div>
            </div>
        </div>
    </div><!-- mainmenu -->

    <div id="main" class="container-fluid">
        <div class="row full-height">
            <?php echo $content; ?>
        </div>
    </div><!-- page -->

<?php $this->endContent() ?>
