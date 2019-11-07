<?php
	class Upload extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('Posts') ;
			$this->load_model('Users') ;
		}
		public function indexAction(){
			if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
				$targetDir = ROOT."/images/";
				$file_name = basename($_FILES["file"]["name"]);
				$savePath = $targetDir.$file_name;
				$file_extension = pathinfo($savePath, PATHINFO_EXTENSION);
				$allowedTypes = array('jpg','png','jpeg','gif','pdf');
				if (in_array($file_extension, $allowedTypes)){
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $savePath)){
						$user = $this->UsersModel->currentLoggedInUser()->username;
						$this->PostsModel->uploadImage($file_name, $user);
					}
				}
				else{
					echo "wrong file type";
				}
			}
			$this->view->render('upload/index');
		}
	}
?>