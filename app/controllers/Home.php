<?php
	class Home extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}	
		public function indexAction(){
			$db = DB::getInstance();
			$fields =  [
				'first_name' => 'Nol',
				'last_name' => 'RED',
				'email' => 'me@mail.com',
				'password' => '12334',
				'is_admin' => 0
			];
			$db->insert('users', $fields);
			$this->view->render('home/index');
		}
	}
?>