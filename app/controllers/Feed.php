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
				$posted_values = $_POST;
				if (array_key_exists('likeData', $posted_values)){
					$id = $posted_values['likeData'];
					$params['conditions'] = "id=$id";
					$likes = $this->PostsModel->findFirst($params)->likes;
					if ($this->LikesModel->uploadLike($posted_values['likeData'], $this->UsersModel->currentLoggedInUser()->id)){
						$id1 = $posted_values['likeUID'];
						$params['conditions'] = "id=$id1";
						$resultsL = $this->UsersModel->findFirst($params);
						if ($resultsL->notifications == '1')
							$this->UsersModel->sendmail($resultsL->email,"Camagru Notification","Someone Liked Your Post");
						$likes+=1;
						$this->PostsModel->update($id, ['likes' => $likes]);
					}
					echo $likes;
					die;
				}
				else{
					$id2 = $posted_values['commentData'];
					$params['conditions'] = "id=$id2";
					$resultsC = $this->UsersModel->findFirst($params);
					if ($resultsC->notifications == '1')
						$this->UsersModel->sendmail($resultsC->email,"Camagru Notification","Someone Liked Your Post");
					$this->CommentsModel->uploadComment( $posted_values['post_id'],$posted_values['comment'], $this->UsersModel->currentLoggedInUser()->id);
				}
			}
			$_SESSION['profilepics'] = $this->UsersModel->getData();
			$results = $this->PostsModel->getPosts();
			$comments = $this->CommentsModel->getComments();
			$_SESSION['comments'] = $comments;
			$_SESSION['posts'] = $results;
			$this->view->currentUser = $this->UsersModel->currentLoggedInUser();
			$this->view->render('feed/index');
		}
	}
?>