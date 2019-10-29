<?php
	class Home extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}	
		public function indexAction(){
			$db = DB::getInstance();
			$fields =  [
				'first_name' => 'Nol',
				'last_name' => 'REEEE',
			];
			$db->delete('users', '66');
			$this->view->render('home/index');
		}
	}
?>