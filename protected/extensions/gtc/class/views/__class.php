﻿<div class ="row">
<?php echo $form->labelEx($model, 'className'); ?>
    <?php echo $form->textField($model, 'className', array('size' => 65));?>
    <div class="tooltip">
        The class name must only contain word characters.
    </div>
    <?php echo $form->error($model, 'className');?>
</div>

<div class="row sticky">
<?php echo $form->labelEx($model, 'baseClass');?>
<?php echo $form->textField($model, 'baseClass', array('size' => 65));?>
<div class="tooltip">
This is the class that the new class will extend from.
Please make sure the class exists and can be autoloaded.
</div>
<?php echo $form->error($model, 'baseClass');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'interfaceName');?>
    <?php echo $form->textField($model, 'interfaceName', array('size' => 65));?>
    <?php echo $form->error($model, 'interfaceName');?>
<div class="tooltip">
Name of a object interface
</div>
</div>
<div class="row">
    <?php echo $form->checkBox($model, 'isAbstract', array('style' => 'margin-right:10px;float:left;'));?>
    <?php echo $form->labelEx($model, 'isAbstract');?>
</div>

<div class="row sticky">
<?php echo $form->labelEx($model, 'scriptPath');?>
<?php echo $form->textField($model, 'scriptPath', array('size' => 65));?>
<div class="tooltip">
This refers to the directory that the new view script file should be generated under.
It should be specified in the form of a path alias, for example, <code>application.web</code>,
<code>mymodule.views</code>.
</div>
<?php echo $form->error($model, 'scriptPath');?>
</div>