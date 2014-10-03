<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Armada extends Controller{
    
    private $_model ='Armadamodels';

    public function index(){
        require_once 'application/templates/header.html';
        require_once 'application/templates/menu.html';
        require_once 'application/views/armada/index.html';
        require_once 'application/templates/footer.php';  
    }
    public function getall(){
       
        $model  = $this->loadModel($this->_model);
        $getall = $model->getall();
        echo '<pre>';
        print_r($getall);
    }
    
    public function searchid($id){
        if(isset($id)){
            $model = $this->loadModel($this->_model);
            $id_armada = $model->searcharmada($id);
            echo '<pre>';
            print_r($id_armada);
                    
        }
        
    }
    
    public function delete($id){
        if(isset($id)){
            $model = $this->loadModel($this->_model);
            $delete = $model->deletearmada($id);
        }
    }
    
    public function armadanew(){
        extract($_POST);
        print_r($_POST);
        $armada;
        $link;
        $images = $_FILES['file_gambar']['name'].'</br>';
        if(!empty(extract($_POST))){
            if(empty($armada)){
            $error[] = 'Armada Tidak Boleh Kosong !';
            }
            if(empty($link)){
            $error[] = 'Link Tidak Boleh Kosong';
            }
            if(empty($images)){
            $error[] = 'Gambar Tidak Boleh Kosong';
            }
            echo count($error);
            if(count($error) > 0){
                $msg = $error;
                echo '<pre>';
                print_r($msg);
            }
            else {
                echo 'berhasil';
            }
        }
    }

}