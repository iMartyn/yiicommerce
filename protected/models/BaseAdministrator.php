<?php

/**
 * This is the model base class for the table "administrators".
 *
 * Columns in table "administrators" available as properties of the model:
 * @property integer $id
 * @property string $user_name
 * @property string $user_password
 *
 * There are no model relations.
 */
abstract class BaseAdministrator extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'administrators';
	}

	public function rules()
	{
		return array(
			array('user_name, user_password', 'required'),
			array('user_name', 'length', 'max'=>255),
			array('user_password', 'length', 'max'=>60),
			array('id, user_name, user_password', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app', 'ID'),
			'user_name' => Yii::t('app', 'User Name'),
			'user_password' => Yii::t('app', 'User Password'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_name', $this->user_name, true);
		$criteria->compare('user_password', $this->user_password, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->id;		
		
			}
	
}
