<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->products_id), array('view', 'id'=>$data->products_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->products_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_model')); ?>:</b>
	<?php echo CHtml::encode($data->products_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_image')); ?>:</b>
	<?php echo CHtml::encode($data->products_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_price')); ?>:</b>
	<?php echo CHtml::encode($data->products_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_date_added')); ?>:</b>
	<?php echo CHtml::encode($data->products_date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_last_modified')); ?>:</b>
	<?php echo CHtml::encode($data->products_last_modified); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('products_date_available')); ?>:</b>
	<?php echo CHtml::encode($data->products_date_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_weight')); ?>:</b>
	<?php echo CHtml::encode($data->products_weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_status')); ?>:</b>
	<?php echo CHtml::encode($data->products_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_tax_class_id')); ?>:</b>
	<?php echo CHtml::encode($data->products_tax_class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacturers_id')); ?>:</b>
	<?php echo CHtml::encode($data->manufacturers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_ordered')); ?>:</b>
	<?php echo CHtml::encode($data->products_ordered); ?>
	<br />

	*/ ?>

</div>