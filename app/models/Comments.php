<?php
class Comments extends Model{
	public function __construct($user = ''){
			$table = 'comments';
			parent::__construct($table);
		}

		public function uploadComment($posts_id, $comment){
			$fields = ['posts_id' => $posts_id,
					'comment' => $comment];
		$this->insert($fields);
		}
	}

?>