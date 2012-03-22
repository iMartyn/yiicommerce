<?php
/**
 * This is the template for generating the model class of a specified table.
 * In addition to the default model Code, this adds the CSaveRelationsBehavior
 * to the model class definition.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
?>
<?php echo "<?php\n"; ?>

/**
 * This is the model base class for the table "<?php echo $tableName; ?>".
 *
 * Columns in table "<?php echo $tableName; ?>" available as properties of the model:
<?php foreach($columns as $column): ?>
 * @property <?php echo $column->type.' $'.$column->name."\n"; ?>
<?php endforeach; ?>
 *
<?php if(count($relations)>0): ?>
 * Relations of table "<?php echo $tableName; ?>" available as properties of the model:
<?php else: ?>
 * There are no model relations.
<?php endif; ?>
<?php foreach($relations as $name=>$relation): ?>
 * @property <?php
	if (preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
    {
        $relationType = $matches[1];
        $relationModel = $matches[2];

        switch($relationType){
            case 'HAS_ONE':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'BELONGS_TO':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'HAS_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            case 'MANY_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            default:
                echo 'mixed $'.$name."\n";
        }
	}
    ?>
<?php endforeach; ?>
 */
abstract class <?php echo 'Base' . $modelClass; ?> extends <?php echo $this->baseClass; ?>
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '<?php echo $tableName; ?>';
	}

	public function rules()
	{
		return array(
<?php
		foreach($rules as $rule) {
			echo "\t\t\t$rule,\n";
		}
?>
			array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
<?php
		foreach($relations as $name=>$relation) {
			echo "\t\t\t'$name' => $relation,\n";
		}
?>
		);
	}

	public function attributeLabels()
	{
		return array(
<?php
		foreach($labels as $name=>$label) {
			echo "\t\t\t'$name' => Yii::t('app', '$label'),\n";
		}
?>
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

<?php
		foreach($columns as $name=>$column)
		{
			if($column->type==='string' and !$column->isForeignKey)
			{
				echo "\t\t\$criteria->compare('$name', \$this->$name, true);\n";
			}
			else
			{
				echo "\t\t\$criteria->compare('$name', \$this->$name);\n";
			}
		}
		echo "\n";
?>
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		<?php 
		// TODO: found no better solution for the PK
		foreach($columns as $name=>$column) {
			if ($column->isPrimaryKey) {
				echo "return '#'.\$this->{$column->name};";
			}
		}			
		?>
		
		
		<?php
		 // I would suggest to overwrite this method in the model class

		 /*	foreach($columns AS $col){
					//if no name attribute is found, use the first string value in the table
					if($col->type == 'string') {
						echo 'return $this->'.$col->name.';';
						break;
					}
				} */
			?>
	}
	
}
