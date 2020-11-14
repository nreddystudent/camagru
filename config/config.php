<?php
	define ('DEBUG', true);

	define ('DEFAULT_CONTROLLER', 'Home');
	define ('DEFAULT_ACTION', 'indexAction');

	define('PROOT', '/camagru/'); // '/' for live server
	define('DB_NAME', 'myshit');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'mysql');
	define('DB_HOST', 'localhost'); //use ip adress to avoid DNS lookup


	define ('DEFAULT_LAYOUT', 'default'); // DEF layout for controller
	define ('DEFAULT_SITE_TITLE', 'Camagru'); 

	define('CURRENT_USER_SESSION_NAME', 'fsfsffewsirfkDFSDAFSffsdfd'); //session name for logged in user
	define('REMEMBER_ME_COOKIE_NAME', 'HJMIYSEDJhjnhnSIFJSfsdfFJJFE'); // cookie name for logged in user rember me
	define('REMEMBER_ME_COOKIE_EXPIRY', 2592000); // expiry date set to month for remember me cookie	

	define('ACCESS_RESTRICTED', 'Restricted'); //controller name for restricted redirect
?>