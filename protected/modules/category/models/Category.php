<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $root
 * @property string $name
 * @property string $url
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property GroupcategoryCategory[] $groupcategoryCategories
 * @property Project[] $projects
 * @property UserCategory[] $userCategories
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url', 'required'),
			array('name, url', 'length', 'max'=>64),
                        array('url', 'match', 'pattern' => '/^[a-z0\-]+$/', 'message' => Yii::t('CategoryModule.category', 'In the Url using letters and hyphen.')),
                        array('url', 'unique', 'on' => 'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, root, name, lft, rgt, level', 'safe', 'on'=>'search'),
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
			'groupcategoryCategories' => array(self::HAS_MANY, 'GroupcategoryCategory', 'category_id'),
			'projects' => array(self::HAS_MANY, 'Project', 'category_id'),
			'userCategories' => array(self::HAS_MANY, 'UserCategory', 'category_id'),
		);
	}

        public function behaviors()
        {
            return array(
                'nestedSetBehavior'=>array(
                    'class'=>'ext.behaviors.NestedSetBehavior',
                    'hasManyRoots'=>true,
                    'leftAttribute'=>'lft',
                    'rightAttribute'=>'rgt',
                    'levelAttribute'=>'level',
                    'rootAttribute'=>'root',
                ),
            );
        }
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'root' => Yii::t('CategoryModule.category', 'Root'),
			'name' => Yii::t('CategoryModule.category', 'Name'),
			'url' => 'Url',
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
		$criteria->compare('root',$this->root,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('level',$this->level);
                $criteria->order = 'root, lft';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
