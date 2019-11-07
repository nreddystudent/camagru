<?php
class Posts extends Model{
	public function __construct($user = ''){
			$table = 'Posts';
			parent::__construct($table);
		}

	public function uploadImage($name, $username){
		$fields = ['name' => $name,
					'username' => $username];
		$this->insert($fields);
	}

	public function getPosts(){
			return $this->getData();
	}
}
?>