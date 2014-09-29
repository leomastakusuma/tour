<?php
class News extends Controller{
    
//        public function __construct() {
//            parent::__construct();
//            Auth::handloginAdmin();
//        }

        public function index(){
////            $this->view($controller, $action)
//		
//		// echo  $_SESSION['level'];
//		echo $_SESSION['level'];
//		echo "<a href=".URL."login/logout>logout</a>"
//		;
		 require_once 'application/templates/header.html';
 	 	require_once 'application/templates/menu.html';
		 require_once "application/views/news/fisrt.html";
                 require_once 'application/templates/footer.php';

	}

	public function test(){
            echo $_SESSION['level'];
            $model  = $this->loadModel('beritamodels');
            echo '<pre>';
            print_r($get=$model->getallberita());
            
		 
	}

	
}
