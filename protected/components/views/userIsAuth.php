<div class="text-center">
    <h4>Здравствуйте, <?php echo $username ?></h4>
    <?php echo CHtml::link('Личный кабинет', array('#'),array('class'=>'btn btn-large btn-primary')); ?>
    <?php echo CHtml::link('Выход', array('site/logout'),array('class'=>'btn btn-large btn-primary')); ?>
</div>