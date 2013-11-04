<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $role
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $sex
 * @property string $company
 * @property string $city
 * @property string $postcode
 * @property string $address
 * @property string $tel1
 * @property string $tel2
 * @property string $site
 * @property string $skype
 * @property string $icq
 * @property double $lat
 * @property double $lng
 * @property string $date_create
 * @property string $date_update
 * @property string $date_last_visit
 *
 * The followings are the available model relations:
 * @property Project[] $projects
 * @property UserCategory[] $userCategories
 * @property UserRegion[] $userRegions
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, name, surname, sex, company, city, postcode, address, tel1, tel2, site, skype, icq, lat, lng, date_create', 'required'),
			array('lat, lng', 'numerical'),
			array('email, company', 'length', 'max'=>128),
			array('password, name, skype', 'length', 'max'=>32),
			array('surname, city, address, site', 'length', 'max'=>64),
			array('sex', 'length', 'max'=>1),
			array('postcode, tel1, tel2', 'length', 'max'=>16),
			array('icq', 'length', 'max'=>10),
			array('role, date_update, date_last_visit', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role, email, password, name, surname, sex, company, city, postcode, address, tel1, tel2, site, skype, icq, lat, lng, date_create, date_update, date_last_visit', 'safe', 'on'=>'search'),
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
			'projects' => array(self::HAS_MANY, 'Project', 'user_id'),
			'userCategories' => array(self::HAS_MANY, 'UserCategory', 'user_id'),
			'userRegions' => array(self::HAS_MANY, 'UserRegion', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'role' => 'Role',
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Name',
			'surname' => 'Surname',
			'sex' => 'Sex',
			'company' => 'Company',
			'city' => 'City',
			'postcode' => 'Postcode',
			'address' => 'Address',
			'tel1' => 'Tel1',
			'tel2' => 'Tel2',
			'site' => 'Site',
			'skype' => 'Skype',
			'icq' => 'Icq',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'date_create' => 'Date Create',
			'date_update' => 'Date Update',
			'date_last_visit' => 'Date Last Visit',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel1',$this->tel1,true);
		$criteria->compare('tel2',$this->tel2,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('icq',$this->icq,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('date_last_visit',$this->date_last_visit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
