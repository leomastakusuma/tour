<?php

class bukutamu extends Controller{
    private $_model = 'bukutamumodels';
    
    public function index(){
     require 'application/templates/header.html';
     require 'application/templates/menu.html';
//     require 'application/views/bukutamu/databukutamu.html';
     require 'application/views/bukutamu/index.html';
     
     require 'application/templates/footer.php';
       
       
        
    }
    
    public function getall(){
        $model  = $this->loadModel($this->_model);
        $getall = $model->getall();
        echo'<pre>';
        print_r($getall);
    }
    public function save(){
        $form       = $_POST;
        $nama       = $form['nama'];
        $email      = $form['email'];
        $komentar   = $form['Komentar'];
        $tanggal    = date('Y-m-d H-i-s');
        
        if(!empty($form)){
            $error = array();
            if(empty($nama)){
                $error[]  = 'Nama Tidak Boleh Kosong';
            }
            if(empty($komentar)){
                $error[]  = 'Komentar Tidak Boleh Kosong Tidak Boleh Kosong';
            }
            
            if(count($error) > 0) {
                $errormsg = $error;
                require 'application/templates/header.html';
                require 'application/templates/menu.html';
                require 'application/views/bukutamu/index.html';
                require 'application/templates/footer.php';
            }
            else {
                $model  = $this->loadModel($this->_model);
                $simpan = $model->save($nama,$email,$komentar,$tanggal);
                $this->redirect('bukutamu');
            }
         
        }
       
    }
    
    
}