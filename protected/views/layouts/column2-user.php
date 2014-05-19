<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/private'); ?>

    <div id='sidebar-left' class="col-xs-2 col-sm-2">
        <?php
        $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                array(
                    'label'=>'<span class="glyphicon glyphicon-user"></span> Cотрудники', 'url'=>array('#'),
                    'linkOptions'=>array('class'=>'','data-target'=>'#users','data-toggle'=>'collapse'),
                    'itemOptions'=>array('class'=>'list-unstyled'),
                    'submenuOptions'=>array('class'=>'dropdown-menu collapse in','id'=>'users'),
                    'items'=>array(
                        array('label'=>'<span class="glyphicon glyphicon-list"></span> Все сотрудники', 'url'=>array('/user/user/index')),
                    ),
                ),
                array('label'=>'<span class="glyphicon glyphicon-info-sign"></span> Профиль', 'url'=>array('/user/profile/profile')),
                array('label'=>'<span class="glyphicon glyphicon-pencil"></span> Редактировать профиль', 'url'=>array('/user/profile/edit')),
                array('label'=>'<span class="glyphicon glyphicon-pencil"></span> Изменить пароль', 'url'=>array('/user/profile/changepassword')),
                array('label'=>'<span class="glyphicon glyphicon-check"></span> Администрирование', 'url'=>array('admin/'), 'visible'=>Yii::app()->user->isAdmin()),

            ),
            'encodeLabel'=>false,
            'htmlOptions'=>array('class'=>'nav main-menu'),
        ));
        ?>
    </div>

    <div id="content" class="col-md-10">
        <div class="row">
            <div class="col-xs-12" id="breadcrumb">
                <?php if(isset($this->breadcrumbs)):
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>false,
                    'tagName'=>'ul',
                    'separator'=>'',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'htmlOptions'=>array ('class'=>'breadcrumb')
                )); ?><!-- breadcrumbs -->
                <?php endif; ?>
            </div>
        </div>
        <?php echo $content; ?>
    </div>



<?php $this->endContent(); ?>