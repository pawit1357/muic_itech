<?php

class RequestService extends CActiveRecord
{
	public $view_all_request;
	public $year_filter;
	public $month_filter;
	public $day_filter;
	public $date_filter;
	public $request_type_filter;
	public $completed_request;
	public $status_filter;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public function __construct($scenario='insert') {
		parent::__construct($scenario);
		$this->year_filter = date("Y") * 1;
		$this->month_filter = date("m") * 1;
		$this->day_filter = date("d") * 1;
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function clearDateFilter()
	{
		$this->year_filter = '';
		$this->month_filter = '';
		$this->day_filter = '';
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_service';
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'user_login' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
				'time' => array(self::BELONGS_TO, 'Period', 'time_period'),
				'request_service_details' => array(self::HAS_MANY, 'RequestServiceDetail', 'request_service_id'),
				'status' => array(self::BELONGS_TO, 'Status', 'status_code'),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('description, file_path, quantity, due_date, time_period', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
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
		$criteria->with = array('request_service_details');
		$criteria->together = true;
		
		if(!$this->view_all_request) {
			$criteria->addCondition("t.user_login_id = '".UserLoginUtil::getUserLoginId()."'");
		}
		
// 		echo $this->date_filter;
		if(isset($this->date_filter) && $this->date_filter != ''){
			list($day, $month, $year) = explode('-', $this->date_filter);
			$selectDate = $year.'-'.$month.'-'.$day;
// 			echo $selectDate;
			$criteria->addCondition ("due_date = '" . $selectDate . "'");	
		}
// 		if(isset($this->month_filter) && $this->month_filter != ''){
// 			$criteria->addCondition("(".$this->year_filter."  = YEAR(t.due_date) AND ".$this->month_filter." = MONTH(t.due_date))");
// 		}
// 		if(isset($this->day_filter) && $this->day_filter != ''){
// 			$criteria->addCondition("'".$this->year_filter."-".$this->month_filter."-".$this->day_filter."' = t.due_date");
// 		}
		
		if(isset($this->status_filter)){
			$criteria->addCondition("status_code='".$this->status_filter."'");
		}
		
// 		if($this->completed_request){
// 			$criteria->addCondition("status_code IN ('REQUEST_ISERVICE_CANCEL', 'REQUEST_ISERVICE_COMPLETED', 'REQUEST_ISERVICE_PROCESSING')");
// 		} 
// 		else {
// 			$criteria->addCondition("status_code NOT IN ('REQUEST_ISERVICE_CANCEL', 'REQUEST_ISERVICE_COMPLETED')");
// 		}

// 		if(isset($this->request_type_filter)){
// 			$typeIn = "(";
// 			$reqServiceTypeDetails = RequestServiceTypeDetail::model()->findAll(array('condition'=>"request_service_type_id = '".$this->request_type_filter."'"));
// 			foreach($reqServiceTypeDetails as $reqServiceTypeDetail){
// 				$typeIn = $typeIn.$reqServiceTypeDetail->id.',';
// 			}
// 			if(strlen($typeIn) > 1) {
// 				$typeIn = substr($typeIn, 0, strlen($typeIn)-1);
// 			}
// 			$typeIn = $typeIn.")";
// 			$criteria->addCondition("request_service_details.request_service_type_detail_id in ".$typeIn);
// 		}


		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
				'sort' => array(
						'defaultOrder' => 't.create_date DESC',
				),
				'pagination' => array(
						'pageSize' => ConfigUtil::getDefaultPageSize()
				),
		));
	}
}