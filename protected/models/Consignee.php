<?php

/**
 * This is the model class for table "consignee".
 *
 * The followings are the available columns in table 'consignee':
 * @property integer $consignee_id
 * @property integer $account_id
 * @property string $realname
 * @property string $mobile
 * @property string $postcode
 * @property string $address
 * @property string $idcard
 * @property string $id_fg
 * @property string $id_bg
 * @property string $add_time
 * @property integer $is_default
 */
class Consignee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consignee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('account_id, is_default', 'numerical', 'integerOnly'=>true),
			array('realname, mobile', 'length', 'max'=>20),
			array('postcode, add_time', 'length', 'max'=>10),
			array('address', 'length', 'max'=>200),
			array('id_fg, id_bg', 'length', 'max'=>50),
			array('idcard', 'length', 'max'=>18),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'consignee_id' => 'Consignee',
			'account_id' => 'Account',
			'realname' => 'Realname',
			'mobile' => 'Mobile',
			'postcode' => 'Postcode',
			'address' => 'Address',
			'idcard' => 'Idcard',
			'id_fg' => 'Id Fg',
			'id_bg' => 'Id Bg',
			'add_time' => 'Add Time',
			'is_default' => 'Is Default',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Consignee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}