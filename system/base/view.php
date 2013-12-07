<?php
class FAView
{
	protected $_model = null;
	protected $_tpl   = null;
	protected $_name  = null;
	protected $_default_tpl = 'default';
	
	public function execute($task)
	{
		if(empty($task) || method_exists($this, $task)==false ){
			$task='display';
		}
		
		$this->setTpl($task);
		
		$this->$task();
		
		$output = $this->loadTemplate($this->getTpl());

		return $output;
	}
	
	public function setTpl($tpl)
	{
		$this->_tpl = $tpl;
		return $this;
	}
	
	public function getTpl()
	{
		return $this->_tpl;
	}
	
	public function loadTemplate($tpl = null)
	{
		if ($tpl === null){
			$tpl = $this->_default_tpl;
		}
		
		$template = FA_PATH_TEMPLATES.'/'.$this->getName().'/'.$tpl.'.php';
		
		if (!file_exists($template)){
			throw new Exception("Template Not Found");
		}
		
		ob_start();
		include_once $template;
		$output = ob_get_contents();
		ob_end_clean();
		
		return $output;
	}
	
	function getName()
	{
		if (empty( $this->_name ))
		{
			$r = null;
			if (!preg_match('/View(.*)/i', get_class($this), $r)) {
				//error
			}
			
			$this->_name= strtolower( $r[1] );
		}

		return $this->_name;
	}
	
	public function display()
	{
		//set default display to render
	}
	
}