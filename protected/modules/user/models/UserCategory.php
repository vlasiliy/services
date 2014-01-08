<?php

/**
 * This is the model class for table "user_category".
 *
 * The followings are the available columns in table 'user_category':
 * @property string $user_id
 * @property string $category_id
 * @property string $begin_year
 * @property string $area_operations
 * @property string $awards
 * @property string $agent
 * @property string $service
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
        public function primaryKey(){
            return array('user_id', 'category_id');
        }    
        
        public $arrExperience = array(
            0 => '-',
            1 => '1 year',
            2 => '2 years',
            3 => '3 years',
            4 => '4 years',
            5 => '5 years',
            8 => 'more than 5 years',
            11 => 'more than 10 years',
        );
        
        public function getListExperience()
        {
            foreach($this->arrExperience as $key => $value) 
            {
                $this->arrExperience[$key] = Yii::t('UserModule.user', $value);
            }
            
            return $this->arrExperience;
        }
    
        static function getExperience($begin_year)
        {
            switch (date('Y') - $begin_year)
            {
                case date('Y'):
                    return 0;
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                    return date('Y') - $begin_year;
                    break;
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                    return 8;
                    break;
            }
            if(date('Y') - $begin_year > 10)
                {return 11;}
        }
        
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
                        array('area_operations, awards, agent, service, description, tags, price, unit, price_description, scheme_work', 'filter', 'filter' => array($obj=new CHtmlPurifier(), 'purify')),
                        array('area_operations, awards, agent, service, description, tags, price, unit, price_description, scheme_work', 'filter', 'filter' => 'trim'),
                    
			array('begin_year, area_operations, service', 'required'),
			array('user_id, category_id, price', 'length', 'max'=>10),
			array('begin_year', 'length', 'max'=>4),
			array('area_operations, service, tags', 'length', 'max'=>128),
			array('awards', 'length', 'max'=>256),
			array('price', 'numerical', 'integerOnly' => true, 'min' => 1),
			array('agent, unit', 'length', 'max'=>32),
			array('currency, user_id, category_id, awards, agent, description, tags, price, unit, price_description, scheme_work', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, category_id, begin_year, area_operations, awards, agent, service, description, tags, price, currency, unit, price_description, scheme_work', 'safe', 'on'=>'search'),
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
			'begin_year' => Yii::t('UserModule.user', 'Experience'),
			'area_operations' => Yii::t('UserModule.user', 'Area operations'),
			'awards' => Yii::t('UserModule.user', 'Awards'),
			'agent' => Yii::t('UserModule.user', 'Agent'),
			'service' => Yii::t('UserModule.user', 'Service'),
			'description' => Yii::t('UserModule.user', 'Description'),
			'tags' => Yii::t('UserModule.user', 'Tags'),
			'price' => Yii::t('UserModule.user', 'Price'),
			'currency' => Yii::t('UserModule.user', 'Currency'),
			'unit' => Yii::t('UserModule.user', 'Unit'),
			'price_description' => Yii::t('UserModule.user', 'Price Description'),
			'scheme_work' => Yii::t('UserModule.user', 'Scheme Work'),
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
		$criteria->compare('service',$this->service,true);
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
