<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Project',
);
?>

<h1>Проекты</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>

<?php echo $this->layout  ?>