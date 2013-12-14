<?php 

class FASession 
{
	protected $model;
	protected $maxTime;

	private function __construct() 
	{
		$this->maxTime = get_cfg_var("session.gc_maxlifetime");
		$this->model = FAFactory::getInstance('session', 'model');
		
		session_set_save_handler(
			array($this, 'open'),
			array($this, 'close'),
			array($this, 'read'),
			array($this, 'write'),
			array($this, 'destroy'),
			array($this, 'gc')
		);
		session_start();
	}

	public static function getInstance()
	{
		static $instance = null;
		
		if ($instance == null){			
			$instance	= new FASession();
		}
		
		return $instance;
	}
	
	public function open() 
	{ 
		return true; 
	}
	
	public function close() 
	{ 
		return true; 
	}
	
	public function read($id) 
	{
		$doc = $this->model->findOne(array("_id" => $id), array("sessionData" => 1));
		return $doc['sessionData'];
	}
	
	public function write($id,$data) 
	{
		$this->model->save(Array("_id" => $id, "sessionData" => $data, "timeStamp" => time()));
		return true;
	}
	
	public function destroy($id) 
	{
		$this->model->remove(array("_id" => $id));
		return true;
	}
	
	public function gc() 
	{
		$agedTime = time() - $this->maxTime;
		$this->model->remove(array("timeStamp" => array('$lt' => $agedTime)));
	}
	
	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
		return true;
	}
	
	public function get($name, $default = false)
	{
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		
		return $default;		
	}
}