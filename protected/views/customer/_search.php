<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'customers_id'); ?>
		<?php echo $form->textField($model,'customers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_gender'); ?>
		<?php echo $form->textField($model,'customers_gender',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_firstname'); ?>
		<?php echo $form->textField($model,'customers_firstname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_lastname'); ?>
		<?php echo $form->textField($model,'customers_lastname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_dob'); ?>
		<?php echo $form->textField($model,'customers_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_email_address'); ?>
		<?php echo $form->textField($model,'customers_email_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_default_address_id'); ?>
		<?php echo $form->textField($model,'customers_default_address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_telephone'); ?>
		<?php echo $form->textField($model,'customers_telephone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_fax'); ?>
		<?php echo $form->textField($model,'customers_fax',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customers_newsletter'); ?>
		<?php echo $form->textField($model,'customers_newsletter',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->