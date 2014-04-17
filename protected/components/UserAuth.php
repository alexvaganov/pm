<?php
/**
 * Created by PhpStorm.
 * User: extazzy
 * Date: 16.04.14
 * Time: 15:58
 */

Yii::import('zii.widgets.CPortlet');

class UserAuth extends CPortlet
{

    public function init()
    {
        parent::init();
    }

    protected function renderContent()
    {
        if (Yii::app()->user->isGuest) {
            $model=new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                    $this->controller->refresh();
            }
            // display the login form
            $this->render('userAuth',array('model'=>$model));
        } else {
            $username = Yii::app()->user->name;
            $this->render('userIsAuth', array('username'=>$username));
        }
    }
} 