<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class galerifoto extends Controller{
    private $model = 'galerymodels';


    public function index(){
        require_once 'application/templates/header.html';
        require_once 'application/templates/menu.html';
        require_once 'application/views/galerifoto/index.html';
        require_once 'application/templates/footer.php';  
    }
    public function getall(){
        require 'application/templates/admin/header.html';
        $model  = $this->loadModel($this->model);
        $getall = $model->getall();
        require 'application/views/admin/galery/datagalery.html';
        require 'application/templates/admin/footer.html';
      
    }
    public function savegalery(){
        $form     = $_POST;
        $tanggal  = date('Y-m-d H-i-s');
        $judul    = $form['judul'];
        $event    = $form['event'];
        $eventx   = strlen($event);
        $images1  = $_FILES['file_gambar1']['name'];
        $images2  = $_FILES['file_gambar2']['name'];
        $images3  = $_FILES['file_gambar3']['name'];
        $images4  = $_FILES['file_gambar4']['name'];
        $random   = rand(0000,9999);
        $path       = getcwd(); //path on  root directory web
        $dir        = $path . '/public/images/';
        $newfile1 = $random.$images1;
        $newfile2 = $random.$images2;
        $newfile3 = $random.$images3;
        $newfile4 = $random.$images4;
        
        //validasi gambar 
            $gambar=array();
            if(!empty($images1)){
            $gambar[] = $newfile1;
            }
            if(!empty($images2)){
            $gambar[] = $newfile2;
            }
            if(!empty($images3)){
            $gambar[] = $newfile3;
            }
            if(!empty($images4)){
            $gambar[] = $newfile4;
            }
            if(count($gambar)> 0){
              $data = $gambar;
            }
         $gambarsave=implode(',', $data);
//        $exlpode = explode(',', $nama);
        
        //validasi input
        $error = array();
        if(!empty($form)){
            if(empty($judul)){
                $error[] = 'Judul Tidak Boleh Kosong';
            }

            if($eventx < 10)
            {
                $error[] = 'Event Tidak Boleh Kosong, Minimal 10 karakter';
            }

            if(empty($images1) && empty($images2) && empty($images3) && empty($images4)){
                $error[] = 'Silahkan Masukan Gambar Minimal 1';
            }
            if(!empty($images1)){
                $extfile = strtolower(substr($_FILES["file_gambar1"]["name"], -3));
                if($extfile != 'jpg'){
                $error[] = 'Format Gambar Ke 1, Salah. Hanya Ekstensi *.jpg yang diizinkan';
                }
            }
            if(!empty($images2)){
                $extfile = strtolower(substr($_FILES["file_gambar2"]["name"], -3));
                if($extfile != 'jpg'){
                $error[] = 'Format Gambar Ke 2, Salah. Hanya Ekstensi *.jpg yang diizinkan';
                }
            }
            if(!empty($images3)){
                $extfile = strtolower(substr($_FILES["file_gambar3"]["name"], -3));
                if($extfile != 'jpg'){
                $error[] = 'Format Gambar Ke 3, Salah. Hanya Ekstensi *.jpg yang diizinkan';
                }
            }
            if(!empty($images4)){
                $extfile = strtolower(substr($_FILES["file_gambar4"]["name"], -3));
                if($extfile != 'jpg'){
                $error[] = 'Format Gambar Ke 4, Salah. Hanya Ekstensi *.jpg yang diizinkan';
                }
            }
            //cek error
            if(count($error) > 0){
                $msg = $error;
                require 'application/templates/admin/header.html';
                require 'application/views/admin/galery/index.html';
                require 'application/templates/admin/footer.html';
            }
            //simpan database
            else{
                //uploadfile
                $move_gambar = $dir . basename($newfile1);
                move_uploaded_file($_FILES['file_gambar1']['tmp_name'], $move_gambar);
                
                $move_gambar1 = $dir . basename($newfile2);
                move_uploaded_file($_FILES['file_gambar2']['tmp_name'], $move_gambar1);
                
                $move_gambar2 = $dir . basename($newfile3);
                move_uploaded_file($_FILES['file_gambar3']['tmp_name'], $move_gambar2);
                
                $move_gambar3 = $dir . basename($newfile4);
                move_uploaded_file($_FILES['file_gambar4']['tmp_name'], $move_gambar3);
                
                
                
                $model = $this->loadModel($this->model);
                $save  = $model->savegalery($tanggal,$judul,$event,$gambarsave);
                $this->redirect('admin/galery');
                
            }
            
        }            
        
    }
    
    public function searchid($id){
        if(isset($id)){
            $model      = $this->loadModel($this->model);
            $galery = $model->searchgalery($id);
            require 'application/templates/admin/header.html';
            require 'application/views/admin/galery/editgalery.html';
            require 'application/templates/admin/footer.html';
                    
        }
        
    }
    
    public function editgalery(){
     
        $form   = $_POST;
        $id     = $form['id'];
       
//        $judul  = $form['judul'];
//        $event  = $form['event'];
        extract($_POST);
        $images = $_FILES['file_gambar']['name'];
        $random   = rand(0000,9999);
        $path       = getcwd(); //path on  root directory web
        $dir        = $path . '/public/images/';
        
        $data=array();
        
        foreach($images as $id=>$img):
            if($img !=null){
//                $imagesx  = null;
                $extfile = strtolower(substr($img, -3));
                if($extfile != 'jpg'){
                    $data[] ='Format Gambar Tidak Sesuai Hanya Ekstensi ke  *.jpg ';
                }                        
            }
        endforeach;
        if(empty($judul)){
                    $data[] = 'Judul Tidak Boleh Kosong';
                }
                if(strlen($event) <10)
                {
                    $data[] = 'Event Tidak Boleh Kosong, Minila 10 Karakter';
                }     
        if(count($data) > 0){
            $msg = $data;
            $id  = $_POST['id'];
            $model      = $this->loadModel($this->model);
            $gambarx = $model->searchgalery($id);
            require 'application/templates/admin/header.html';
            require 'application/views/admin/galery/editgalery.html';
            require 'application/templates/admin/footer.html';
        }
        else{
            $model = $this->loadModel($this->model);
            $id  = $_POST['id'];
           
            $_key=array();
            foreach ($images as $idx=>$key){
                if($key !=null){
                    $_key[] =  $random.$key;
                    $move   =  $random.$key;
                    $move_gambar = $dir . basename($move);
//                    echo $move_gambar;
                    foreach($_FILES['file_gambar']['tmp_name'] as $key=> $tmp_name)  :
                        move_uploaded_file($_FILES['file_gambar']['tmp_name'][$idx], $move_gambar);
                    endforeach;                  
                    
                }
            }        
          
            if(count($_key)>0){
                $newfile =implode(',', $_key);
                $save    =$model->updategaleryall($judul,$event,$newfile, $id);
                $this->redirect('admin/galery');
            }
            else{
                foreach ($images as $imgx):  
                if($imgx ==NULL){
                   $save  = $model->updategalery($judul,$event, $id);
                   $this->redirect('admin/galery');
                }
                endforeach;
            }
           
           
        }
        
        
    }
    

    

}
