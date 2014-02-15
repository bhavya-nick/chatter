<?php
class FAModelUser extends FAModel
{
	public function register($data)
	{
		if (empty($data)){
			return false;
		}
		
		$columns = $this->getColumns();
		
		foreach ($columns as $column){
			$user[$column] = $data[$column];
		}
		
		$validation = $this->validate($user);
		
		if ($validation == false){
			return false;
		}
		
		unset($user['_id']);
		
		$user['password']		= FAHelperUser::convertPassword($user['password']);
		$user['activation'] 	= FAHelperUser::generateActivationToken($user['email'], $user['password']);
		$user['block'] 			= 1;
		$user['logged_in'] 		= 0;
		$user['register_date'] 	= date("Y-m-d H:i:s");
		
		$newUser = $this->insert($user);
		
		//TODO : move to parent insert function
		if (is_array($newUser)){
			if (isset($newUser['err']) && $newUser['err'] != null){
				return false;
			}
		}
		
		return true;
	}
	
	function getColumns()
	{
		return array('_id', 'username', 'email', 'name', 'password', 'usertype', 'register_date',
					 'last_visit_date', 'activation', 'logged_in', 'block', 'params', 'avatar');
	}
	
	public function validate($data)
	{
		$find = array('email'=>$data['email']);
		$existing = $this->findOne($find);
		
		if (!empty($existing)){
			return false;
		}
		
		//TODO : check other validations too
		return true;
	}
	
}
