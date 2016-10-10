<?php

/**
 * This is the model class for table "order_log".
 *
 * The followings are the available columns in table 'order_log':
 * @property string $log_id
 * @property integer $order_id
 * @property integer $action
 * @property string $note
 * @property integer $admin_id
 * @property string $admin_user
 * @property string $add_time
 */
class OrderLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('order_id, action, admin_id', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>200),
			array('admin_user', 'length', 'max'=>30),
			array('add_time', 'length', 'max'=>10),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'log_id' => 'Log',
			'order_id' => 'Order',
			'action' => 'Action',
			'note' => 'Note',
			'admin_id' => 'Admin',
			'admin_user' => 'Admin User',
			'add_time' => 'Add Time',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OrderLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}