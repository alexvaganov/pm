<?php

class ProjectController extends Controller
{
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

    public function actionIndex()
    {
        $criteria = new CDbCriteria(array(

        ));
        $dataProvider=new CActiveDataProvider('Project', array(
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['projectsPerPage'],
            ),
            'criteria'=>$criteria,
        ));

        $this->render('index', array('dataProvider'=>$dataProvider));
    }

    public function actionView()
    {

    }

    public function init() {
        $this->layout = '//layouts/projects';
    }
}