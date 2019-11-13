<?php
	class Feed extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts') ;
			$this->load_model('Comments') ;
			$this->load_model('Users') ;
			$this->load_model('Likes') ;
		}	
		public function indexAction(){
			if ($_POST){
				if ($_POST['likeData']){
					$this->LikesModel->uploadLike($_POST['likeData'], $this->UsersModel->currentLoggedInUser()->id);
				}
				else{
					$this->CommentsModel->uploadComment( $_POST['post_id'],htmlspecialchars($_POST['comment']), $this->UsersModel->currentLoggedInUser()->id);
				}
			}
			$_SESSION['profilepics'] = $this->UsersModel->getData();
			$results = $this->PostsModel->getPosts();
			$comments = $this->CommentsModel->getComments();
			$_SESSION['comments'] = $comments;
			$_SESSION['posts'] = $results;
			$this->view->render('feed/index');
		}
	}
?>