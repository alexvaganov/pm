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
        $this->layout = '//layouts/taskcolumn';
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

        if(isset($_POST['ajax']) && $_POST['ajax']==='affair-form')
        {
            echo CActiveForm::validate($affairModel);
            Yii::app()->end();
        }
        if(Yii::app()->request->isAjaxRequest && isset($_POST['Affair']))
        {
            $affairModel->attributes=$_POST['Affair'];
            if($affairModel->validate())
            {
                $affairModel->save();
                echo CJSON::encode(array(
                    'status'=>'success',
                    'affair'=>$affairModel->text,
                ));
            }
            Yii::app()->end();
        }

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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'projects'=>$projects,
            'users'=>$users,
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
		if(!isset($_GET['ajax']))
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
                    $criteria->condition='responsible_id=:user_id';
                    break;
                case 'out':
                    $criteria->condition='author_id=:user_id';
                    break;
                case 'burning':
                    $criteria->scopes='burning';
                    break;
                case 'deadline':
                    $criteria->scopes='deadline';
                    break;
            }
            $criteria->params=array(':user_id'=>Yii::app()->user->id);
        }
        else
            $criteria->scopes='own';

		$dataProvider=new CActiveDataProvider('Task',array(
            'criteria'=>$criteria,
        ));
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
