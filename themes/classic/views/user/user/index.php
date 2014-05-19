<?php
$this->layout='//layouts/column2-user';
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
 ?>

<h1><?php echo UserModule::t("List User"); ?></h1>

<div class="filters">
    <div class="indent-vertical-10">
        <?php echo CHtml::label('По должности', 'status', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo CHtml::dropDownList('role', '', CHtml::listData($roles, 'name', 'description'),
                array(
                    'empty'=>'Выберите должность',
                    'class'=>'form-control col-sm-3',
                    'ajax'=>array(
                        'type'=>'GET',
                        'url'=>CHtml::normalizeUrl(array('/user/user/index')),
                        'update'=>'#users-list',
                        'data'=>array(
                            'role'=>'js:this.value'
                        )
                    )
                )
            ); ?>
        </div>

        <?php echo CHtml::label('По занятости', 'status', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo CHtml::dropDownList('status', '',
                array(
                    'busy'=>'Занятые',
                    'free'=>'Свободные',
                ),
                array(
                    'empty'=>Yii::t('default', 'Выберите статус'),
                    'class'=>'form-control',
                    'ajax'=>array(
                        'type'=>'GET',
                        'url'=>CHtml::normalizeUrl(array('/user/user/index')),
                        'update'=>'#users-list',
                        'data'=>array(
                            'status'=>'js:this.value',
                        )
                    ),
                ));
            ?>
        </div>
    </div>
</div>

<div id="users-list">
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
</div>