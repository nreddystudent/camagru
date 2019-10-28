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
				$this->_pdo = new PDO("mysql:host=" . DB_HOST .  ";dbname=" . DB_NAME , DB_USER , DB_PASSWORD);
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
		public function query($sql, $params = []){
			$this->_error = false;
			if ($this->_query = $this->_pdo->prepare($sql)){
				$x = 1;
				if (count($params)){
					foreach($params as  $param){
						$this->query->bindValue($x, $param);
						$x++; 
					}
				}
				if ($this->_query->execute()){
					$this->_result =  $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
					$this->_lastInsertID = $this->_pdo->lastInsertID();
				}
				else{
					$this->_error = true; 
				}
				return $this;
			}
		}
	}
?>