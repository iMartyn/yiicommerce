<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_gender'); ?>
		<?php echo $form->textField($model,'customers_gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'customers_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_firstname'); ?>
		<?php echo $form->textField($model,'customers_firstname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customers_firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_lastname'); ?>
		<?php echo $form->textField($model,'customers_lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customers_lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_dob'); ?>
		<?php echo $form->textField($model,'customers_dob'); ?>
		<?php echo $form->error($model,'customers_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_email_address'); ?>
		<?php echo $form->textField($model,'customers_email_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customers_email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_default_address_id'); ?>
		<?php echo $form->textField($model,'customers_default_address_id'); ?>
		<?php echo $form->error($model,'customers_default_address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_telephone'); ?>
		<?php echo $form->textField($model,'customers_telephone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customers_telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_fax'); ?>
		<?php echo $form->textField($model,'customers_fax',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customers_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_password'); ?>
		<?php echo $form->textField($model,'customers_password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'customers_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customers_newsletter'); ?>
		<?php echo $form->textField($model,'customers_newsletter',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'customers_newsletter'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->