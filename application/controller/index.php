<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Index extends Controller{
    private $model = 'beritamodels';


    public function index(){
        $this->redirect('home')  ;
        
        
        
    }
    
    public function Nama(){
    	if(!empty($login)){
            echo $login;
        }
        else {
            echo 'a';
            
        }
    }
}