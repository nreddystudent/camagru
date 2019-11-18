<?php
	class Upload extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('Posts') ;
			$this->load_model('Users') ;
		}

		public function indexAction(){
				$this->view->render('upload/index');
			}


		public function snapAction(){
			if (isset($_POST['imgData'])){
				$filter = $_POST['filter'];
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
				$sticker = $_POST['stickerData'];
				$sticker = str_replace('data:image/png;base64,', '', $sticker);
				$sticker = str_replace(' ', '+', $sticker);
				$sticker = base64_decode($sticker);
				$sticker = imagecreatefromstring($sticker);
				$user = $this->UsersModel->currentLoggedInUser()->id;				
				$file_name = time().rand().".jpg";
				 //imagealphablending($image);
				// imagesavealpha($image);
				$x = imagesx($image);
				$y = imagesy($image);
				imagecopy($image, $sticker, 0, 0, 0, 0, $x, $y);
				imagejpeg($image, ROOT."/images/". $file_name);
				$this->PostsModel->uploadImage($file_name, $user);
				ob_clean();
				echo $file_name;
				die();
			}
			$this->view->posts = $this->PostsModel->getUserPosts($this->UsersModel->currentLoggedInUser()->id);
			$this->view->render('upload/snap');
		}
		
		public function uploadAction(){
			if(isset($_POST["imgData"])){
				$filter = $_POST['filter'];
				$data = $_POST['imgData'];
				$matches = explode(";", $data);
				$file_extension = ltrim(ltrim($matches[0], "data:image"), "/");
				$data = str_replace('data:image/png;base64,', '', $data);
				$data = str_replace('data:image/pdf;base64,', '', $data);
				$data = str_replace('data:image/jpeg;base64,', '', $data);
				$data = str_replace('data:image/gif;base64,', '', $data);
				$data = str_replace(' ', '+', $data);
				$allowedTypes = array('jpg','png','jpeg','gif');
				if (in_array($file_extension, $allowedTypes)){
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
						$file_name = time().rand().".$file_extension";
						$stickerData = $_POST['stickerData'];
						$stickerData = str_replace('data:image/png;base64,', '', $stickerData);
						$stickerData = str_replace(' ', '+', $stickerData);
						$sticker = base64_decode($stickerData);
						$sticker = imagecreatefromstring($sticker);
						imagealphablending($image. true);
						//imagealphablending($sticker. true);
						imagesavealpha($image, true);
						imagesavealpha($sticker, true);
						$x = imagesx($image);
						$y = imagesy($image);
						$x1 = imagesx($sticker);
						$y1 = imagesy($sticker);
						imagecopy($image, $sticker, 0, 0, 0, 0, $x, $y);
						imagepng($image, ROOT."/images/". $file_name);
						$user = $this->UsersModel->currentLoggedInUser()->id;
						$this->PostsModel->uploadImage($file_name, $user);
						ob_clean();
						echo $file_name;
						die();
				}
				else{
					ob_clean();
					echo "wrong file type";
					die();
				}	
			}
			$this->view->posts = $this->PostsModel->getUserPosts($this->UsersModel->currentLoggedInUser()->id);
			$this->view->render('upload/upload');
	}

	public function editAction(){
		$this->view->render('upload/edit');

	}
}
?>