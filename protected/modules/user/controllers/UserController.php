<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $roles=User::model()->getRoles();

        $criteria=new CDbCriteria();

        if(isset($_GET['role']))
        {
            $criteria->join='LEFT JOIN AuthAssignment ON user.id = AuthAssignment.userid';
            $criteria->condition='AuthAssignment.itemname=:role';
            $criteria->params=array(':role'=>$_GET['role']);
        }
        if(isset($_GET['status']))
        {
            if($_GET['status']=='free')
            {
                $criteria->with=array(
                    'tasks'=>array(
                        'select'=>false,
                        'joinType'=>'LEFT OUTER JOIN ',
                        'condition'=>'tasks.id IS NULL'
                    )
                );
            }
            elseif($_GET['status']=='busy')
            {
                $criteria->with=array(
                    'tasks'=>array(
                        'select'=>false,
                        'joinType'=>'INNER JOIN'
                    )
                );
            }
            $criteria->together=true;
        }

		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
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
            'roles'=>$roles,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
