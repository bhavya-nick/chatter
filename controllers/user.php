<?php

class FAControllerUser extends FAController
{
	public function login()
	{
		//TODO:some token checking
		
		$chatter = $this->_input->post('chatter', array());
		$user 	 = $chatter['user'];

		// user data is empty
		if (empty($user))
		{
			$this->setRedirect('index.php?option=chatter&view=user&task=loginform');
			return false;
		}

		//verification passed
		//check user is blocked or not
		$isEmail  = FAHelperUtils::isEmailAddress($user['username']);
		$verified = FAHelperUser::verifyCredentials($user['username'], $user['password'], $isEmail); 
		if( $verified === true 
						&&  FAHelperUser::isBlock($user['username']) === false){
			
			$find = array('username'=>$user['username']);
			if ($isEmail){
				$find = array('email'=>$user['username']);
			}
			
			$model = $this->getModel();
			$user_record = $model->findOne($find);
			
			//set user-id in session
			$session = FASession::getInstance();
			
		
			$user_id = (string) new MongoId($user_record['_id']); 
			$session->set('user_id', $user_id);
					
			$this->setRedirect('index.php?option=chatter&view=user&task=dashboard');
			return false;
		}
		else
		{
			//TODO : Login failed !
			$this->setRedirect('index.php?option=chatter&view=user&task=loginform');
			return false;
		}
	}
	
	public function register()
	{
		//collect data
		$data  		= $this->_input->post('chatter');
		$user_date  = $data['user'];

		$model 		= $this->getModel();
		$model->register($user_data);
	}
	
	public function logout()
	{
		// TODO : will understand it later 
		session_destroy();
		//does session checking is required to make sure whether any user is logged-in or not???

		$this->setRedirect('index.php?option=chatter&view=user&task=loginform');
		return false;
	}
	
	public function loginform()
	{
		return true;
	}
}
