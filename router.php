<?php 

class FARouter{
	public static $controller = 'defaultController';
	public static $task 	 = 'defaultTask';
	public static $query 	 = array();
	
	public static function parse()
	{
		static $parsed = false;
		
		// once done, do not parse again
		if($parsed === true){
			return true;
		}
		
		$parsed = true;

		$segments = FAUri::getSegments();
		
		$countOfParams = count($segments);
		if($countOfParams == 0){
			return true;
		}
		
		// first param will be controller		
		if($countOfParams > 0){
			self::$controller = array_shift($segments);
		}
		
		// second param will be task		
		if($countOfParams > 1){
			self::$task = array_shift($segments);
		}
		
		self::$query = $segments;
		
		return true;
	}
	
	public static function getControllerName(){
		return self::$controller;
	}
	
	public static function getTask(){
		return self::$task;
	}
	
	public static function getQuery(){
		return self::$query;
	}
}