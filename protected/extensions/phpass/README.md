Introduction
---------
Yii-Phpass is a simple wrapper for [Phpass 0.3](http://www.openwall.com/phpass/)
in the [Yii Framework](http://www.yiiframework.com/)

###Requirements

* Yii 1.0 or above
* PHP 5.3 or PHP with Suhosin Patch *strongly* recommended

###Installation

* Extract the release file under `protected/extensions/phpass`
* Add a line to your configuration file to import the extension:
```
'import'=>array(
    ...
    'application.extensions.phpass.*',
),
```
* Add to your main.php file within your Yii project, inside the component array:
```
'components'=>array(
    'hasher'=>array (
        'class'=>'Phpass',
        'hashPortable'=>false,
        'hashCostLog2'=>8,
    ),
),
```

###Usage

Access the Phpass object:
```
Yii::app()->hasher
```

For a New Password:
```
$theirHashToStore = Yii::app()->hasher->hashPassword($theirPassword);
```

Authenticate an Existing Password:
```
$isValid = Yii::app()->hasher->checkPassword($theirPassword, $theirStoredHash);
```

License
---------
Modified BSD License
[https://github.com/gtcode/Yii-Phpass](https://github.com/gtcode/Yii-Phpass)
