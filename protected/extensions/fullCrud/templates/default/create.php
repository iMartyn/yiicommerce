<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs['$label'] = array('index');\n";
echo "\$this->breadcrumbs[] = Yii::t('app', 'Create');\n";
?>

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	/*array('label'=>Yii::t('app', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin')),*/
);
?>

<?php printf('<h1> %s %s </h1>', Yii::t('app', 'Create'), $this->modelClass); ?>

<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

