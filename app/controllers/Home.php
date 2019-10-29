<?php
	class Home extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}	
		public function indexAction(){
			$db = DB::getInstance();
			$db->findFirst('users', [
			 	'conditions' => 'first_name = ?',
		 		'bind' => ['Nol'],
			 ]);
			$this->view->render('home/index');
		}
	}
?>