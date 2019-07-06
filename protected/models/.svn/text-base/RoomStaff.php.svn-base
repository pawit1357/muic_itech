<?php

class RoomStaff extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room_staff';
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
				'staff' => array(self::BELONGS_TO, 'UserLogin', 'staff_id'),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('room_id, staff_id', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'department_code' => 'Code',
				'name' => 'Name',
				'description' => 'Description',
		);
	}

	/**
	 * @param Post the post that this comment belongs to. If null, the method
	 * will query for the post.
	 * @return string the permalink URL for this comment
	 */
	public function getUrl($post=null)
	{
		if($post===null)
			$post=$this->post;
		return $post->url.'#c'.$this->id;
	}

	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		/*
		 if(parent::beforeSave())
		 {
		if($this->isNewRecord)
			$this->create_time=time();
		return true;
		}
		else
			return false;
		*/
		return true;
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
				'sort' => array(
						'defaultOrder' => 't.id',

				),
				'pagination' => array(
						'pageSize' => ConfigUtil::getDefaultPageSize()
				),
		));
	}
}