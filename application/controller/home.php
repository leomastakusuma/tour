<?php

class Home extends Controller{
        private $model = 'beritamodels';
	public function index(){          
//         require_once 'application/templates/header.html';
//         require_once 'application/templates/menu.html';
//         require_once 'application/templates/content.php';
//         require_once 'application/templates/footer.php';
        require_once 'application/templates/header.html';
        require_once 'application/templates/menu.html';
        $model        = $this->loadModel($this->model);
        $getberita    = $model->getallberita();
//      echo '<pre>';
//      print_r($getberita);die;
//      echo'<pre>'; print_r($get);
        require_once 'application/views/home/berita.html';
        require_once 'application/templates/footer.php';  


	}
	

	public function getall(){
		
			$form 	= $_POST;
//                        print_r($form);die;
			if(isset($form)){
				require_once 'application/templates/header.html';
		 		require_once 'application/templates/menu.html';
				require_once"application/views/home/nama.html";
                                require_once 'application/templates/footer.php';
			}

	}
        
//        public function news($id_berita){
//            if(isset($id_berita)){
//                
//            }
//        }
    public function News($id_berita){
        if(isset($id_berita)){
            
            
            require_once 'application/templates/header.html';
            require_once 'application/templates/menu.html';
            $model = $this->loadModel($this->model);
            $getberita = $model->searchberita($id_berita);
            require_once 'application/views/home/detailberita.html';
            require_once 'application/templates/footer.php';  
        }
        
    }
        
        
}
