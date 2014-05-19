<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        array(
            'name' => 'ФИО',
            'type'=>'raw',
            'value' => 'CHtml::link(CHtml::encode($data->profile->fullname),array("user/view","id"=>$data->id))',
        ),
        'create_at',
        'lastvisit_at',
    ),
)); ?>