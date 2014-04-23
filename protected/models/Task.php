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
			array('id', 'required'),
			array('id, project_id, parent_id, is_favorite, is_burning, is_expire, responsible, author', 'numerical', 'integerOnly'=>true),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'essense' => 'Essense',
			'deadline' => 'Deadline',
			'project_id' => 'Project',
			'parent_id' => 'Parent',
			'is_favorite' => 'Is Favorite',
			'is_burning' => 'Is Burning',
			'is_expire' => 'Is Expire',
			'responsible_id' => 'Responsible',
			'author_id' => 'Author',
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
		$criteria->compare('is_favorite',$this->is_favorite);
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
}
