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
				if (array_key_exists('likeData', $_POST)){
					$id = $_POST['likeData'];
					$params['conditions'] = "id=$id";
					$likes = $this->PostsModel->findFirst($params)->likes;
					if ($this->LikesModel->uploadLike($_POST['likeData'], $this->UsersModel->currentLoggedInUser()->id)){
						$likes+=1;
						$this->PostsModel->update($id, ['likes' => $likes]);
					}
					echo $likes;
					die;
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