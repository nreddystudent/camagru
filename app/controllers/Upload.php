<?php
	class Upload extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('Posts') ;
			$this->load_model('Users') ;
		}

		public function indexAction(){
			if (isset($_POST['imgData'])){
				$filter = $_POST['filter'];
				var_dump($filter);
				$data = $_POST['imgData'];
				$data = str_replace('data:image/png;base64,', '', $data);
				$data = str_replace(' ', '+', $data);
				$data = base64_decode($data);
				$image = imagecreatefromstring($data);
				if ($filter == 'invert(100%)'){
					imagefilter($image, IMG_FILTER_NEGATE);
				}
				else if ($filter == 'grayscale(100%)'){
					imagefilter($image, IMG_FILTER_GRAYSCALE);
				}
				else if ($filter == 'contrast(200%)'){
					imagefilter($image, IMG_FILTER_CONTRAST, -50);
				}
				else if ($filter == 'blur(10px)'){
					imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR, 1000);
				}
				else if($filter == 'sepia(100%)'){
					imagefilter($image, IMG_FILTER_GRAYSCALE);
					imagefilter($image, IMG_FILTER_COLORIZE, 100, 50, 0);
				}
				$user = $this->UsersModel->currentLoggedInUser()->username;				
				$file_name = time().rand().".jpg";
				imagejpeg($image, ROOT."/images/". $file_name);
				$this->PostsModel->uploadImage($file_name, $user);
			}
			if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
				$targetDir = ROOT."/images/";
				$file_name = basename($_FILES["file"]["name"]);
				$savePath = $targetDir.$file_name;
				$file_extension = pathinfo($savePath, PATHINFO_EXTENSION);
				$file_name = time().rand().".$file_extension";
				$savePath = $targetDir.$file_name;
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
				if (isset($_POST['stickers'])){
					
				}
			}
			$this->view->render('upload/index');
		}

		public function testAction(){
			$this->view->render('upload/test');
		}
	}
?>