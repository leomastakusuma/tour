<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Armada extends Controller{
    public function index(){
        require_once 'application/templates/header.html';
        require_once 'application/templates/menu.html';
        require_once 'application/views/armada/index.html';
        require_once 'application/templates/footer.php';  
    }
}