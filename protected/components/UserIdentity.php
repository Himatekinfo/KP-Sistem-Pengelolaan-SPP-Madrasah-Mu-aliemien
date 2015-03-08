<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
               	$users=User::model()->find("UserName='$this->username' AND "
                                            ."Password='$this->password'"
                                             );
                if (is_null ($users))
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                else {
                    $this->errorCode=self::ERROR_NONE;
                    $this->setState("Name",$this->username);
                    $this->setState("Id",$users->Id);
                    $this->setState("SekolahId",$users->SekolahId);
                    $this->setState("AsAdmin",$users->AsAdmin);
                }
                
		return !$this->errorCode;
	}}