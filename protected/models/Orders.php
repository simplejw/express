<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $order_id
 * @property string $order_sn
 * @property string $ems_sn
 * @property integer $account_id
 * @property integer $sender_id
 * @property string $sender_realname
 * @property string $sender_mobile
 * @property string $sender_postcode
 * @property string $sender_address
 * @property integer $consignee_id
 * @property string $consignee_realname
 * @property string $consignee_mobile
 * @property string $consignee_postcode
 * @property string $consignee_address
 * @property string $user_weight
 * @property string $shipping_weight
 * @property string $amount
 * @property integer $order_status
 * @property integer $shipping_status
 * @property string $note
 * @property string $add_time
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, account_id, sender_id, consignee_id, order_status, shipping_status', 'numerical', 'integerOnly'=>true),
			array('order_sn, ems_sn, sender_realname, sender_mobile, consignee_realname, consignee_mobile', 'length', 'max'=>20),
			array('sender_postcode, consignee_postcode, amount, add_time', 'length', 'max'=>10),
			array('sender_address, consignee_address, note', 'length', 'max'=>200),
			array('user_weight, shipping_weight', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_id, order_sn, ems_sn, account_id, sender_id, sender_realname, sender_mobile, sender_postcode, sender_address, consignee_id, consignee_realname, consignee_mobile, consignee_postcode, consignee_address, user_weight, shipping_weight, amount, order_status, shipping_status, note, add_time', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'order_sn' => 'Order Sn',
			'ems_sn' => 'Ems Sn',
			'account_id' => 'Account',
			'sender_id' => 'Sender',
			'sender_realname' => 'Sender Realname',
			'sender_mobile' => 'Sender Mobile',
			'sender_postcode' => 'Sender Postcode',
			'sender_address' => 'Sender Address',
			'consignee_id' => 'Consignee',
			'consignee_realname' => 'Consignee Realname',
			'consignee_mobile' => 'Consignee Mobile',
			'consignee_postcode' => 'Consignee Postcode',
			'consignee_address' => 'Consignee Address',
			'user_weight' => 'User Weight',
			'shipping_weight' => 'Shipping Weight',
			'amount' => 'Amount',
			'order_status' => 'Order Status',
			'shipping_status' => 'Shipping Status',
			'note' => 'Note',
			'add_time' => 'Add Time',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('order_sn',$this->order_sn,true);
		$criteria->compare('ems_sn',$this->ems_sn,true);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('sender_realname',$this->sender_realname,true);
		$criteria->compare('sender_mobile',$this->sender_mobile,true);
		$criteria->compare('sender_postcode',$this->sender_postcode,true);
		$criteria->compare('sender_address',$this->sender_address,true);
		$criteria->compare('consignee_id',$this->consignee_id);
		$criteria->compare('consignee_realname',$this->consignee_realname,true);
		$criteria->compare('consignee_mobile',$this->consignee_mobile,true);
		$criteria->compare('consignee_postcode',$this->consignee_postcode,true);
		$criteria->compare('consignee_address',$this->consignee_address,true);
		$criteria->compare('user_weight',$this->user_weight,true);
		$criteria->compare('shipping_weight',$this->shipping_weight,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('shipping_status',$this->shipping_status);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('add_time',$this->add_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
