<?php

class FAControllerUser extends FAController
{
	public function login()
	{	
	}
	
	public function register()
	{
		//collect data
		$user_data  = $this->_input->post();
		$model 		= $this->getModel();
		$model->register($user_data);
	}
}
