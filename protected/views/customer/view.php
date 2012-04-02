<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customers_id,
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->customers_id)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->customers_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>View Customer #<?php echo $model->customers_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'customers_id',
		'customers_gender',
		'customers_firstname',
		'customers_lastname',
		'customers_dob',
		'customers_email_address',
		'customers_default_address_id',
		'customers_telephone',
		'customers_fax',
		'customers_newsletter',
	),
)); ?>
