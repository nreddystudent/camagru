<?php
class Likes extends Model{
	public function __construct($user = ''){
			$table = 'likes';
			parent::__construct($table);
	}
	public function uploadLike($posts_id, $userid){
		$fields = ['posts_id' => $posts_id,
				'userid' => $userid];
		$this->insert($fields);
	}
}
?>
