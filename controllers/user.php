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
			//TODO :redirect to login page
		}

		//verification passed
		//check user is blocked or not
		$verified = FAHelperUser::verifyCredentials($user['username'], $user['password'], FAHelperUtils::isEmailAddress($user['username'])); 
		if( $verified === true 
						&&  FAHelperUser::isBlock($user['username']) === false){

			
			//TODO:redirection
			
		}
		else
		{
			//TODO : Login failed !
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
}
