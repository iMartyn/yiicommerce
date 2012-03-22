<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'products_quantity'); ?>
		<?php echo $form->textField($model,'products_quantity'); ?>
		<?php echo $form->error($model,'products_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_model'); ?>
		<?php echo $form->textField($model,'products_model',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'products_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_image'); ?>
		<?php echo $form->textField($model,'products_image',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'products_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_price'); ?>
		<?php echo $form->textField($model,'products_price',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'products_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_date_added'); ?>
		<?php echo $form->textField($model,'products_date_added'); ?>
		<?php echo $form->error($model,'products_date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_last_modified'); ?>
		<?php echo $form->textField($model,'products_last_modified'); ?>
		<?php echo $form->error($model,'products_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_date_available'); ?>
		<?php echo $form->textField($model,'products_date_available'); ?>
		<?php echo $form->error($model,'products_date_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_weight'); ?>
		<?php echo $form->textField($model,'products_weight',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'products_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_status'); ?>
		<?php echo $form->textField($model,'products_status'); ?>
		<?php echo $form->error($model,'products_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_tax_class_id'); ?>
		<?php echo $form->textField($model,'products_tax_class_id'); ?>
		<?php echo $form->error($model,'products_tax_class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacturers_id'); ?>
		<?php echo $form->textField($model,'manufacturers_id'); ?>
		<?php echo $form->error($model,'manufacturers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_ordered'); ?>
		<?php echo $form->textField($model,'products_ordered'); ?>
		<?php echo $form->error($model,'products_ordered'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->