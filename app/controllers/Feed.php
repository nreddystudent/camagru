<?php
	class Feed extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts') ;
			$this->load_model('Comments') ;
		}	
		public function indexAction(){
			if ($_POST){
				$this->CommentsModel->uploadComment( $_POST['post_id'],$_POST['comment']);
			}
			$results = $this->PostsModel->getPosts();
			$comments = $this->CommentsModel->getComments();
			$_SESSION['comments'] = $comments;
			$_SESSION['posts'] = $results;
			$this->view->render('feed/index');
		}
	}
?>