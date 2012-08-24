<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $passwordStrategy
 * @property integer $requiresNewPassword
 * @property string $email
 * @property integer $login_attempts
 * @property integer $login_time
 * @property string $login_ip
 * @property string $validation_key
 * @property integer $create_id
 * @property integer $create_time
 * @property integer $update_id
 * @property integer $update_time
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
			array('requiresNewPassword, login_attempts, login_time, create_id, create_time, update_id, update_time', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>45),
			array('password, salt, email, validation_key', 'length', 'max'=>255),
			array('passwordStrategy', 'length', 'max'=>50),
			array('login_ip', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, salt, passwordStrategy, requiresNewPassword, email, login_attempts, login_time, login_ip, validation_key, create_id, create_time, update_id, update_time', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'passwordStrategy' => 'Password Strategy',
			'requiresNewPassword' => 'Requires New Password',
			'email' => 'Email',
			'login_attempts' => 'Login Attempts',
			'login_time' => 'Login Time',
			'login_ip' => 'Login Ip',
			'validation_key' => 'Validation Key',
			'create_id' => 'Create',
			'create_time' => 'Create Time',
			'update_id' => 'Update',
			'update_time' => 'Update Time',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('passwordStrategy',$this->passwordStrategy,true);
		$criteria->compare('requiresNewPassword',$this->requiresNewPassword);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('login_attempts',$this->login_attempts);
		$criteria->compare('login_time',$this->login_time);
		$criteria->compare('login_ip',$this->login_ip,true);
		$criteria->compare('validation_key',$this->validation_key,true);
		$criteria->compare('create_id',$this->create_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}