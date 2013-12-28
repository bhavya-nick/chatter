<?php 

class FAControllerCircle extends FAController
{
	public function display()
	{
		return true;
	}
	
	function save()
	{
		$data = $this->_input->post('chatter');
		$data = $data['circle'];
		$model = $this->getModel();
		
		return $model->save($data);
	}
}