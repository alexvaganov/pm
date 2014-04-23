<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/private'); ?>
<div class="row">
    <div class="col-md-3">
        <?php $this->widget('zii.widgets.CMenu', array(
            'encodeLabel'=>false,
            'items'=>array(
                array('label'=>'<h5>Проекты</h5>', 'url'=>array('projects/index')),
                array('label'=>'<h5>Задачи <i class="glyphicon glyphicon-chevron-down"></i></h5> ', 'url'=>array('#'),
                       'linkOptions'=>array('data-target'=>'#project-menu', 'data-toggle'=>'collapse'),
                       'submenuOptions'=>array('id'=>'project-menu', 'class'=>'list-unstyled collapse'),
                       'items'=>array(
                            array('label'=>'Входящие', 'url'=>array('task/in')),
                            array('label'=>'Исходящие', 'url'=>array('task/out')),
                            array('label'=>'Срочные', 'url'=>array('task/fire')),
                            array('label'=>'Истекает срок', 'url'=>array('task/deadline')),
                       ),
                )
            ),
            'htmlOptions'=>array('class'=>'list-unstyled'),
            'itemCssClass'=>'nav-header',
        )); ?>
    </div>

    <div class="col-md-8">
            <?php echo $content; ?>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        $(".alert").addClass("in").fadeOut(4500);

        /* swap open/close side menu icons */
        $('[data-toggle=collapse]').click(function(){
            // toggle icon
            $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
        });

    });

</script>
<?php $this->endContent(); ?>