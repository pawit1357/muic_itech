<?php
class UserLogin extends CActiveRecord
{
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;

	public $onlyStaff;
	public $repeat_password;
	public $exceptFindId;
	public $status;
	public $username_search;
	public $user_information_personal_title_search;
	public $user_information_first_name_search;
	public $user_information_last_name_search;
	public $user_information_email_search;
	public $role_name_search;
	public $status_name_search;
	public $search_text;
	
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
		return 'user_login';
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'user_information' => array(self::HAS_ONE, 'UserInformation', 'id'),
				'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
				'department' => array(self::BELONGS_TO, 'Department', 'departmet_id'),
				'user_status' => array(self::BELONGS_TO, 'Status', 'status'),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array( 	'user_information_personal_title_search,'.
						'user_information_first_name_search,'.
						'user_information_last_name_search,'.
						'user_information_email_search,'.
						'role_name_search,status_name_search', 'safe', 'on'=>'search' ),
				array('username,parent, password, role_id, email', 'required'),
				array('username,parent, password, role_id, email,isApprover_1,isApprover_2,ApproverType', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'username' => 'Username',
				'password' => 'Password',
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
		if(!isset($this->status)){
			$this->status = 'INACTIVE';
		}
		return true;
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		// Make not find self account
		//$criteria->addCondition("t.id != '".$this->exceptFindId."'");
		$criteria->addCondition("t.role_id != '1'");
		
		if(isset($this->status)){
			$criteria->addCondition("t.status = '".$this->status."'");
		}
		if(isset($this->onlyStaff)){
			$criteria->addCondition("t.role_id = '2'");
		}
		
		$criteria->with = array('user_information','role', 'user_status');
		if($this->search_text != '') {
			$criteria->addCondition("user_information.personal_title LIKE '%".$this->search_text."%' OR 
					user_information.personal_title LIKE '%".$this->search_text."%' OR 
					user_information.first_name LIKE '%".$this->search_text."%' OR 
					user_information.last_name LIKE '%".$this->search_text."%' OR 
					t.email LIKE '%".$this->search_text."%' OR 
					t.username LIKE '%".$this->search_text."%' OR 
					user_status.name LIKE '%".$this->search_text."%'");
		}

		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
				'sort' => array(
						'defaultOrder' => 'user_information.id DESC',
						'attributes'=>array(
								'user_information_personal_title_search'=>array(
										'asc'=>'user_information.personal_title',
										'desc'=>'user_information.personal_title DESC',
								),
								'user_information_first_name_search'=>array(
										'asc'=>'user_information.first_name',
										'desc'=>'user_information.first_name DESC',
								),
								'user_information_last_name_search'=>array(
										'asc'=>'user_information.last_name',
										'desc'=>'user_information.last_name DESC',
								),
								'user_information_email_search'=>array(
										'asc'=>'t.email',
										'desc'=>'t.email DESC',
								),
								'role_name_search'=>array(
										'asc'=>'role.name',
										'desc'=>'role.name DESC',
								),
								'status_name_search'=>array(
										'asc'=>'user_status.name',
										'desc'=>'user_status.name DESC',
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