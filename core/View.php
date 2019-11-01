<?php
	class View{
		protected $_head, $_body, $_siteTitle = DEFAULT_SITE_TITLE, $_outputBuffer , $_layout = DEFAULT_LAYOUT;

		public function __construct(){

		}

		public function render($viewName){
			$viewArray = explode('/', $viewName);
			$viewString = implode('/', $viewArray);
			if (file_exists(ROOT . "/app/views/$viewString.php")){
				include(ROOT . "/app/views/$viewString.php");
				include(ROOT . "/app/views/layouts/$this->_layout.php");
			}
			else{
				die("The  view \" $viewName . \" does not exist");
			}
		}

		public function content($type){
			if ($type == 'head'){
				return $this->_head;
			}
			else if ($type == 'body'){
				return $this->_body;
			}
			else
				return false;
		}

		public function start($type){
			$this->_outputBuffer = $type;
			ob_start();
		}
		public function end(){
			if ($this->_outputBuffer == 'head'){
				$this->_head = ob_get_clean();
			}
			elseif($this->_outputBuffer == 'body'){
				$this->_body = ob_get_clean();
			}
			else{
				die('First run Start method');
			}
		}
		public function siteTitle() {
			return $this->_siteTitle;
		}
		public function setSiteTitle($title){
			$this->_siteTitle = $title;
		}
		public function setLayout($path){
			$this->_layout = $path;
		}
	}
?>