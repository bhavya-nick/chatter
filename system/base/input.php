<?php
class FAInput
{
	public $data = array();
	
	public static function getInstance()
	{
		static $instance = null;
		
		if ($instance == null){			
			$instance	= new FAInput();
		}
		
		return $instance;
	}	
	
	private function __construct()
	{
		$this->data['get'] 		= $_GET;
		$this->data['post'] 		= $_POST;
		$this->data['request']	= $_REQUEST;
		$this->data['cookie']		= $_COOKIE;
	}

	protected function _get($group, $key, $default)
	{
		//TODO : apply cleaning of data
		
		// if key empty then return all $group data
		if(empty($key)){
			return $this->data[$group];
		}
		
		// if key exists then return its value
		if(isset($this->data[$group][$key])){
			return $this->data[$group][$key];
		}
		
		// else return default value
		return $default;
			
	}
	
	public function get($key = '', $default = false)
	{
		return $this->_get('get', $key, $default);
	}
	
	public function post($key = '', $default = false)
	{
		return $this->_get('post', $key, $default);
	}
	
	public function request($key = '', $default = false)
	{
		return $this->_get('request', $key, $default);
	}
	
	public function cookie($key = '', $default = false)
	{
		return $this->_get('cookie', $key, $default);
	}
}