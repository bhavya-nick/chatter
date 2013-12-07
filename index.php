<?php 

require_once __DIR__.'/includes.php';
$session = FAFactory::getSession();


$option = isset($_REQUEST['option']) ? $_REQUEST['option'] : '';
$view   = isset($_REQUEST['view'])   ? $_REQUEST['view']   : '';
$task	= isset($_REQUEST['task'])   ? $_REQUEST['task']   : '';


try {
	$controller = FAFactory::getInstance($view, 'controller');
	echo $controller->execute($task);
}
catch(Exception $e){
	echo $e;
}
