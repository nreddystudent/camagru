<?php
		$DB_DSN = 'mysql:host=localhost';
		$DB_USER = 'root';
		$DB_PASSWORD = 'ichigo0808';
		$DB_NAME = 'myshit';
		$DB_DSNF = "";
	class DB{
		private static $_instance = NULL;
		private $_pdo , $_query, $_error = false, $_result, $_count = 0, $_lastInsertID = null;

		private function __construct(){
			try{
				$this->_pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME , DB_USER , DB_PASSWORD);
        		$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}	
			catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public static function getInstance(){
			if (!isset(self::$_instance)){
				 self::$_instance = new DB();
			}
			return self::$_instance;
		}
	}
?>