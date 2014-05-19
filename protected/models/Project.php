<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $title
 * @property string $goals
 * @property string $start
 * @property string $deadline
 * @property integer $manager_id
 * @property integer $author_id
 */
class Project extends CActiveRecord
{
    private $_model;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manager_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
            array('title, goals', 'required'),
			array('start, deadline', 'date', 'format'=>'yyyy-MM-dd HH:mm:ss'),
			// The following rule is used by search().
			array('title, goals, start, deadline, manager_id, author_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'manager' => array(self::BELONGS_TO, 'User', 'manager_id'),
            'maintasks' => array(self::HAS_MANY, 'Task', 'project_id', 'condition'=>'parent_id IS NULL'),
            'alltasks' => array(self::HAS_MANY, 'Task', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'goals' => 'Цели',
			'start' => 'Дата начала',
			'deadline' => 'Дедлайн',
			'manager_id' => 'Менеджер',
            'author_id' => 'Создатель',
            'responsible' => 'Ответственный',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
		$criteria->compare('goals',$this->goals,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return string the URL that shows the detail of the project
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('project/view', array(
            'id'=>$this->id,
        ));
    }


    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
            {
                $this->_model=Project::model()->findByPk($_GET['id']);
            }
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }


    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
    public function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
                $this->author_id=Yii::app()->user->id;
            if($this->start!='0000-00-00 00:00:00')
                $this->start=new CDbExpression('NOW()');
            return true;
        }
        else
            return false;
    }
}
