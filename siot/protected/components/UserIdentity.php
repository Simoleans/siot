<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $empresa;
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Usuarios::model()->find('LOWER(usuario)=?',array($username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id_usuario;
			//$this->username=$user->usuario;
			$this->setState('roles', $user->perfil_id);
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	public function getId()
	{
		return $this->_id;
		
	}

}