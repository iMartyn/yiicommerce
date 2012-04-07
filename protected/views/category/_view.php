<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->categories_id), array('view', 'id'=>$data->categories_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_image')); ?>:</b>
	<?php echo CHtml::encode($data->categories_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_modified')); ?>:</b>
	<?php echo CHtml::encode($data->last_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productCount')); ?>:</b>
	<?php echo CHtml::encode($data->productCount);
            echo ((int)$data->productCount > 0) ? CHtml::link(CHtml::encode('...'), array('view', 'id'=>$data->categories_id)):""; ?>
	<br />


</div>