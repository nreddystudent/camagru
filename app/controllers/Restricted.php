<?php
class Restricted extends Controller{
	public function __construct($controller, $action){
		parent::__construct($controller, $action);
	}	
	public function indexAction(){
		$this->view->setLayout('home');
		$this->view->render('restricted/index');
	}
}
?>