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
}