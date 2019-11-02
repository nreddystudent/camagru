<?php
	class Router{
		public static function route($url){
			//controller
			$controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER ;
			$controller_name = $controller;
			array_shift($url);
			//action
			$action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : DEFAULT_ACTION ;
			$action_name = $action;
			array_shift($url);

			//params
			$queryParams = $url;
			
			if (method_exists($controller, $action) && class_exists($controller_name)){
				$dispatch = new $controller($controller_name, $action);
				call_user_func_array([$dispatch, $action], $queryParams);
			}
			else{
				$viewserror = new View;
				$viewserror->render('error/index');
				die();
				//die("method does not exist in controller \" $controller_name \"");
			}
		}

		public static function redirect($location){
			if (!headers_sent()){
				header('Location: '.PROOT.$location);
				exit();
			}
			else{
				echo '<script type ="text/javascript">';
				echo 'window.location.href="'.PROOT.$location.'"';
				echo '</script>';
				echo '<noscript>';
				echo 'meta http-equiv="refresh" content="0;url='.$location.'" />';
				echo '</noscript>'; exit;

			}
		}
	}
?>