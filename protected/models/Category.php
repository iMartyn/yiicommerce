<?php

// auto-loading fix
Yii::setPathOfAlias('Category', dirname(__FILE__));
Yii::import('Category.*');

class Category extends BaseCategory
{
	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function __toString() {
		return (string) $this->categories_image;

	}

	public function behaviors() 
	{
		return array_merge(parent::behaviors(),array(
));
	}




	public function rules() 
	{
		return array_merge(
				/*array('column1, column2', 'rule'),*/
				parent::rules()
				);
	}
	
	/*
	// customize this function ...
	public function get_label()
	{
		return '#'.$this->id;		
	}
	*/

}
