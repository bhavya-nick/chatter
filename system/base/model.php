<?php
class FAModel
{
	protected $collection = null;
	protected $db		  = null;
	protected $_name	  = '';
	
	function __construct()
	{
		$this->db = FAFactory::getDB();
		if (empty($this->_name)){
			$this->_name = $this->getName();
			//TODO : generate error if still name not found
		}
		
		$this->collection = $this->db->selectCollection($this->_name);
	}
	
	public function getName()
	{
		$name = $this->_name;
		if (empty( $name ))
		{
			$r = null;
			if (!preg_match('/Model(.*)/i', get_class($this), $r)) {
				//error
			}
			$name = strtolower( $r[1] );
		}

		return $name;
	}
	
	public function find()
	{
		return $this->collection->find();
	}
	
	public function insert($data)
	{
		return $this->collection->insert($data);
	}
}