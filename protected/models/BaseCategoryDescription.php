<?php

/**
 * This is the model base class for the table "categories_description".
 *
 * Columns in table "categories_description" available as properties of the model:
 * @property integer $categories_id
 * @property integer $language_id
 * @property string $categories_name
 *
 * There are no model relations.
 */
abstract class BaseCategoryDescription extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'categories_description';
	}

	public function rules()
	{
		return array(
			array('categories_name', 'required'),
			array('categories_id, language_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('categories_id, language_id', 'numerical', 'integerOnly'=>true),
			array('categories_name', 'length', 'max'=>32),
			array('categories_id, language_id, categories_name', 'safe', 'on'=>'search'),
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
			'categories_id' => Yii::t('app', 'Categories'),
			'language_id' => Yii::t('app', 'Language'),
			'categories_name' => Yii::t('app', 'Categories Name'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('categories_id', $this->categories_id);
		$criteria->compare('language_id', $this->language_id);
		$criteria->compare('categories_name', $this->categories_name, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->categories_id;return '#'.$this->language_id;		
		
			}
	
}
