<?php

/**
 * This is the model class for table "sender".
 *
 * The followings are the available columns in table 'sender':
 * @property integer $sender_id
 * @property integer $account_id
 * @property string $realname
 * @property string $mobile
 * @property string $postcode
 * @property string $address
 * @property integer $is_default
 */
class Sender extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sender';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('account_id, is_default', 'numerical', 'integerOnly'=>true),
			array('realname, mobile', 'length', 'max'=>20),
			array('postcode', 'length', 'max'=>10),
			array('address', 'length', 'max'=>200),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sender_id' => 'Sender',
			'account_id' => 'Account',
			'realname' => 'Realname',
			'mobile' => 'Mobile',
			'postcode' => 'Postcode',
			'address' => 'Address',
			'is_default' => 'Is Default',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Sender the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}