<?php

/**
 * This is the model class for table "tbl_client_user".
 *
 * The followings are the available columns in table 'tbl_client_user':
 * @property integer $id
 * @property integer $access_point_id
 * @property string $phone
 * @property string $auth_code
 * @property string $auth_token
 * @property string $create_time
 */
class ClientUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClientUser the static model class
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
		return 'tbl_client_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone, auth_code, create_time', 'required'),
			array('phone, auth_code', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('phone, auth_code, auth_token', 'safe', 'on'=>'search'),
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
			'access_point_id' => 'Access Point',
			'phone' => 'Phone',
			'auth_code' => 'Auth Code',
			'auth_token' => 'Auth Token',
			'create_time' => 'Create Time',
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
		$criteria->compare('access_point_id',$this->access_point_id);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('auth_code',$this->auth_code,true);
		$criteria->compare('auth_token',$this->auth_token,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}