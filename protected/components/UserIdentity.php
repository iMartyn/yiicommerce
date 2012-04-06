<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    private $_passwordtype;
    private $_strongesthash;
    
    /**
     * Only sets a default strongest pass hash, see CUserIdentity::__construct();
     * @param type $username
     * @param type $password
     */
    function __construct($username, $password) {
        parent::__construct($username, $password);
        $this->_strongesthash = 'NEWOSC-BLOWFISH';
    }
    
    /**
     * Sets a new strongest hash type - I'm happy with phpass but some may want
     * to provide a better hash method and the module should only reset if it's 
     * not that.  Remember that you'll need to override the 
     * Customer::setPasswordHash() and Administrator::setPasswordHash() methods
     * @param string $newhashtype
     */
    public function setHighestPasswordHash(string $newhashtype) {
        $this->_strongesthash = $newhashtype;
    }

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $_passwordtype = NULL;
        $adminrecord = Administrator::model()->findByAttributes(array('user_name' => $this->username));
        $custrecord = Customer::model()->findByAttributes(array('customers_email_address' => $this->username));
        if ($adminrecord === null && $custrecord === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else {
            if ($custrecord === null) {
                $record = $adminrecord;
                $passwordfield = 'user_password';
                $idfield = 'id';
                $namefield = 'user_name';
            } else {
                $record = $custrecord;
                $passwordfield = 'customers_password';
                $idfield = 'customers_id';
                $namefield = 'customers_firstname';
            }
            if (!$this->testpassword($this->password, $record->$passwordfield)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                yii::log('Authenticated successfully with method '.$this->_passwordtype, 'trace', 'system.UserIdentity');
                if ($this->_passwordtype != $this->_strongesthash) {
                    yii::log('Method '.$this->_passwordtype.' outdated, updating', 'trace', 'system.UserIdentity');
                    $record->setPasswordHash($this->password);
                    $record->update();
                }
                $this->_id = $record->$idfield;
                $this->setState('title', $record->$namefield);
                $this->errorCode = self::ERROR_NONE;
            }
        }       
        return !$this->errorCode;
    }
    
    /**
     * This function tests the plainpassword against a hashed password that 
     * could be in any number of hashes.  Override if necessary :-)
     * @param type $plainpassword
     * @param type $hashedpassword
     * @return boolean
     */
    protected function testpassword($plainpassword,$hashedpassword) {
        if (Yii::app()->hasher->checkPassword($plainpassword, $hashedpassword)) {
            if (strpos($hashedpassword,'$2a$') === 0) {
                $this->_passwordtype = 'NEWOSC-BLOWFISH';
            } elseif ($hashedpassword[0] === '_') {
                $this->_passwordtype = 'NEWOSC-EXTDES';
            } elseif (strpos($hashedpassword,'$P$') === 0) {
                $this->_passwordtype = 'NEWOSC-PORTABLE';
            } else {
                $this->_passwordtype = 'UNKNOWN';
            }
            return true;
        }
        if (strpos($hashedpassword,':') !== false) {
            list($hash,$salt) = explode(':',$hashedpassword);
            if (md5($salt.$plainpassword) == $hash) {
                $this->_passwordtype = 'OLDOSC';
                return true;
            }
            if (sha1($salt.$plainpassword) == $hash) {
                $this->_passwordtype = 'OLDOSC-SHA1';
                return true;
            }
            if (hash('sha256',$salt.$plainpassword) == $hash) {
                $this->_passwordtype = 'OLDOSC-SHA256';
                return true;
            }
        }
        if (sha1($plainpassword) == $hashedpassword) {
            $this->_passwordtype = 'SHA1';
            return true;
        }
        if (md5($plainpassword) == $hashedpassword) {
            $this->_passwordtype = 'MD5';
            return true;
        }
        return false;
    }
 
    public function getId()
    {
        return $this->_id;
    }
 
    public function getPasswordType()
    {
        return $this->_passwordtype;
    }
}