<?php
	class Profile extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Posts');
			$this->load_model('Users') ;
		}
		
		public function indexAction($user = []){		
			$validation = new Validate();
			if ($_POST){
				$posted_values = posted_values($_POST);
				if (isset($posted_values['radio'])){
					if ($posted_values['radio'] == 'on'){
						$notify = 1;
					}
					else{
						$notify = 0;
					}
					$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["notifications" => $notify]);
				}
				if(isset($posted_values['delete'])){
					$this->PostsModel->deletePost($posted_values['delete']);
				}
	
				if(isset($posted_values["username"]) || isset($posted_values["email"]) || isset($posted_values["password"])){
					$validation->check($posted_values, [
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
							'min' => 6,
							'strong' => true
							]
							]);
							if ($validation->passed()){
								if ($posted_values["username"])
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["username" => $posted_values["username"]]);
								if ($posted_values["password"]){
									$passwordnew = password_hash($posted_values["password"], PASSWORD_DEFAULT);
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["password" => $passwordnew]);
								}
								if ($posted_values["email"])
									$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["email" => $posted_values["email"]]);
							}
						}
					if (!empty($_FILES["file"]["name"])){
						$targetDir = ROOT."/profilePics/";
						$file_name = basename($_FILES["file"]["name"]);
						$savePath = $targetDir.$file_name;
						$file_extension = pathinfo($savePath, PATHINFO_EXTENSION);
						$file_name = time().rand().".$file_extension";
						$savePath = $targetDir.$file_name;
						$allowedTypes = array('jpg','png','jpeg','gif','pdf');
						if (in_array($file_extension, $allowedTypes)){
							if(move_uploaded_file($_FILES["file"]["tmp_name"], $savePath)){
								$this->UsersModel->update($this->UsersModel->currentLoggedInUser()->id, ["profile_pic" => $file_name]);
							}
						}
						else{
							echo "wrong file type";
						}	
				}
		}
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
			$users = $this->UsersModel->getData();
			foreach($users as $value){
				if ($value->id == $id){
					$_SESSION['profile_pic'] = $value->profile_pic;
				}
			}
			$this->view->pref = $this->UsersModel->getNotify($this->UsersModel->currentLoggedInUser()->id);
		}
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('profile/index');
	}
}
	?>