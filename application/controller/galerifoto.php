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
        $model  = $this->loadModel($this->model);
        $getall = $model->getall();
        echo '<pre>';
        print_r($getall);   
    }
    public function savegalery(){
        $form = $_POST;
        $images ['nama']   = $_FILES['file_gambar']['name'];
        echo '<pre>';
        print_r($images);
        foreach ($images as $img){
            
            echo $data = $img;
        }
        
    }
   

    

}