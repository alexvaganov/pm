<?php $this->widget('zii.widgets.CMenu', array(
    'encodeLabel'=>false,
    'activateParents'=>true,
    'items'=>array(
        array('label'=>'<span class="glyphicon glyphicon-briefcase"></span> Проекты', 'url'=>array('/project/index')),
        array('label'=>'<span class="glyphicon glyphicon-tasks"></span> Задачи', 'url'=>array('#'),
            'linkOptions'=>array('class'=>'','data-target'=>'#tasks','data-toggle'=>'collapse'),
            'itemOptions'=>array('class'=>'list-unstyled'),
            'submenuOptions'=>array('class'=>'dropdown-menu collapse in','id'=>'tasks'),
            'items'=>array(
                array('label'=>'<span class="glyphicon glyphicon-user"></span> Мои задачи', 'url'=>array('/task/index'),'active'=>(Yii::app()->request->getParam('param')=='')),
                array('label'=>'<span class="glyphicon glyphicon-import"></span> Входящие', 'url'=>array('/task/index/in'),'active'=>(Yii::app()->request->getParam('param')=='in')),
                array('label'=>'<span class="glyphicon glyphicon-export"></span> Исходящие', 'url'=>array('/task/index/out'),'active'=>(Yii::app()->request->getParam('param')=='out')),
                array('label'=>'<span class="glyphicon glyphicon-bell"></span> Срочные', 'url'=>array('/task/index/burning'),'active'=>(Yii::app()->request->getParam('param')=='burning')),
                array('label'=>'<span class="glyphicon glyphicon-warning-sign"></span> Истекает срок', 'url'=>array('task/index/deadline'),'active'=>(Yii::app()->request->getParam('param')=='deadline')),
            ),
        )
    ),
    'htmlOptions'=>array('class'=>'nav main-menu'),
));
