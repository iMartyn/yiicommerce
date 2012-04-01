<?php
/**
 * Phpass.php
 *
 * PHP version 5.3+
 *
 * @author    Paul Lowndes <igo@gtcode.com>
 * @author    GTCode
 * @link      http://www.GTCode.com/
 * @package   PHPass
 * @version   0.11
 * @category  ext
 */

/**
 * PHPass is a Yii wrapper around PHPass 0.3
 *
 * Add a line to your main.php 'import': 'application.extensions.phpass.*',
 *
 * Then, add to your components for convenience:
 * 'hasher'=>array (
 *     'class'=>'Phpass',
 *     'hashPortable'=>false,
 *     'hashCostLog2'=>10,
 * ),
 *
 * Then, you can access the Phpass object:
 *
 * Yii::app()->hasher
 * 
 * For a New User:
 * $theirHashToStore = Yii::app()->hasher->hashPassword($theirPassword);
 *
 * Authenticate an Existing User:
 * $isValid = Yii::app()->hasher->checkPassword($theirPassword, $theirStoredHash);
 *
 */

require_once 'phpass-0.3/PasswordHash.php';

class Phpass extends CApplicationComponent
{
    public $hashPortable = false; //This requires PHP 5.3 or Suhosion
    public $hashCostLog2 = 10;

    private $hasher = null;
    private $hash = '';
    
    public function init() {
        $this->initHasher();
        return parent::init();
    }
    
    private function initHasher(){
        $this->hasher = new PasswordHash($this->hashCostLog2, $this->hashPortable);
    }
    
    public function hashPassword($password) {
        $this->hash = $this->hasher->hashPassword($password);
        if (strlen($this->hash)<20) {
            throw new CHttpException(500,'Problem hashing password, please contact support.');
        }
        $this->initHasher();
        return $this->hash;
    }
    
    public function checkPassword($password, $hash) {
        $valid = $this->hasher->CheckPassword($password, $hash);
        $this->initHasher();
        return $valid;
    }
}
