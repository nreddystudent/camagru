<?php
class Likes extends Model{
	public function __construct($user = ''){
			$table = 'likes';
			parent::__construct($table);
	}
	public function uploadLike($posts_id, $userid){
		if(!(($this->findFirst(['conditions' => ['posts_id' => '?', "userid" => "?"], 'bind' => [$posts_id, $userid]]))->id)){
		 	$fields = ['posts_id' => $posts_id,
					'userid' => $userid];
			$this->insert($fields);
			return(1);
		}
		return(0);
	}
}
?>