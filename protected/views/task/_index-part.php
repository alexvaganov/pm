<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
    'itemsCssClass'=>'',
    'htmlOptions'=>array('class'=>'panel-group', 'id'=>'accordion'),
    'emptyText'=>'Задачи отсутствуют...',
    'emptyTagName'=>'i',
)); ?>