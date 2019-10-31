<?php
	class Register extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Users') ;
			$this->view->setLayout('default');
		}
		public function loginAction(){
			$validation = new Validate();
			if ($_POST){
				//form validation
				$validation->check($_POST, [
					'username' => [
						'display' => 'Username',
						'required' => true
					],
					'password' => [
						'display' => 'Password',
						'required' => true,
					]
				]);
				if ($validation->passed()){
					$user = $this->UsersModel->findByUsername($_POST['uname']);
					 if (isset($user->password)){
						if ($user && password_verify(Input::get('password'), $user->password)){
							$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
							$user->login($remember);
							Router::redirect('');
						}
					}
					else{
						$validation->addError("There is an error with you username or pasword.");
					}
				}
			}
			$this->view->displayErrors = $validation->displayErrors();
			$this->view->render('register/login');
		}

		public function logoutAction(){
			if (currentUser()){
				currentUser()->logout();
			}
			Router::redirect('register/login');
		}

		public function registerAction(){
			//make variable names same as table names for safety
			$validation = new Validate();
			$posted_values = ['first_name' => '' ,'last_name' => '', 'username' => '', 'email' => '', 'password' => '', 'passwc'=> ''];
			if ($_POST){
				$posted_values = posted_values($_POST);
				$validation->check($_POST, [
					'first_name' => [
						'display' => 'First Name',
						'required' => true
					],
					'last_name' => [
						'display' => 'Last Name',
						'required' => true
					],
					'username' => [
						'display' => 'User Name',
						'required' => true,
						'unique' => 'users',
						'min' => 6,
						'max' => 150
					],
					'email' => [
						'display' => 'Email',
						'required' => true,
						'unique' => 'users',
						'valid_email' => true,
						'max' => 150
					],
					'password' => [
						'display' => 'Password',
						'required' => true,
						'min' => 6
					],
					'passwc' => [
						'display' => 'Confirm Password',
						'required' => true,
						'matches' => 'password'
					]
				]);
				if ($validation->passed()){
					$newUser = new Users;
					 $newUser->registerNewUser($_POST);
					 $newUser->login();
					 Router::redirect(''); 
				}
			}
			$this->view->post = $posted_values;
			$this->view->displayErrors = $validation->displayErrors();
			$this->view->render('register/register');
		}
	}
?>