<?php

/**
 * This is the model class for table "user_category".
 *
 * The followings are the available columns in table 'user_category':
 * @property string $user_id
 * @property string $category_id
 * @property string $begin_year
 * @property string $area_​​operations
 * @property string $awards
 * @property string $agent
 * @property string $services
 * @property string $description
 * @property string $tags
 * @property string $price
 * @property string $currency
 * @property string $unit
 * @property string $price_description
 * @property string $scheme_work
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Category $category
 */
class UserCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, category_id, begin_year, area_​​operations, awards, agent, services, description, tags, price, unit, price_description, scheme_work', 'required'),
			array('user_id, category_id, price', 'length', 'max'=>10),
			array('begin_year', 'length', 'max'=>4),
			array('area_​​operations, services, tags', 'length', 'max'=>128),
			array('awards', 'length', 'max'=>256),
			array('agent, unit', 'length', 'max'=>32),
			array('currency', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, category_id, begin_year, area_​​operations, awards, agent, services, description, tags, price, currency, unit, price_description, scheme_work', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'category_id' => 'Category',
			'begin_year' => 'Begin Year',
			'area_​​operations' => 'Area ​​operations',
			'awards' => 'Awards',
			'agent' => 'Agent',
			'services' => 'Services',
			'description' => 'Description',
			'tags' => 'Tags',
			'price' => 'Price',
			'currency' => 'Currency',
			'unit' => 'Unit',
			'price_description' => 'Price Description',
			'scheme_work' => 'Scheme Work',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('begin_year',$this->begin_year,true);
		$criteria->compare('area_operations',$this->area_operations,true);
		$criteria->compare('awards',$this->awards,true);
		$criteria->compare('agent',$this->agent,true);
		$criteria->compare('services',$this->services,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('price_description',$this->price_description,true);
		$criteria->compare('scheme_work',$this->scheme_work,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
