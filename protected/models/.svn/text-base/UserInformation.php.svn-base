<?php

class UserInformation extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_comment':
	 * @var integer $id
	 * @var string $content
	 * @var integer $status
	 * @var integer $create_time
	 * @var string $author
	 * @var string $email
	 * @var string $url
	 * @var integer $post_id
	 */
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	private $_idSearchText;
	private $_nameSearchText;

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
		return 'user_information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('personal_card_id, personal_title, first_name, last_name, password, gender, address1, address2, sub_district, district, province, postal_code, phone, mobile', 'safe'),
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
				'user_login' => array(self::HAS_ONE, 'UserLogin', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'personal_title' => 'Personal Title',
				'personal_card_id' => 'Personal Card ID',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'gender' => 'Gender',
				'birth_date' => 'Birth Date',
				'address1' => 'Address Line 1',
				'address2' => 'Address Line 2',
				'sub_district' => 'Sub District',
				'district' => 'District',
				'province' => 'Province',
				'postal_code' => 'Postal Code',
				'email' => 'Email',
				'phone' => 'Phone Number',
				'mobile' => 'Cell Phone Number',
				'fax' => 'Fax Number',
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
		$criteria=new CDbCriteria;
		$criteria->compare('id', $this->getIdSearchText(), true);
		$criteria->compare('name', $this->getNameSearchText(), true);
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
		));
	}
	public function getIdSearchText() {
		return $this->_idSearchText;
	}
	public function setIdSearchText($idSearchText) {
		$this->_idSearchText = $idSearchText;
	}
	public function getNameSearchText() {
		return $this->_nameSearchText;
	}
	public function setNameSearchText($nameSearchText) {
		$this->_nameSearchText = $nameSearchText;
	}
}