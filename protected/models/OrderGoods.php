<?php

/**
 * This is the model class for table "order_goods".
 *
 * The followings are the available columns in table 'order_goods':
 * @property integer $goods_id
 * @property integer $order_id
 * @property string $order_sn
 * @property string $name
 * @property string $short_name
 * @property string $barcode
 * @property string $amount
 * @property integer $goods_number
 */
class OrderGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('order_id, goods_number', 'numerical', 'integerOnly'=>true),
			array('order_sn, barcode', 'length', 'max'=>20),
			array('name, short_name', 'length', 'max'=>100),
			array('amount', 'length', 'max'=>10),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'goods_id' => 'Goods',
			'order_id' => 'Order',
			'order_sn' => 'Order Sn',
			'name' => 'Name',
			'short_name' => 'Short Name',
			'barcode' => 'Barcode',
			'amount' => 'Amount',
			'goods_number' => 'Goods Number',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OrderGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}