<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property string $id
 * @property string $project_id
 * @property string $name
 * @property string $filename
 * @property string $sort
 *
 * The followings are the available model relations:
 * @property Project $project
 */
class Photo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('name', 'filter', 'filter' => array($obj=new CHtmlPurifier(), 'purify')),
                        array('name', 'filter', 'filter'=>'trim'),
			array('project_id, sort', 'required'),
			array('project_id, sort', 'length', 'max'=>10),
			array('name', 'length', 'max'=>128),
                        array('name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_id, name, filename, sort', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_id' => 'Project',
			'name' => Yii::t('ProjectModule.project', 'Name'),
                        'filename' => Yii::t('ProjectModule.project', 'Image'),
			'sort' => Yii::t('ProjectModule.project', 'Order'),
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
                $criteria->order = 'sort ASC';
                
		$criteria->compare('id',$this->id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sort',$this->sort,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        //расчет новых размеров загружаемого фото
        public static function dimension($maxWidth, $maxHeight, $curWidth, $curHeight)
        {
            if($curWidth > $maxWidth || $curHeight > $maxHeight)
            {
                if($curWidth > $curHeight)
                {
                    $newWidth = $maxWidth;
                    $newHeight = round($curHeight * $newWidth / $curWidth, 0);
                }
                else
                {
                    $newHeight = $maxHeight;
                    $newWidth = round($curWidth * $newHeight / $curHeight, 0);
                }
                return array($newWidth, $newHeight);
            }
            else
            {
                return array($curWidth, $curHeight);
            }
        }
        
        //расчет координат миниатюры для загружаемого фото
        public static function dimensionThumbnail($thumbWidth, $thumbHeight, $curWidth, $curHeight)
        {
            
            if(
                (($curWidth / $curHeight > 1) && ($curWidth / $curHeight) > ($thumbWidth / $thumbHeight)) ||
                (($curWidth / $curHeight < 1) && ($curWidth / $curHeight) > ($thumbWidth / $thumbHeight))    
            )
            {
                $newHeight = $curHeight;
                $newWidth = $newHeight * $thumbWidth / $thumbHeight;
                $x = ceil(($curWidth - $newWidth) / 2);
                $y = 0;
            }
            else
            {
                $newWidth = $curWidth;
                $newHeight = $newWidth * $thumbHeight / $thumbWidth;
                $y = ceil(($curHeight - $newHeight) / 2);
                $x = 0;
            }
            
            return array($newWidth, $newHeight, $x, $y);
        }
}
