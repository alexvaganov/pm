<?php

class TaskController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    /**
     * Initialise controller view layout
     */
    public function init() {
        $this->layout = '//layouts/column2-task';
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model=$this->loadModel($id);
        $tasks=$model->getAllTasks(null,$model->id);
        $tree=$model->buildTreeArray($tasks, $model->id);

        $affairModel=new Affair();

		$this->render('view',array(
			'model'=>$model,
            'tree'=>$tree,
            'affairModel'=>$affairModel,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Task;
        $projects=Project::model()->findAll();
        $users=User::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Task']))
		{
			$model->attributes=$_POST['Task'];
            if(isset($_GET['id']))
                $model->parent_id=$_GET['id'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'projects'=>$projects,
            'users'=>$users
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $projects=Project::model()->findAll();
        $users=User::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Task']))
		{
			$model->attributes=$_POST['Task'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
            'projects'=>$projects,
            'users'=>$users,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!Yii::app()->request->isAjaxRequest)
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria();

        if(isset($_GET['param']))
        {
            switch($_GET['param'])
            {
                case 'in':
                    $this->pageTitle='Входящие задачи';
                    $criteria->condition='responsible_id=:user_id';
                    break;
                case 'out':
                    $this->pageTitle='Исходящие задачи';
                    $criteria->condition='author_id=:user_id';
                    break;
                case 'burning':
                    $this->pageTitle='Срочные задачи';
                    $criteria->scopes='burning';
                    break;
                case 'deadline':
                    $this->pageTitle='Задачи с истекающим сроком';
                    $criteria->scopes='deadline';
                    break;
            }
            $criteria->params=array(':user_id'=>Yii::app()->user->id);
        }
        else
        {
            $this->pageTitle='Мои задачи';
            $criteria->scopes='own';
        }

        if(isset($_GET['status']))
        {
            $criteria->addCondition('status=:status_id');
            $criteria->params=array(':status_id'=>$_GET['status']);
        }

        $dataProvider=new CActiveDataProvider('Task',array(
            'criteria'=>$criteria,
        ));

        if(Yii::app()->request->isAjaxRequest)
        {
            $this->renderPartial('_index-part',array(
                'dataProvider'=>$dataProvider,
            ));
            Yii::app()->end();
        }

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Task('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Task']))
			$model->attributes=$_GET['Task'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionChangeStatus($id)
    {
        $model=$this->loadModel($id);
        $model->status=$_POST['status'];
        $model->save();
        if(Yii::app()->request->isAjaxRequest)
            Yii::app()->end();
        else
            $this->redirect(Yii::app()->user->returnUrl);
    }

    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Task the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Task::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Task $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='task-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
