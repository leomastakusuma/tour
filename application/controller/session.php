<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class session extends Controller {
    public function index(){
        
    }
    public function test(){
        if(!empty($login)){
            echo $login;
        }
        echo 'a';    
    }
}