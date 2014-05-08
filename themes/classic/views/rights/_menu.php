<?php $this->widget('zii.widgets.CMenu', array(
	'firstItemCssClass'=>'first',
	'lastItemCssClass'=>'last',
    'encodeLabel'=>false,
    'items'=>array(
        array('label'=>'<span class="glyphicon glyphicon-pencil">&nbsp</span>'.Rights::t('core', 'Assignments'),
            'url'=>array('/rights/assignment/view')),
        array('label'=>'<span class="glyphicon glyphicon-list-alt">&nbsp</span>'.Rights::t('core', 'Permissions'), 'url'=>array('/rights/authItem/permissions')),
        array('label'=>'<span class="glyphicon glyphicon-user">&nbsp</span>'.Rights::t('core', 'Roles'), 'url'=>array('/rights/authItem/roles')),
        array('label'=>'<span class="glyphicon glyphicon-dashboard">&nbsp</span>'.Rights::t('core', 'Tasks'), 'url'=>array('/rights/authItem/tasks')),
        array('label'=>'<span class="glyphicon glyphicon-eject">&nbsp</span>'.Rights::t('core', 'Operations'), 'url'=>array('/rights/authItem/operations')),
    ),
    'htmlOptions'=>array('class'=>'nav main-menu'),
));	?>