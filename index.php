<?php 

if(isset($_GET['debug'])){
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
}

require_once __DIR__.'/includes.php';
$session = FAFactory::getSession();
$input	 = FAFactory::getInput();

$view   = isset($_REQUEST['view'])   ? $_REQUEST['view']   : '';
$task	= isset($_REQUEST['task'])   ? $_REQUEST['task']   : '';


try {
	$controller = FAFactory::getInstance($view, 'controller', array('input' => $input));
	echo $controller->execute($task);
}
catch(Exception $e){
	echo $e;
}
