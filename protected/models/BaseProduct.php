<?php

/**
 * This is the model base class for the table "products".
 *
 * Columns in table "products" available as properties of the model:
 * @property integer $products_id
 * @property integer $products_quantity
 * @property string $products_model
 * @property string $products_image
 * @property string $products_price
 * @property string $products_date_added
 * @property string $products_last_modified
 * @property string $products_date_available
 * @property string $products_weight
 * @property integer $products_status
 * @property integer $products_tax_class_id
 * @property integer $manufacturers_id
 * @property integer $products_ordered
 *
 * There are no model relations.
 */
abstract class BaseProduct extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'products';
	}

	public function rules()
	{
		return array(
			array('products_quantity, products_price, products_date_added, products_weight, products_status, products_tax_class_id', 'required'),
			array('products_model, products_image, products_last_modified, products_date_available, manufacturers_id, products_ordered', 'default', 'setOnEmpty' => true, 'value' => null),
			array('products_quantity, products_status, products_tax_class_id, manufacturers_id, products_ordered', 'numerical', 'integerOnly'=>true),
			array('products_model', 'length', 'max'=>12),
			array('products_image', 'length', 'max'=>64),
			array('products_price', 'length', 'max'=>15),
			array('products_weight', 'length', 'max'=>5),
			array('products_last_modified, products_date_available', 'safe'),
			array('products_id, products_quantity, products_model, products_image, products_price, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered', 'safe', 'on'=>'search'),
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
			'products_quantity' => Yii::t('app', 'Products Quantity'),
			'products_model' => Yii::t('app', 'Products Model'),
			'products_image' => Yii::t('app', 'Products Image'),
			'products_price' => Yii::t('app', 'Products Price'),
			'products_date_added' => Yii::t('app', 'Products Date Added'),
			'products_last_modified' => Yii::t('app', 'Products Last Modified'),
			'products_date_available' => Yii::t('app', 'Products Date Available'),
			'products_weight' => Yii::t('app', 'Products Weight'),
			'products_status' => Yii::t('app', 'Products Status'),
			'products_tax_class_id' => Yii::t('app', 'Products Tax Class'),
			'manufacturers_id' => Yii::t('app', 'Manufacturers'),
			'products_ordered' => Yii::t('app', 'Products Ordered'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('products_id', $this->products_id);
		$criteria->compare('products_quantity', $this->products_quantity);
		$criteria->compare('products_model', $this->products_model, true);
		$criteria->compare('products_image', $this->products_image, true);
		$criteria->compare('products_price', $this->products_price, true);
		$criteria->compare('products_date_added', $this->products_date_added, true);
		$criteria->compare('products_last_modified', $this->products_last_modified, true);
		$criteria->compare('products_date_available', $this->products_date_available, true);
		$criteria->compare('products_weight', $this->products_weight, true);
		$criteria->compare('products_status', $this->products_status);
		$criteria->compare('products_tax_class_id', $this->products_tax_class_id);
		$criteria->compare('manufacturers_id', $this->manufacturers_id);
		$criteria->compare('products_ordered', $this->products_ordered);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->products_id;		
		
			}
	
}
