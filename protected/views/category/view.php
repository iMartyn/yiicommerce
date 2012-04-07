<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->categories_id,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->categories_id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->categories_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->categories_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'categories_id',
		'categories_image',
		'parent_id',
		'sort_order',
		'date_added',
		'last_modified',
                'description',
                'productCount',
	),
)); ?>

<?php if ((int)$model->productCount > 0) : ?>

<h2>Products that are in this category :- </h2>
    <?php
    
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => new CArrayDataProvider($model->products),
	'columns' => array(
		array(
			'name' => 'products_id',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->products_id), \'../product/\'.$data->products_id);',
		),
		array(
			'name' => 'products_name',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->products_name)',
		),
		array(
			'name' => 'products_description',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->products_description)',
		),
	),
));
?>

    <?php endif ?>