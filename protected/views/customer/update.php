<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customers_id=>array('view','id'=>$model->customers_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'View Customer', 'url'=>array('view', 'id'=>$model->customers_id)),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>Update Customer <?php echo $model->customers_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>