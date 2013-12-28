<?php
class FAModelCircle extends FAModel
{
	public function save($data)
	{
		$data = $this->filterData($data);

		if(empty($data['_id'])){
			unset($data['_id']);
		}
		else{
			$data['_id'] = new MongoId($data['_id']);
		}
		
		return parent::save($data);
	}
	
	public function filterData($data)
	{
		$columns = $this->getColumns();
		
		$ret = array();
		foreach ($columns as $name => $dafault){
			if(isset($data[$name])){
				$ret[$name] = $data[$name];
			}			
			else{
				$ret[$name] = $default;
			}
		}
		
		return $ret;
	}
	
	public function getColumns()
	{
		return array('_id' => '', 'title' => '', 'owner' => 0, 'creation_time' => '0000-00-00 00:00:00', 'access_level'=> '', 'params' => array());
	}
}
