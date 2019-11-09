<?php
	class Users extends Model{
		private $_isLoggedIn, $_sessionName, $_cookieName;
		public static $currentLoggedInUser = NULL;

		public function __construct($user = ''){
			$table = 'users';
			parent::__construct($table);
			$this->_sessionName = CURRENT_USER_SESSION_NAME;
			$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
			$this->_softDelete = true;
			if ($user != ''){
				$u = $this->_db->findFirst('users', ['conditions' => 'id = ?', 'bind' => [$user]]);
			}
			else{
				$u = $this->_db->findFirst('users', ['conditions' => 'username = ?', 'bind' => [$user]]);
			}
			if ($u){
				foreach ($u as $key => $value){
					$this->$key = $value;
				}
			}
		}

		public function findByUsername($username){
			return $this->findFirst(['conditions' => "username = ?", 'bind' => [$username]]);
		}

		public static function currentLoggedInUser(){
			if (!isset(self::$currentLoggedInUser) &&  Session::exists(CURRENT_USER_SESSION_NAME)){
				$u = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
				self::$currentLoggedInUser = $u;
			}
			return self::$currentLoggedInUser;
		}

		public function login($rememberMe = false){
			Session::set($this->_sessionName, $this->id);
			if ($rememberMe){
				$hash = md5(uniqid() + rand(0, 100));
				$user_agent = Session::uagent_no_version();
				Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
				$fields = ['session'=> $hash, 'user_agent' => $user_agent, 'user_id' => $this->id];
				$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
				$this->_db->insert('user_sessions', $fields);
			}
		}

		public static function loginUserFromCookie(){
			$userSession = UserSessions::getFromCookie();
			if ($userSession->user_id != ''){
				$user = new self((int)$userSession->user_id);
			}
			if ($user){
				$user->login();
			}
			return $user;
		}

		public function logout(){
			$user_agent = Session::uagent_no_version();
			$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);//DON't DELETE
			Session::delete(CURRENT_USER_SESSION_NAME);
			if (Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
				Cookie::delete(REMEMBER_ME_COOKIE_NAME);
			}
			self::$currentLoggedInUser = NULL;
			return true;
		}

		public function registerNewUser($params, $token){
			$params['token'] = $token;
			 $this->assign($params);
			 $this->deleted = 0;
			 $this->password = password_hash($this->password, PASSWORD_DEFAULT);
			 $this->save();
		}

		public function acls(){
			if(empty($this->acl)){
				return [];
			}	
			return json_decode($this->acl, true);
		}
		function sendMail($email, $subject, $content){
			$header  = 'MIME-Version: 1.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$header .= "From: noreply@camagru.com";
			$header .= "X-Priority: 1\r\n";
			$header .= "X-MSMail-Priority: High\r\n\r\n";
			$message = "<html>
						<body>
							$content
						</body>
					</html>";
			mail($email, $subject, $message , $header);
		}
	}
?>