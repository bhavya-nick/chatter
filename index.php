<?php 

if(isset($_GET['debug'])){
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
}

require_once __DIR__.'/includes.php';
$session = FAFactory::getSession();
$input	 = FAFactory::getInput();

$view = $input->get('view', '');
$task = $input->get('task', '');


try {
	$controller = FAFactory::getInstance($view, 'controller', array('input' => $input));
	$content = $controller->execute($task);
}
catch(Exception $e){
	echo $e;
	exit();
}

include_once FA_PATH_TEMPLATES.'/index.php';
