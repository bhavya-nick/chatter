<?php 

class FAFactory
{		
	public static function getInstance($name, $type, $config = array(), $prefix='FA')
	{		
		static $instances = array();
		  
		$class_name = strtolower($prefix.$type.$name);
		
		if (isset($instances[$class_name])){
			return $instances[$class_name];
		}
		
		if (!class_exists($class_name, true)){
			throw new Exception(array('Class does not exists'));
		}
	
		$instances[$class_name] = new $class_name($config); 
		return $instances[$class_name];
	}
	
	public static function getDB()
	{
		static $instance = null;
		
		if ($instance == null){
			$client 	= new MongoClient();
			$instance	= $client->selectDB('chatter');
		}
		
		return $instance;
	}
	
	/**
	 * @return FASession
	 */
	public static function getSession()
	{
		static $instance = null;
		
		if ($instance == null){			
			$instance	= FASession::getInstance();
		}
		
		return $instance;
	}
	
	/**
	 * @return FAInput
	 */
	public static function getInput()
	{
		static $instance = null;
		
		if ($instance == null){			
			$instance	= FAInput::getInstance();
		}
		
		return $instance;
	}
}