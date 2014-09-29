<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class test extends Controller{
    private $model = 'beritamodels';


    public function index(){
//        require_once 'application/templates/user.php';
//    require_once 'application/views/index/index.html';
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
    
    public function Nama(){
        require 'application/templates/header-page.html';
        $model        = $this->loadModel('ordermodels');
        $getall          = $model->getall();
        require 'application/views/admin/transaksi/test.html';
    }
}