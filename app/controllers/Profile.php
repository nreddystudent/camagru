<?php
	class Profile extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts');
			$this->load_model('Users') ;
		}
		
		public function indexAction($user = []){		
			if ($user && $user != $this->UsersModel->currentLoggedInUser()->id){
			$_SESSION['userPosts'] = $this->PostsModel->getUserPosts($user);
			$users = $this->UsersModel->getData();
			foreach($users as $value){
				if ($value->id == $users){
					$_SESSION['profile_pic'] = $value;
				}
			}
			$_SESSION['is_owner'] = 0;
		}
		else{
			$_SESSION['is_owner'] = 1;
			$_SESSION['userPosts'] = $this->PostsModel->getUserPosts($this->UsersModel->currentLoggedInUser()->id);
			$id = $this->UsersModel->currentLoggedInUser()->id;
			$this->view->pref = $this->UsersModel->currentLoggedInUser()->notifications;
			$users = $this->UsersModel->getData();
			foreach($users as $value){
				if ($value->id == $id){
					$_SESSION['profile_pic'] = $value->profile_pic;
				}
			}
		}
			$validation = new Validate();
			if($_POST || !empty($_FILES["file"]["name"])){
				if ($_POST['radio']){
					if ($_POST['radio'] == 'on'){
						$notify = 1;
					}
					else
						$notfiy = 0;
					$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["notifications" => $notify]);
			}
				if($_POST["username"] || $_POST["email"] || $_POST["password"]){
					$validation->check($_POST, [
						'username' => [
							'display' => 'User Name',
							'unique' => 'users',
							'min' => 6,
							'max' => 150
						],
						'email' => [
							'display' => 'Email',
							'unique' => 'users',
							'valid_email' => true,
							'max' => 150
						],
						'password' => [
							'display' => 'Password',
							'min' => 6
							]
							]);
							if ($validation->passed()){
								if ($_POST["username"])
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["username" => $_POST["username"]]);
								if ($_POST["password"]){
									$passwordnew = password_hash($_POST["password"], PASSWORD_DEFAULT);
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["password" => $passwordnew]);
								}
								if ($_POST["email"])
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["email" => $_POST["email"]]);
							}
						}
					if (!empty($_FILES["file"]["name"]) && $_POST){
						$targetDir = ROOT."/profilePics/";
						$file_name = basename($_FILES["file"]["name"]);
						$savePath = $targetDir.$file_name;
						$file_extension = pathinfo($savePath, PATHINFO_EXTENSION);
						$file_name = time().rand().".$file_extension";
						$savePath = $targetDir.$file_name;
						$allowedTypes = array('jpg','png','jpeg','gif','pdf');
						if (in_array($file_extension, $allowedTypes)){
							if(move_uploaded_file($_FILES["file"]["tmp_name"], $savePath)){
								$user = $this->UsersModel->currentLoggedInUser()->username;
								$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["profile_pic" => $file_name]);
							}
						}
						else{
							echo "wrong file type";
						}	
				}
			}
	
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('profile/index');
	}
}
	?>