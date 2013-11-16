<?php
class FAController
{
	protected $name;
	
	function getModel()
	{
		return FAFactory::getInstance($this->name, 'model');
	}
	
}