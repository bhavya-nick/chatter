<?php
class FAHelperUser
{
	public static function generateActivationToken($email, $password)
	{
		if (empty($username) || empty($password)){
			return false;
		}
		
		return md5($email.$password);
	}
	
	public static function verifyCredentials($username, $password, $isEmail = false)
	{
		if (empty($username) || empty($password)){
			return false;
		}
		
		$data = array('username'=>$username);
		if ($isEmail == true){
			unset($data['username']);
			$data['email'] = $username;
		}
		$model   = FAFactory::getInstance('user', 'model');
		$record  = $model->findOne($data);
		
		//user with provided username/email does not exists
		if (empty($record)){
			return false;
		}
		
		$stored_password	= explode(':', $record['password']);
		$crypted_password	= $stored_password[0];
		$salt				= $stored_password[1];
		$calculated_password= md5($password.$salt);

		if ($crypted_password == $calculated_password){
			return true;
		}
		
		return false;
	}
	
	public static function isBlock($username)
	{
		if (empty($username)){
			return false;
		}
		
		$data = array('username'=>$username);
		if (FAHelperUtils::isEmailAddress($username)){
			$data['email'] = $username;
			unset($data['username']);
		}
		
		$model   = FAFactory::getInstance('user', 'model');
		$record  = $model->findOne($data);
		
		//	user with provided username/email does not exists
		if (empty($record)){
			return false;
		}
		
		if ($record['block']){
			return true;//implies user is blocked
		}
		
		return false;
	}
	
	public static function convertPassword($password)
	{
		$salt = FAHelperUtils::randomToken(10);
		return md5($password.$salt).':'.$salt;
	}
}