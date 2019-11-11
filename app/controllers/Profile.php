<?php
	class Profile extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts');
			$this->load_model('Users') ;
		}

		public function indexAction(){
			$_SESSION['userPosts'] = $this->PostsModel->getUserPosts($this->UsersModel->currentLoggedInUser()->username);
			$_SESSION['profile_pic'] = $this->UsersModel->currentLoggedInUser()->profile_pic;
			var_dump($_SESSION['profile_pic']);
			$this->view->render('profile/index');
		}
	}
?>