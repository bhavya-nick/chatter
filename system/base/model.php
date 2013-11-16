<?php
class FAModel
{
	public function getName()
	{
		return $this->_name;
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
	
	public function select()
	{
		$name = $this->getName();
		db.$name.find();
	}
	
	public function insert()
	{
		
		$name = $this->getName();
		db.$name.insert();
	}
}