<?php

/**
 * This is the model base class for the table "customers".
 *
 * Columns in table "customers" available as properties of the model:
 * @property integer $customers_id
 * @property string $customers_gender
 * @property string $customers_firstname
 * @property string $customers_lastname
 * @property string $customers_dob
 * @property string $customers_email_address
 * @property integer $customers_default_address_id
 * @property string $customers_telephone
 * @property string $customers_fax
 * @property string $customers_password
 * @property string $customers_newsletter
 *
 * There are no model relations.
 */
abstract class BaseCustomer extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'customers';
	}

	public function rules()
	{
		return array(
			array('customers_firstname, customers_lastname, customers_email_address, customers_telephone, customers_password', 'required'),
			array('customers_gender, customers_dob, customers_default_address_id, customers_fax, customers_newsletter', 'default', 'setOnEmpty' => true, 'value' => null),
			array('customers_default_address_id', 'numerical', 'integerOnly'=>true),
			array('customers_gender, customers_newsletter', 'length', 'max'=>1),
			array('customers_firstname, customers_lastname, customers_email_address, customers_telephone, customers_fax', 'length', 'max'=>255),
			array('customers_password', 'length', 'max'=>60),
			array('customers_dob', 'safe'),
			array('customers_id, customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_default_address_id, customers_telephone, customers_fax, customers_password, customers_newsletter', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'customers_id' => Yii::t('app', 'Customers'),
			'customers_gender' => Yii::t('app', 'Customers Gender'),
			'customers_firstname' => Yii::t('app', 'Customers Firstname'),
			'customers_lastname' => Yii::t('app', 'Customers Lastname'),
			'customers_dob' => Yii::t('app', 'Customers Dob'),
			'customers_email_address' => Yii::t('app', 'Customers Email Address'),
			'customers_default_address_id' => Yii::t('app', 'Customers Default Address'),
			'customers_telephone' => Yii::t('app', 'Customers Telephone'),
			'customers_fax' => Yii::t('app', 'Customers Fax'),
			'customers_password' => Yii::t('app', 'Customers Password'),
			'customers_newsletter' => Yii::t('app', 'Customers Newsletter'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('customers_id', $this->customers_id);
		$criteria->compare('customers_gender', $this->customers_gender, true);
		$criteria->compare('customers_firstname', $this->customers_firstname, true);
		$criteria->compare('customers_lastname', $this->customers_lastname, true);
		$criteria->compare('customers_dob', $this->customers_dob, true);
		$criteria->compare('customers_email_address', $this->customers_email_address, true);
		$criteria->compare('customers_default_address_id', $this->customers_default_address_id);
		$criteria->compare('customers_telephone', $this->customers_telephone, true);
		$criteria->compare('customers_fax', $this->customers_fax, true);
		$criteria->compare('customers_password', $this->customers_password, true);
		$criteria->compare('customers_newsletter', $this->customers_newsletter, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->customers_id;		
		
			}
	
}
