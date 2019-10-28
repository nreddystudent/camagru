<?php
	//load config and helper functs
	require_once(ROOT . DS . 'config' . DS . 'config.php');
	require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

	//autoloader classes
	function __autoload($classname){
		if(file_exists(ROOT . DS . 'core' . DS . $classname . '.php')){
			require_once(ROOT . DS . 'core' . DS . $classname . '.php');
		}
		elseif(file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php')) { 
			require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $classname . '.php');
		}
		elseif(file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php')) { 
			require_once(ROOT . DS . 'app' . DS . 'models' . DS . $classname . '.php');
		}
	}

	//Route the request
	Router::route($url);
?>