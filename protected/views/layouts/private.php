<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="mainmenu" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-collapse collapse">
                <?php if(!Yii::app()->user->isGuest) {
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(

                        ),
                        'htmlOptions'=>array(
                            'class'=>'nav navbar-nav'
                        ),
                    ));
                    $this->widget('zii.widgets.CMenu',array(
                        'encodeLabel' => false,
                        'items'=>array(
                            array('label'=>'Главная', 'url'=>array('/')),
                            array('label'=>'<i class="glyphicon glyphicon-lock"></i> Выход ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                        'htmlOptions'=>array(
                            'class'=>'nav navbar-nav navbar-right'
                        ),
                    ));
                } ?>
            </div>
        </div>
    </div><!-- mainmenu -->

    <div id="content" class="container">
        <?php echo $content; ?>
    </div><!-- page -->

<?php $this->endContent() ?>
