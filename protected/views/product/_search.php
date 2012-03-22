<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'products_id'); ?>
		<?php echo $form->textField($model,'products_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_quantity'); ?>
		<?php echo $form->textField($model,'products_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_model'); ?>
		<?php echo $form->textField($model,'products_model',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_image'); ?>
		<?php echo $form->textField($model,'products_image',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_price'); ?>
		<?php echo $form->textField($model,'products_price',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_date_added'); ?>
		<?php echo $form->textField($model,'products_date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_last_modified'); ?>
		<?php echo $form->textField($model,'products_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_date_available'); ?>
		<?php echo $form->textField($model,'products_date_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_weight'); ?>
		<?php echo $form->textField($model,'products_weight',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_status'); ?>
		<?php echo $form->textField($model,'products_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_tax_class_id'); ?>
		<?php echo $form->textField($model,'products_tax_class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manufacturers_id'); ?>
		<?php echo $form->textField($model,'manufacturers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_ordered'); ?>
		<?php echo $form->textField($model,'products_ordered'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->