<?php
	class Feed extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts') ;
		}	
		public function indexAction(){
			$this->PostsModel->getPosts();
			$test = "hey";
			$this->view->render('feed/index');
		}
	}
?>