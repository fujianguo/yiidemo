<?php

/**
 * This is the model class for table "{{author}}".
 *
 * The followings are the available columns in table '{{author}}':
 * @property integer $id
 * @property string $uname
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 */
class Author extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Author the static model class
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
		return '{{author}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('uname', 'length', 'max'=>50),
			array('avatar', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uname, avatar', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Post', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uname' => 'Uname',
			'avatar' => 'Avatar',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('uname',$this->uname,true);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAvatar()
	{
		$avatars = array();
		if ($this->avatar) {
			$avatars = explode(",", $this->avatar);
		}
		return $avatars;
	}
}