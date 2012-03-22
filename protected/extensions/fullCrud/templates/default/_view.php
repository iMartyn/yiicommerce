<div class="view">

<?php
echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->identificationColumn}')); ?>:</b>\n";
echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->identificationColumn}), array('view', '{$this->identificationColumn}'=>\$data->{$this->identificationColumn})); ?>\n\t<br />\n\n";
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
	if(++$count==7)
		echo "\t<?php /*\n";
	echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
		if($column->name == 'createtime'
				or $column->name == 'updatetime'
				or $column->name == 'timestamp') {
	echo "\techo Yii::app()->getDateFormatter()->formatDateTime(\$data->{$column->name}, 'medium', 'medium'); ?>\n\t<br />\n\n";
} else {
	echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
}
}
if($count>=7)
	echo "\t*/ ?>\n";
?>

</div>
