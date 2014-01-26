<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id
 * @property string $user_id
 * @property string $category_id
 * @property string $name
 * @property string $date_finished
 * @property string $price
 * @property string $currency
 * @property string $unit
 * @property string $description
 * @property string $sort
 *
 * The followings are the available model relations:
 * @property Photo[] $photos
 * @property User $user
 * @property Category $category
 * @property Video[] $videos
 */
class Project extends CActiveRecord
{
        private $_userNick = null;
        private $_categoryName = null;
        
        public function getUserNick()
        {
            if ($this->_userNick === null && $this->user !== null)
            {
                $this->_userNick = $this->user->nick;
            }
            return $this->_userNick;
        }
        
        public function setUserNick($value)
        {
            $this->_userNick = $value;
        }
        
        public function getCategoryName()
        {
            if ($this->_categoryName=== null && $this->category !== null)
            {
                $this->_categoryName = $this->category->name;
            }
            return $this->_categoryName;
        }
        
        public function setCategoryName($value)
        {
            $this->_categoryName = $value;
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, category_id, name, price, unit, description, sort', 'required'),
			array('user_id, category_id, price, sort', 'length', 'max'=>10),
			array('name', 'length', 'max'=>256),
			array('unit', 'length', 'max'=>32),
			array('date_finished, currency', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userNick, categoryName, user_id, category_id, name, date_finished, price, currency, unit, description, sort', 'safe', 'on'=>'search'),
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
			'photos' => array(self::HAS_MANY, 'Photo', 'project_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'videos' => array(self::HAS_MANY, 'Video', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'userNick' => Yii::t('UserModule.user', 'Nick'),
			'categoryName' => Yii::t('ProjectModule.project', 'Name category'),
			'name' => Yii::t('ProjectModule.project', 'Name project'),
			'date_finished' => Yii::t('ProjectModule.project', 'When the project was executed'),
			'price' => Yii::t('ProjectModule.project', 'Price'),
			'currency' => Yii::t('ProjectModule.project', 'Currency'),
			'unit' => Yii::t('ProjectModule.project', 'For that payment'),
			'description' => Yii::t('ProjectModule.project', 'Description'),
			'sort' => 'Sort',
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
		$criteria->compare('user_id',$this->user_id,true);
                
                $criteria->with = array('user', 'category'); // жадная загрузка
                $criteria->compare('user.nick', $this->userNick, true); // поиск по связанному полю
                $criteria->compare('category.name', $this->categoryName, true); // поиск по связанному полю
                
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date_finished',$this->date_finished,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort',$this->sort,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('attributes'=>array(
                            'defaultOrder'=>'sort ASC',
                            'id',
                            'name',
                            'userNick'=>array(
                                'asc'=>'user.nick',
                                'desc'=>'user.nick DESC',
                            ),
                            'categoryName'=>array(
                                'asc'=>'category.name',
                                'desc'=>'category.name DESC',
                            ),
                        )),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
