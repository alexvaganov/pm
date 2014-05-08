<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>


    <div id="topmenu" class="navbar navbar-default navbar-static-top">
        <div id="username" class="col-md-2">
            <?php echo CHtml::link(Yii::app()->user->name, array('user/profile')) ?>
        </div>
        <div class="navbar-collapse collapse">
            <?php if(!Yii::app()->user->isGuest) {
                $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('/')),
                        array('label'=>'Проекты', 'url'=>array('/project/index')),
                        array('label'=>'Задачи', 'url'=>array('/task/index')),
                        array('label'=>'Сотрудники', 'url'=>array('/user')),
                    ),
                    'htmlOptions'=>array(
                        'class'=>'nav navbar-nav'
                    ),
                ));
                $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel' => false,
                    'items'=>array(
                        array('label'=>'<i class="glyphicon glyphicon-lock"></i> Выход ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                    'htmlOptions'=>array(
                        'class'=>'nav navbar-nav navbar-right'
                    ),
                ));
            } ?>
        </div>
    </div><!-- mainmenu -->

    <div id="main" class="container-fluid">
        <div class="row">
        <?php echo $content; ?>
        </div>
    </div><!-- page -->

<?php $this->endContent() ?>
