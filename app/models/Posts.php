<?php
class Posts extends Model{
	public function __construct($user = ''){
			$table = 'Posts';
			parent::__construct($table);
		}

	public function uploadImage($name, $userid){
		$fields = ['name' => $name,
					'userid' => $userid];
		$this->insert($fields);
	}

	public function getPosts(){
			return $this->getData();
	}
	public function getUserPosts($user){
			return $this->getData($user);
	}

	public function deletePost($id){
		$this->delete($id);
	}

	public function getPostData($userid=[]){
		return $this->getJoinData($userid);
	}
}
?>