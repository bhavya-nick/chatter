<?php 

class FAFactory
{		
	private static function getInstance($name, $type, $prefix='FA')
	{		
		static $instances = array();
		  
		$class_name = strtolower($prefix.$type.$name);
		
		if (isset($instances[$class_name])){
			return $instances[$class_name];
		}
		
		if (!class_exists($class_name, true)){
			throw new Exception(array('Class does not exists'));
		}
	
		$instances[$class_name] = new $class_name(); 
		return $instances[$class_name];
	}
}