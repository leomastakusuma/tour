<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Logout extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function logoutAdmin(){
        Auth::handloginAdmin();
        Session::destroy();
        header('location: ' . URL );
        exit;
    }
    public function logoutUser(){
        Auth::handleLogin();
        Session::destroy();
        header('location: ' . URL );
        exit;
        
    }
    
}
