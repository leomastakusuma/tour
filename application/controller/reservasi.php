<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 
 */
class reservasi extends Controller{
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    private $_model         = 'reservasimodels';
    private $_modelorder    = 'ordermodels';
    public function index(){
        require 'application/templates/header-page.html';
        require 'application/templates/menu.html';
        $model  = $this->loadModel($this->_model);
        $getall=$model->getall();
        require 'application/views/reservasi/index.html';
        require 'application/templates/footer.php';
        
        
    }
    
    public function getorder($idreservasi){
        if(isset($idreservasi)){
            $model = $this->loadModel($this->_model);
            $getall=$model->searchreservasi($idreservasi);
        
            require 'application/templates/header-page.html';
            require 'application/templates/menu.html'; 
            require 'application/views/reservasi/order.html';
            require 'application/templates/footer.php';
        }
        
    }


    public function booking(){
 
        $id_user        = $_SESSION['id_user'];
        $form           = $_POST;
        $id_reservasi   = $form['id'];
        $tanggal        = $form['tanggal'];
        $rand           = rand(00, 99);
        $invoice        = 'PNR'.$rand;
        $pesan          = $form['Pesan'];
        
        
        
        if(!empty($form)){
            $error = array();
            $model = $this->loadModel($this->_modelorder);
            $modelreservasi = $this->loadModel($this->_model);

            if(empty($tanggal)){
                $error[]= 'Tanggal boleh kosong';
            }
            if(empty($pesan)){
                $error[]= 'Jumlah Pesan boleh kosong';
            }
            if(!empty($tanggal) && !empty($pesan)){
               
               $cek   = $model->cekorder($id_reservasi, $tanggal);
               if(count($cek)>0){
                   $error[] = 'Transaksi Tidak Dapat dilakukan silahkan pilih tanggal lain';
               }
            }
            
            if(count($error) > 0){
                $msg     = $error;            
                $getall  = $modelreservasi->searchreservasi($id_reservasi);
                require 'application/templates/header-page.html';
                require 'application/templates/menu.html'; 
                require 'application/views/reservasi/order.html';
                require 'application/templates/footer.php';
            }
            else{
                $search         = $modelreservasi->searchreservasi($id_reservasi);
                $harga          = $search->harga;
               
                //simpan ke database
                
                $model->saveorder($id_reservasi, $id_user, $pesan,$harga,$invoice);
                require 'application/views/reservasi/succes.html';
            }
        }       

    }
   
    public function cek(){
        $id_reservasi = 19;
        $tanggal      = '2014-09-15';
        $model = $this->loadModel($this->_modelorder);
        $cek   = $model->cekorder($id_reservasi, $tanggal);
        print_r($cek);
    }

}


