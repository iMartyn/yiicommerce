<?php

/**
 * This is the model base class for the table "products_description".
 *
 * Columns in table "products_description" available as properties of the model:
 * @property integer $products_id
 * @property integer $language_id
 * @property string $products_name
 * @property string $products_description
 * @property string $products_url
 * @property integer $products_viewed
 *
 * There are no model relations.
 */
abstract class BaseProductDescription extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'products_description';
	}

	public function rules()
	{
		return array(
			array('products_name, products_description, products_url, products_viewed', 'default', 'setOnEmpty' => true, 'value' => null),
			array('products_viewed', 'numerical', 'integerOnly'=>true),
			array('products_name', 'length', 'max'=>64),
			array('products_url', 'length', 'max'=>255),
			array('products_description', 'safe'),
			array('products_id, language_id, products_name, products_description, products_url, products_viewed', 'safe', 'on'=>'search'),
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
			'products_id' => Yii::t('app', 'Products'),
			'language_id' => Yii::t('app', 'Language'),
			'products_name' => Yii::t('app', 'Products Name'),
			'products_description' => Yii::t('app', 'Products Description'),
			'products_url' => Yii::t('app', 'Products Url'),
			'products_viewed' => Yii::t('app', 'Products Viewed'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('products_id', $this->products_id);
		$criteria->compare('language_id', $this->language_id);
		$criteria->compare('products_name', $this->products_name, true);
		$criteria->compare('products_description', $this->products_description, true);
		$criteria->compare('products_url', $this->products_url, true);
		$criteria->compare('products_viewed', $this->products_viewed);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->products_id;return '#'.$this->language_id;		
		
			}
	
}
