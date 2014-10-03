<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kotawisata extends Controller{
    private $_model = 'kotawisatamodels';
    public function index(){
        require_once 'application/templates/header.html';
        require_once 'application/templates/menu.html';
        require_once 'application/views/kotawisata/index.html';
        require_once 'application/templates/footer.php';  
    }
    
    public function getall(){
        $model  = $this->loadModel($this->_model);
        $getall = $model->getall();
        echo '<pre>';
    }
    
    public function searchid($id){
        if(isset($id)){
            $model      = $this->loadModel($this->_model);
            $armadadata = $model->searchwisata($id);
//            require 'application/templates/admin/header.html';
////            require 'application/views/admin/armada/editarmada.html';
//            require 'application/templates/admin/footer.html';
                    
        }
        
    }
    
    public function savewisata(){
        $form       = $_POST;
        $kotawisata = $form['kotawisata'];
        $link       = $form['link'];
        $images     = $_FILES['file_gambar']['name'];
        $random     = rand(0000, 9999); //function random 
        $newfile    = $random . $images;  // implement change name
        $path       = getcwd(); //path on  root directory web
        $dir        = $path . '/public/images/';

             
        if(!empty(extract($_POST))){
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $error = array(); 
            $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));
            if(empty($kotawisata)){
            $error[] = 'Kota Wisata Tidak Boleh Kosong !';
            }
            if(empty($link)){
            $error[] = 'Link Tidak Boleh Kosong !';
            }
            
            if(empty($images)){
            $error[] = 'Gambar Tidak Boleh Kosong !';              
            }
            if(!empty($images)){
                if($extfile != 'jpg'){
                $error[] = 'Format Gambar Hanya *.jpg !';}      
            }
            if(count($error) > 0){
                $msg = $error;
                require 'application/templates/admin/header.html';
                require 'application/views/admin/kotawisata/index.html';
                require 'application/templates/admin/footer.html';
            }
            else {
                
               
                 $move_gambar = $dir . basename($newfile);
                 move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);
//                 
                 $modelarmada  = $this->loadModel($this->_model);
                 $simpanarmada = $modelarmada->savearmada($armada,$newfile,$link);
                 $this->redirect('admin/armada');
            }
        }
    }
    
}