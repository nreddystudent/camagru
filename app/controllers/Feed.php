<?php
	class Feed extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts') ;
		}	
		public function indexAction(){
			$results = $this->PostsModel->getPosts();
			$_SESSION['posts'] = $results;
			$this->view->render('feed/index');
		}
	}
?>