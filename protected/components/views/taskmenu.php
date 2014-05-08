<?php $this->widget('zii.widgets.CMenu', array(
    'encodeLabel'=>false,
    'items'=>array(
        array('label'=>'<span class="glyphicon glyphicon-briefcase"></span> Проекты', 'url'=>array('/project/index')),
        array('label'=>'<span class="glyphicon glyphicon-tasks"></span> Задачи', 'url'=>array('#'),
            'linkOptions'=>array('class'=>'','data-target'=>'#tasks','data-toggle'=>'collapse'),
            'itemOptions'=>array('class'=>'list-unstyled'),
            'submenuOptions'=>array('class'=>'dropdown-menu collapse in','id'=>'tasks'),
            'items'=>array(
                array('label'=>'<span class="glyphicon glyphicon-user"></span> Мои задачи', 'url'=>array('/task/index'),'active'=>(isset(Yii::app()->controller->activeItem)&&Yii::app()->controller->activeItem=='list')),
                array('label'=>'<span class="glyphicon glyphicon-import"></span> Входящие', 'url'=>array('/task/list/in'),'active'=>(isset(Yii::app()->controller->activeItem)&&Yii::app()->controller->activeItem=='in')),
                array('label'=>'<span class="glyphicon glyphicon-export"></span> Исходящие', 'url'=>array('/task/list/out'),'active'=>(isset(Yii::app()->controller->activeItem)&&Yii::app()->controller->activeItem=='out')),
                array('label'=>'<span class="glyphicon glyphicon-bell"></span> Срочные', 'url'=>array('/task/list/burning'),'active'=>(isset(Yii::app()->controller->activeItem)&&Yii::app()->controller->activeItem=='burning')),
                array('label'=>'<span class="glyphicon glyphicon-warning-sign"></span> Истекает срок', 'url'=>array('task/list/deadline'),'active'=>(isset(Yii::app()->controller->activeItem)&&Yii::app()->controller->activeItem=='deadline')),
            ),
        )
    ),
    'htmlOptions'=>array('class'=>'nav main-menu'),
));
