<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs['$label'] = array('index');\n";
echo "\$this->breadcrumbs[] = Yii::t('app', 'Admin');\n";
?>

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php
echo "<?php echo Yii::t('app', 'Manage'); ?> ";
echo "<?php echo Yii::t('app', '" . $this->pluralize($this->class2name($this->modelClass)) . "'); ?> ";
?></h1>


<?php
// render relation links
$model = new $this->modelClass;
echo "<ul>";
foreach ($model->relations() AS $key => $relation) {
	echo "<li>" .
	Yii::t("app", substr(str_replace("Relation", "", $relation[0]), 1)) . " " .
	CHtml::link(Yii::t("app", $relation[1]), array($this->codeProvider->resolveController($relation) . '/admin')) . // TODO: render dynamic links
	" </li>";
}
echo "</ul>";
?>


<?php echo "<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>"; ?>
<div class="search-form" style="display:none">
	<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div>

<?php echo "<?php " ?>

$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(

<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7)
		echo "\t\t/*\n";

	if (strtoupper($column->dbType) == 'TEXT')
		echo "#";
	echo "\t\t" . $this->codeProvider->generateValueField($this->modelClass, $column) . ",\n";
}

if ($count >= 7)
	echo "\t\t*/\n";
?>

array(
'class'=>'CButtonColumn',
'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('<?php echo $this->tableSchema->primaryKey; ?>' => \$data-><?php echo $this->tableSchema->primaryKey; ?>))",
'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('<?php echo $this->tableSchema->primaryKey; ?>' => \$data-><?php echo $this->tableSchema->primaryKey; ?>))",
'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('<?php echo $this->tableSchema->primaryKey; ?>' => \$data-><?php echo $this->tableSchema->primaryKey; ?>))",
),
),
)); 

<?php echo " ?>" ?>
