<?php

/**
 * This is the model class for table "tbl_sponsor".
 *
 * The followings are the available columns in table 'tbl_sponsor':
 * @property integer $id
 * @property integer $portal_id
 * @property string $name
 * @property string $url
 * @property integer $status
 * @property string $logo
 */
class Sponsor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Sponsor the static model class
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
		return 'tbl_sponsor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>512),
			array('url', 'length', 'max'=>2048),
            array('logo', 'file', 'types'=>'jpg, gif, png', 
                                  'maxSize'=>1024 * 1024, // 1MB
                                  'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('portal_id, name', 'safe', 'on'=>'search'),
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
			'portal' => array(self::BELONGS_TO, 'Portal', 'portal_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'portal_id' => 'Portal',
			'name' => 'Name',
			'url' => 'Site URL',
			'status' => 'Status',
			'logo' => 'Logo'
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
		$criteria->compare('portal_id',$this->portal_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($logo=CUploadedFile::getInstance($this,'logo'))
            {
                $this->logo=file_get_contents($logo->tempName);
                $this->logo_content_type = $logo->type;
            }
            
            return true;
        }
        else
            return false;
    }
}