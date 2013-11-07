<?php 

class FALoader{
	public static function setup(){
		spl_autoload_register(array('FALoader', 'load'));
	}
	
	public static function load($class){
		
	}
}

