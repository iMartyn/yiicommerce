<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->products_id,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->products_id)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->products_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->products_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'products_id',
		'products_quantity',
		'products_model',
		'products_image',
		'products_price',
		'products_date_added',
		'products_last_modified',
		'products_date_available',
		'products_weight',
		'products_status',
		'products_tax_class_id',
		'manufacturers_id',
		'products_ordered',
	),
)); ?>
