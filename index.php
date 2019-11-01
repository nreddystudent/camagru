<?php
	define ('ROOT', dirname(__FILE__));

		//load config and helper functs
		require_once(ROOT . "/config/config.php");
		require_once(ROOT . "/app/lib/helpers/functions.php");
	
		//autoloader classes
		function autoload($classname){
			if(file_exists(ROOT . "/core/$classname.php")){
				require_once(ROOT . "/core/$classname.php");
			}
			elseif(file_exists(ROOT . "/app/controllers/$classname.php")) { 
				require_once(ROOT . "/app/controllers/$classname.php");
			}
			elseif(file_exists(ROOT . "/app/models/$classname.php")) { 
				require_once(ROOT . "/app/models/$classname.php");
			}
		}
	spl_autoload_register('autoload');
	session_start(); 
	$url = isset($_SERVER['PATH_INFO']) ? explode('/',ltrim($_SERVER['PATH_INFO'], '/')) : [];
	if (!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
		Users::loginUserFromCookie();
	}
	Router::route($url);	
?>