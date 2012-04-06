<?php

/**
 * This is the model base class for the table "categories".
 *
 * Columns in table "categories" available as properties of the model:
 * @property integer $categories_id
 * @property string $categories_image
 * @property integer $parent_id
 * @property integer $sort_order
 * @property string $date_added
 * @property string $last_modified
 *
 * There are no model relations.
 */
abstract class BaseCategory extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'categories';
	}

	public function rules()
	{
		return array(
			array('categories_image, parent_id, sort_order, date_added, last_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('parent_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('categories_image', 'length', 'max'=>64),
			array('date_added, last_modified', 'safe'),
			array('categories_id, categories_image, parent_id, sort_order, date_added, last_modified', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
                    'description'=>array(self::HAS_ONE, 'CategoryDescription', 'categories_id'),
                    'products'=>array(self::MANY_MANY, 'Product', 'products_to_categories(categories_id,products_id)'),
                    'productCount' => array(self::STAT, 'Product', 'products_to_categories(categories_id,products_id)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'categories_id' => Yii::t('app', 'Categories'),
			'categories_image' => Yii::t('app', 'Categories Image'),
			'parent_id' => Yii::t('app', 'Parent'),
			'sort_order' => Yii::t('app', 'Sort Order'),
			'date_added' => Yii::t('app', 'Date Added'),
			'last_modified' => Yii::t('app', 'Last Modified'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('categories_id', $this->categories_id);
		$criteria->compare('categories_image', $this->categories_image, true);
		$criteria->compare('parent_id', $this->parent_id);
		$criteria->compare('sort_order', $this->sort_order);
		$criteria->compare('date_added', $this->date_added, true);
		$criteria->compare('last_modified', $this->last_modified, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return $this->description;		
		
			}
	
}
