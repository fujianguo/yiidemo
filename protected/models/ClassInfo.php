<?php

/**
 * This is the model class for table "{{class_info}}".
 *
 * The followings are the available columns in table '{{class_info}}':
 * @property string $id
 * @property string $name
 * @property string $logo
 * @property string $description
 * @property integer $state
 * @property string $md5
 * @property string $create_time
 * @property integer $dateline
 */
class ClassInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClassInfo the static model class
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
		return '{{class_info}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, create_time, dateline', 'required'),
			array('state, dateline', 'numerical', 'integerOnly'=>true),
			array('name, logo, description, create_time', 'length', 'max'=>255),
			array('md5', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, logo, description, state, md5, create_time, dateline', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'logo' => 'Logo',
			'description' => 'Description',
			'state' => 'State',
			'md5' => 'Md5',
			'create_time' => 'Create Time',
			'dateline' => 'Dateline',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('md5',$this->md5,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('dateline',$this->dateline);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}