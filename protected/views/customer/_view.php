<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->customers_id), array('view', 'id'=>$data->customers_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_gender')); ?>:</b>
	<?php echo CHtml::encode($data->customers_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_firstname')); ?>:</b>
	<?php echo CHtml::encode($data->customers_firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_lastname')); ?>:</b>
	<?php echo CHtml::encode($data->customers_lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_dob')); ?>:</b>
	<?php echo CHtml::encode($data->customers_dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_email_address')); ?>:</b>
	<?php echo CHtml::encode($data->customers_email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_default_address_id')); ?>:</b>
	<?php echo CHtml::encode($data->customers_default_address_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->customers_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_fax')); ?>:</b>
	<?php echo CHtml::encode($data->customers_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_password')); ?>:</b>
	<?php echo CHtml::encode($data->customers_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_newsletter')); ?>:</b>
	<?php echo CHtml::encode($data->customers_newsletter); ?>
	<br />

	*/ ?>

</div>