<?php 

class FALoader
{
	static $classes = array();
	
	public static function setup()
	{
		spl_autoload_register(array('FALoader', 'load'));
	}
	
	public static function load($class)
	{
		// TODO : check whether class exists or not
		require_once self::$classes[strtolower($class)];
	}
	
	public static function register($class, $path)
	{
		self::$classes[strtolower($class)] = $path;
	}
	
	public static function autoloadfolder($path, $prefix='FA')
	{
		//TODO : check is_dir
		$files = scandir($path);
		
		foreach ($files as $file){
			if(strpos($file, '.php') > 0){
				$filename = substr($file, 0, strlen($file)-4) ;
				self::register($prefix.$filename, $path.'/'.$file);
			}
		}
		
	}
}

