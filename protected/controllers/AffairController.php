<?php

class AffairController extends Controller
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

    public function actionCreate()
    {
        $affairModel=new Affair();
        if(isset($_POST['ajax']) && $_POST['ajax']==='affair-form')
        {
            echo CActiveForm::validate($affairModel);
            Yii::app()->end();
        }

        if(isset($_POST['Affair']))
            $affairModel->attributes=$_POST['Affair'];

        if(Yii::app()->request->isAjaxRequest)
        {
            if($affairModel->save())
            {
                echo CJSON::encode(array(
                    'status'=>'success',
                    'affair'=>$affairModel->text,
                    'id'=>$affairModel->id
                ));
                Yii::app()->end();
            }
        }
        else
        {
            if($affairModel->save())
                $this->redirect(Yii::app()->user->returnUrl);
        }
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
        $model=Affair::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!Yii::app()->request->isAjaxRequest)
                $this->redirect(Yii::app()->user->returnUrl);
            else Yii::app()->end();
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionChangeStatus($id)
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            // we only allow deletion via POST request
            $model=$this->loadModel($id);
            $model->status=$_POST['status'];
            if($model->save())
                Yii::app()->end();
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
}