<?php
class RequestBooking extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @return CActiveRecord the static model class
	 */
	public $view_all_request = false;
	public $view_all_admin = false;
	public $date_filter;
	public $request_sky_noti_id;

	public $status_filter;
	public $room_filter;
	public $user_filter;
	public $exceptRoomId;
	public $hiddenPass = false;
	public function __construct($scenario = 'insert') {
		parent::__construct ( $scenario );
	}
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}


	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'request_booking';
	}

	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'user_login' => array (
						self::BELONGS_TO,
						'UserLogin',
						'user_login_id'
				),
				'request_booking_type' => array (
						self::BELONGS_TO,
						'RequestBookingType',
						'request_booking_type_id'
				),
				'period_s' => array (
						self::BELONGS_TO,
						'Period',
						'period_start'
				),
				'period_e' => array (
						self::BELONGS_TO,
						'Period',
						'period_end'
				),
				'room' => array (
						self::BELONGS_TO,
						'Room',
						'room_id'
				),
				'status' => array (
						self::BELONGS_TO,
						'Status',
						'status_code'
				),
				'day_in_week' => array (
						self::BELONGS_TO,
						'Enumeration',
						'request_day_in_week'
				),
				'semester' => array (
						self::BELONGS_TO,
						'Semester',
						'semester_id'
				)
		);
	}

	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'room_id, request_booking_type_id, request_date, period_start, period_end, description, course_name, semester_id, request_day_in_week,request_sky_id,request_sky_noti_id',
						'safe'
				)
		);
		// array('room_id, request_booking_type_id, period_start, period_end', 'required'),

	}

	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'request_date' => 'Request Date',
				'description' => 'Description'
		);
	}

	/**
	 *
	 * @param
	 *        	Post the post that this comment belongs to. If null, the method
	 *        	will query for the post.
	 * @return string the permalink URL for this comment
	 */
	public function getUrl($post = null) {
		if ($post === null)
			$post = $this->post;
		return $post->url . '#c' . $this->id;
	}

	/**
	 * This is invoked before the record is saved.
	 *
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave() {
		/*
		 * if(parent::beforeSave())
		 * {
		* if($this->isNewRecord)
		 * $this->create_time=time();
		* return true;
		* }
		* else
		 * return false;
		*/
		return true;
	}
	public function searchSkyeData() {
		$criteria = new CDbCriteria ();

		$criteria->addCondition ( "t.request_sky_noti_id='" . $this->request_sky_noti_id . "' AND t.status_code = '" . $this->status_filter . "'" );

		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.request_sky_id'
				),
				'pagination' => array (
						'pageSize' => 20
				)
		) );
	}

	// All Booking
	public function searchAllBooking() {
		$criteria = new CDbCriteria ();
		$criteria->with = array (
				'semester',
				'period_e',
				'period_s',
				'user_login'
		);


		if ($this->hiddenPass) {
			$criteria->addCondition ("( t.request_booking_type_id in (1,2,3) AND t.request_date = '" . Date ( "Y-m-d" ) . "' AND period_e.end_hour >= '" . date ( "H" ) . "')");
		}
		if (isset ( $this->date_filter ) && $this->date_filter != '') {
			list($day, $month, $year) = explode('-', $this->date_filter);
			$selectDate = $year.'-'.$month.'-'.$day;
			$criteria->addCondition ("(t.request_date = '" . $selectDate . "')");
		}
		if (isset ( $this->status_filter ) && $this->status_filter != '') {
			$criteria->addCondition ( "t.status_code='" . $this->status_filter . "'" );
		}
		if (isset ( $this->room_filter ) && $this->room_filter != '') {
			$criteria->addCondition ( "t.room_id='" . $this->room_filter . "'" );
		}
		
		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.request_date, t.room_id'
				),
				'pagination' => array (
						'pageSize' => 10
				)
		) );
	}

	public function searchMyBooking() {
		$criteria = new CDbCriteria ();
		$criteria->with = array (
				'semester',
				'period_e',
				'period_s',
				'user_login'
		);

		if ($this->hiddenPass) {
			/* INITIAL FIRST LOAD THIS PAGE */
			//$dayInWeek =  date('N', strtotime( Date ( "Y-m-d" )));
			$criteria->addCondition ("( t.request_booking_type_id in (1,2,3) AND (case when t.request_date = '" . Date ( "Y-m-d" ) . "' then (t.request_date = '" . Date ( "Y-m-d" ) . "' AND period_e.end_hour >= '" . date ( "H" ) . "') else (t.request_date >= '" . Date ( "Y-m-d" ) . "') end ))");
		}
		if (isset ( $this->date_filter ) && $this->date_filter != '') {
			list($day, $month, $year) = explode('-', $this->date_filter);
			$selectDate = $year.'-'.$month.'-'.$day;
			$criteria->addCondition ("(t.request_date = '" . $selectDate . "')");
		}
		if (isset ( $this->status_filter ) && $this->status_filter != '') {
			$criteria->addCondition ( "t.status_code='" . $this->status_filter . "'" );
		}
		if (isset ( $this->room_filter ) && $this->room_filter != '') {
			$criteria->addCondition ( "t.room_id='" . $this->room_filter . "'" );
		}

		$criteria->addCondition ( "t.user_login_id = '" . UserLoginUtil::getUserLoginId () . "'" );


		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.request_date, t.room_id'
				),
				'pagination' => array (
						'pageSize' => 10
				)
		) );
	}
}