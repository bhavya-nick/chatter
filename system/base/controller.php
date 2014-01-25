<?php
class FAController
{
	protected $_name;
	
	/**
	 * @var FAInput
	 */
	protected $_input;
	protected $redirect;
	protected $message;
	
	public function __construct($config = array())
	{
		if(isset($config['input'])){
			$this->_input = $config['input'];
		}
	}
	
	function getModel()
	{
		if (empty($this->_name)){
			$this->_name = $this->getName();
		}
		return FAFactory::getInstance($this->_name, 'model');
	}
	
	function execute($task)
	{
		//check existance of task and then execute that else execute default task
		if (method_exists($this, $task)){
			$executeResult = $this->$task();
		}
		else{
			//raise error or throw exception
			throw new Exception("Exception Generated. Task not executed.");
		}
		
		if ($executeResult === false){
			$this->redirect();
			return ;
		}
		
		$view = $this->getView();
		$output = $view->execute($task);
		//check template
		
		return $output;
	}
	
	function getView()
	{
		if (empty($this->_name)){
			$this->getName();
		}

		return FAFactory::getInstance($this->_name, 'view');
	}
	
	public function getName()
	{
		if (empty( $this->_name ))
		{
			$r = null;
			if (!preg_match('/Controller(.*)/i', get_class($this), $r)) {
				//error
			}
			
			$this->_name= strtolower( $r[1] );
		}

		return $this->_name;
	}
	
	public function redirect()
	{
		header('Location: ' . $this->redirect);
	}
	
	public function setRedirect($url, $message = '')
	{
		$this->redirect = $url;
		$this->message  = $message;
		return $this;
	}
	
}