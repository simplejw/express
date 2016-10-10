<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $account_id
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property integer $status
 * @property string $add_time
 */
class Account extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			array('mobile', 'length', 'max'=>20),
			array('add_time', 'length', 'max'=>10),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'account_id' => 'Account',
			'email' => 'Email',
			'password' => 'Password',
			'mobile' => 'Mobile',
			'status' => 'Status',
			'add_time' => 'Add Time',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}