<?php

/**
 * This is the model class for table "order_ems".
 *
 * The followings are the available columns in table 'order_ems':
 * @property integer $order_id
 * @property string $ems_sn
 * @property string $shipping_ext
 * @property string $updated
 */
class OrderEms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_ems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('shipping_ext', 'safe'),
			array('ems_sn', 'length', 'max'=>20),
			array('updated', 'length', 'max'=>10),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'Order',
			'ems_sn' => 'Ems Sn',
			'shipping_ext' => 'Shipping Ext',
			'updated' => 'Updated',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return order_ems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}