<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    private $_passwordtype;

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
        $record = Customer::model()->findByAttributes(array('customers_email_address' => $this->username));
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$this->testpassword($this->password, $record->customers_password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            yii::log('Authenticated successfully with method '.$this->getPasswordType(), 'trace', 'system.UserIdentity');
            $this->_id = $record->customers_id;
            $this->setState('title', $record->customers_firstname.' '.$record->customers_lastname);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    protected function testpassword($plainpassword,$hashedpassword) {
        /*
         * This function tests the plainpassword against a hashed password that 
         * could be in any number of hashes.
         */
        yii::log("testpassword($plainpassword,$hashedpassword) called", 'trace', 'system.UserIdentity');
        if (md5($plainpassword) == $hashedpassword) {
            $this->_passwordtype = 'MD5';
            return true;
        }
        if (sha1($plainpassword) == $hashedpassword) {
            $this->_passwordtype = 'SHA1';
            return true;
        }
        if (strpos($hashedpassword,':') !== false) {
            list($hash,$salt) = explode(':',$hashedpassword);
            Yii::log('plain is '.$plainpassword.'     hash is '.$hash.'     salt is '.$salt, 'trace','system.UserIdentity');
            if (md5($salt.$plainpassword) == $hash) {
                $this->_passwordtype = 'OLDOSC';
                return true;
            }
        }
        if (Yii::app()->hasher->checkPassword($plainpassword, $hashedpassword)) {
            $this->_passwordtype = 'NEWOSC';
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
        return $this->_id;
    }
}