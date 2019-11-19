<?php
	class Register extends Controller{
		private $_db;
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->load_model('Users') ;
			$this->view->setLayout('default');
			$this->_db = DB::getInstance();
		}
		public function loginAction(){
			$validation = new Validate();
			if ($_POST){
				$posted_values = $_POST;
				//form validation
				$validation->check($posted_values, [
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
					$user = $this->UsersModel->findByUsername($posted_values['username']);
					if ($user->verified == 1){
						if (isset($user->password)){
							if ($user && password_verify(Input::get('password'), $user->password)){
								$remember = (isset($posted_values['remember_me']) && Input::get('remember_me')) ? true : false;
								$user->login($remember);
								Router::redirect('');
							}
						}
						else{
							$validation->addError("There is an error with you username or pasword.");
						}
					}
					else{
						$validation->addError("Please Verify Account Or Register");
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
				$validation->check($posted_values, [
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
						'min' => 6,
						'strong' => true
					],
					'passwc' => [
						'display' => 'Confirm Password',
						'required' => true,
						'matches' => 'password'
					]
				]);
				if ($validation->passed()){
					$newUser = new Users;
					$token = bin2hex(random_bytes(50));
					$content = "<a href=\"http://localhost:8080/camagru/register/verified?token=$token\">This link</a>";
					 $newUser->registerNewUser($posted_values, $token);
					 $this->UsersModel->sendMail($posted_values['email'],"Verify Your Camagru Account", $content);
					 Router::redirect(''); 
				}
			}
			$this->view->post = $posted_values;
			$this->view->displayErrors = $validation->displayErrors();
			$this->view->render('register/register');
		}

		function verifiedAction(){
			$token = $_GET['token'];
			$result = $this->UsersModel->findFirst(['conditions' => "token = ?", 'bind' => [$token]]);
			if($result->email){
				if ($result->token){
					$this->UsersModel->update($result->id, ['verified' => 1]);
					$this->UsersModel->update($result->id, ['token' => '']);
					$this->view->setLayout('home');
					$this->view->render('verify/index');
				}
			}
			else{
				echo "not found";
			}
		}

		function forgotAction(){
				$validation = new Validate;
				$posted_values = ['email' => ''];
				if ($_POST){
					$posted_values = posted_values($_POST);
					$validation->check($posted_values, [
						'email' => [
							'display' => 'Email',
							'required' => true,
							'valid_email' => true,
							'max' => 150
						]
					]);
					}
				if ($validation->passed()){
					$result = $this->UsersModel->findFirst(['conditions' => "email = ?", 'bind' => [$posted_values['email']]]);
					if ($result->email){
						if ($result->token == '' && $result->verified == 1){
							$token = bin2hex(random_bytes(50));
							$this->UsersModel->update($result->id, ['token' => $token]);
							$content = "<a href=\"http://localhost:8080/camagru/register/changepass?token=$token\">This link</a>";
							$this->UsersModel->sendMail($posted_values['email'],"Change Camagru Password", $content);
						}
						else{
							$validation->addError("Please verify Your account before Changing passwords");
						}
					}
					else{
						$validation->addError("This email address was not found please register");
					}
				}
				$this->view->post = $posted_values;
				$this->view->displayErrors = $validation->displayErrors();
				$this->view->render('register/forgot');
			}

		function changepassAction(){
			$validation = new Validate;
			$posted_values = ['email' => '', 'password' => '', 'passwc'=> ''];
			if ($_POST){
				$posted_values = posted_values($_POST);
				$validation->check($posted_values, [
					'email' => [
						'display' => 'Email',
						'required' => true,
						'valid_email' => true,
						'max' => 150
					],
					'password' => [
						'display' => 'Password',
						'required' => true,
						'min' => 6,
						'strong' => true
					],
					'passwc' => [
						'display' => 'Confirm Password',
						'required' => true,
						'matches' => 'password'
					]
				]);
				}
			if ($validation->passed()){
				$result = $this->UsersModel->findFirst(['conditions' => "token = ?", 'bind' => [$_GET['token']]]);
				if ($result->token != ''){
					if ($result->email == $posted_values['email']){
						$newpass = password_hash($posted_values['password'], PASSWORD_DEFAULT);
						$this->UsersModel->update($result->id, ['token' => '']);
						$this->UsersModel->update($result->id, ['password' => $newpass]);
						echo "password was changed";
					}
						
					else{
						$validation->addError("This email address was not found please register");
					}
				
				}
				else{
					$validation->addError("Link is invalid please try again");
				}
			}
			$this->view->post = $posted_values;
			$this->view->displayErrors = $validation->displayErrors();
			$this->view->render('register/changepass');
		}
		
	}
?>