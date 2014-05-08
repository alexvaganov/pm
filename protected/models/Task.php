<?php

/**
 * This is the model class for table "tasks".
 *
 * The followings are the available columns in table 'tasks':
 * @property integer $id
 * @property string $title
 * @property string $essense
 * @property string $deadline
 * @property integer $project_id
 * @property integer $parent_id
 * @property integer $is_favorite
 * @property integer $is_burning
 * @property integer $is_expire
 * @property integer $responsible
 * @property integer $author
 */
class Task extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, parent_id, is_favorite, is_burning, is_expire, responsible_id, author_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('essense, deadline', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, essense, deadline, project_id, parent_id, is_favorite, is_burning, is_expire, responsible_id, author_id', 'safe', 'on'=>'search'),
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
            'project'=>array(self::BELONGS_TO, 'Project', 'project_id'),
            'responsible'=>array(self::BELONGS_TO, 'User', 'responsible_id'),
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'subtasks'=>array(self::HAS_MANY, 'Task', 'parent_id'),
            'parent'=>array(self::BELONGS_TO, 'Task', 'parent_id'),
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
			'essense' => 'Сущность задачи',
			'deadline' => 'Дедлайн',
			'project_id' => 'Проект',
			'parent_id' => 'Родитель',
			'is_favorite' => 'Избранная',
			'is_burning' => 'Горящая',
			'is_expire' => 'Истекает срок',
			'responsible_id' => 'Ответственный',
			'author_id' => 'Создатель',
            'subtasks' => 'Подзадачи',
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
		$criteria->compare('essense',$this->essense,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('is_burning',$this->is_burning);
		$criteria->compare('is_expire',$this->is_expire);
		$criteria->compare('responsible_id',$this->responsible);
		$criteria->compare('author_id',$this->author);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getUrl()
    {
        return Yii::app()->createUrl('task/view', array('id'=>$this->id));
    }

    public function setUrl($url)
    {
        $this->url=$url;
    }

    public function getAllTasks($projectId=null,$taskId=null)
    {
        $criteria=new CDbCriteria;
        $criteria->select='title, id, parent_id';
        if($projectId!=null)
        {
            $criteria->addCondition('project_id=:project_id');
            $criteria->params[':project_id']=$projectId;
        }
        if($taskId!=null)
        {
            $criteria->addCondition('parent_id=:parent_id');
            $criteria->params[':parent_id']=$taskId;
        }
        $tasks=$this->findAll($criteria);
        $result=array();
        if($tasks)
        {
            foreach($tasks as $task)
            {
                if($task['parent_id']===null)
                    $task['parent_id']=0;
                $task->url=Yii::app()->createUrl('task/view',array('id'=>$task->id));
                $result[$task['parent_id']][]=$task;
            }
        }
        return $result;
    }

    /**
     * @param $tasks-array of tasks
     * @param $parentId-parent task id
     * @return array of tasks
     */
    public function buildTreeArray($tasks, $parentId)
    {
        $arrayTree=array();
        if(isset($tasks[$parentId]))
        {
            foreach($tasks[$parentId] as $task)
            {
                $children=$this->buildTreeArray($tasks, $task->id);
                if(!empty($children))
                    $arrayTree[]=array('text'=>CHtml::link($task->title,$task->url),'children'=>$children);
                else
                    $arrayTree[]=array('text'=>CHtml::link($task->title,$task->url));
            }
        }
        return $arrayTree;
    }

    public  function scopes()
    {
        return array(
            'own'=>array(
                'condition'=>'responsible_id=:user_id OR author_id=:user_id',
                'params'=>array(':user_id'=>Yii::app()->user->id),
            ),
            'burning'=>array(
                'condition'=>'is_burning=1',
            ),
            'deadline'=>array(
                'condition'=>'deadline<=DATE_ADD(NOW(), INTERVAL 1 DAY)',
            )
        );
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
            return true;
        }
        else
            return false;
    }
}
