<?php

class Equipment extends CActiveRecord
{
	public $search_only_fa = false;
	public $equipment_type_name_search;
	public $room_id_search;
	public $room_name_search;
	public $room_filter;
	public $equipment_type_filter;
	public $onlyComAndVisual = false;
	public $search_text;
	public $search_text2;
	
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
		return 'equipment';
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'equipment_type' => array(self::BELONGS_TO, 'EquipmentType', 'equipment_type_id'),
				'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
				'equipment_type_list' => array(self::BELONGS_TO, 'EquipmentTypeList', 'equipment_type_list_id'),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
				array('equipment_type_name_search, room_name_search', 'safe', 'on'=>'search'),
				array('equipment_type_id,equipment_type_list_id, name, description, ip_address,mac_address,client_user,client_pass, room_id, status,barcode,img_path', 'safe'),
				//array('equipment_code, equipment_type_id, name, description, ip_address,mac_address,client_user,client_pass, room_id, status,barcode', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
// 				'equipment_code' => 'Code',
				'name' => 'Name',
				'description' => 'Description',
				'ip_address' => 'IP Address',
				'mac_address' => 'MAC Address',
				'client_user' => 'Client User',
				'client_pass' => 'Client Password',
				'status' => 'Status',
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

		$criteria->with = array('equipment_type','room');
		if($this->room_filter != '') {
			$criteria->addCondition("t.room_id='".$this->room_filter."'");
		}
		if($this->search_text != '') {
			$criteria->addCondition("room.name LIKE '%".$this->search_text."%' OR t.name LIKE '%".$this->search_text."%' OR t.ip_address LIKE '%".$this->search_text."%' OR t.barcode LIKE '%".$this->search_text."%' OR equipment_type.name LIKE '%".$this->search_text."%' ");
		}
		if($this->room_id_search != '') {
			$criteria->addCondition("t.room_id='".$this->room_id_search."'");
		}		
		
		if($this->equipment_type_filter != '') {
			$criteria->addCondition("t.equipment_type_id='".$this->equipment_type_filter."'");
		}
		if($this->onlyComAndVisual) {
			$criteria->addCondition("(t.equipment_type_id='8' OR t.equipment_type_id='9')");
		}
		
		if($this->search_only_fa) {
			$criteria->addCondition("(t.room_id=2)");
		}
		
		$criteria->addCondition("(t.status='A')");
		
		/*
		if($this->search_text != '') {
			$criteria->addCondition("
					t.name LIKE '%".$this->search_text."%' OR
					t.ip_address LIKE '%".$this->search_text."%' OR
					equipment_type.name LIKE '%".$this->search_text."%' OR
					room.name LIKE '%".$this->search_text."%'");
		}
		*/
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
				'sort' => array(
						'defaultOrder' => 't.name',
						'attributes'=>array(
								'equipment_type_name_search'=>array(
										'asc'=>'equipment_type.name',
										'desc'=>'equipment_type.name DESC',
								),
								'room_name_search'=>array(
										'asc'=>'room.name',
										'desc'=>'room.name DESC',
								),
								'*',
						),
				),
				'pagination' => array(
						'pageSize' => ConfigUtil::getDefaultPageSize()
				),
		));
	}
	

}