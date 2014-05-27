<?php
    $this->layout='/layouts/column2';
    $this->breadcrumbs=array(
        'Персональный менеджер задач'
    );
    $this->pageTitle='Персональный менеджер задач'.' - '.Yii::app()->name;
    $this->menu=array(
        array('label'=>'Добавить задачу', 'url'=>array('/site/taskmanager/?add-task'), 'linkOptions'=>array('id'=>'add-task-link')),
        array('label'=>'Невыполненные', 'url'=>array('/site/taskmanager/?not-ready-tasks'), 'linkOptions'=>array('id'=>'not-ready-link')),
        array('label'=>'Выполненные', 'url'=>array('/site/taskmanager/?ready-tasks'), 'linkOptions'=>array('id'=>'ready-link'))
    );
?>
<?php
$assets = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.assets'));
echo CHtml::cssFile($assets.'/plugins/bootstrap/datepicker/css/bootstrap-datetimepicker.min.css');
?>

    <div id="add-task" class="center-block">
        <form class="form-horizontal">
            <fieldset>
                <h3>Добавление задачи</h3>
                <hr>
                <div class="form-group">
                    <label for="taskName" class="col-lg-2 control-label">Название</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="taskName" placeholder="Что нужно делать?">
                    </div>
                </div>
                <div class="form-group">
                    <label for="taskDate" class="col-lg-2 control-label">Дата</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker" placeholder="Дата выполнения" id="taskDate">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" id="save" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <hr>
        <div id="recently-added" class="center-block">
            <h3>Недавно добавленные задачи</h3>
            <ul id='recently-added-list'>
            </ul>
        </div>
    </div>

    <div id="change-task" class="center-block">
        <form class="form-horizontal">
            <fieldset>
                <h3>Изменение задачи</h3>
                <hr>
                <div class="form-group">
                    <label for="changeTaskName" class="col-lg-2 control-label">Название</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="changeTaskName" placeholder="Что нужно делать?">
                    </div>
                </div>
                <div class="form-group">
                    <label for="changeTaskDate" class="col-lg-2 control-label">Дата</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker" placeholder="Дата выполнения" id="changeTaskDate">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" id="change" class="btn btn-primary">Изменить</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div id="ready-tasks" class="center-block">
        <h3>Выполненные задачи</h3>
        <ol id='list-ready'>
        </ol>
    </div>

    <div id="not-ready-tasks" class="center-block">
        <h3>Невыполненные задачи</h3>
        <ol id='list-not-ready'>
        </ol>
    </div>

<?php
echo CHtml::scriptFile($assets.'/plugins/bootstrap/datepicker/js/moment.min.js');
echo CHtml::scriptFile($assets.'/plugins/bootstrap/datepicker/js/bootstrap-datetimepicker.min.js');
echo CHtml::scriptFile($assets. '/plugins/bootstrap/datepicker/js/bootstrap-datetimepicker.ru.js');
echo CHtml::scriptFile($assets.'/js/task-manager.js');
?>