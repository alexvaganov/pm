<?php

class ProjectController extends Controller
{
    private $_model;

    public function filters()
    {
        return array(
            'rights'
        );
    }

	public function actions()
	{
		// return external action classes, e.g.:
        /*return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);*/
	}

    /**
     * Initialise controller view layout
     */
    public function init() {
        $this->layout = '//layouts/taskcolumn';
    }

    public function actionIndex()
    {
        $criteria = new CDbCriteria(array(
            'with'=>array(
                'alltasks'=>array(
                    'select'=>false,
                )
            ),
            'condition'=>'t.author_id=:user_id OR t.manager_id=:user_id
                OR alltasks.responsible_id=:user_id OR alltasks.author_id=:user_id',
            'params'=>array(':user_id'=>Yii::app()->user->id),
            'together'=>true,
        ));
        $dataProvider=new CActiveDataProvider('Project', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));

        $this->render('index', array('dataProvider'=>$dataProvider));
    }

    /**
     * Displays a particular model.
     */
    public function actionView($id)
    {
        $project=$this->loadModel($id);
        $tasks=Task::model()->getAllTasks($project->id);
        $tree=Task::model()->buildTreeArray($tasks, 0);

        $this->render('view',array(
            'model'=>$project,
            'tree'=>$tree,
            'tasks'=>$tasks
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Project;
        $managers=User::model()->findAll();

        if(isset($_POST['Project']))
        {
            $model->attributes=$_POST['Project'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
            'managers'=>$managers,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        $managers=User::model()->findAll();

        if(isset($_POST['Project']))
        {
            $model->attributes=$_POST['Project'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
            'managers'=>$managers,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Project('search');
        $model->unsetAttributes();
        if(isset($_GET['Project']))
            $model->attributes=$_GET['Project'];
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
        $model=Project::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}
