<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);

$this->layout='//layouts/public';
?>




<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1>Error <?php echo $code; ?></h1>
                </div>

                <div class="modal-body overflow-auto text-center">
                    <?php echo CHtml::encode($message); ?>
                </div>
            </div>
        </div>
    </div>
</div>