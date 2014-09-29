<?php
//require 'application/libs/session.php';
class login extends Controller {

    public function index(){
        require 'application/views/login/index.html';
       
    }
    
    public function cari(){
        $id = '1';
        $cari = $this->loadModel('usermodels');
        $getuser = $cari->searchuser($id);
        foreach ($getuser as $row)
        {
            print_r($row).'<br>';
        }
//        echo $getuser;
//        $user
    }
    
    public function hapus(){
        require_once "application/views/login/index.html";
        
    }
    
    public function tesquery(){
         $usermodel     = $this->loadModel('user');
         $getalluser    = $usermodel->getuser();
         foreach ($getalluser as $row){
             echo $row->id;
             echo $row->user;
             echo $row->pass;
         }
           
    }
    
    public function tesfunc(){
        
      
        $usermodel  = $this->loadModel('user');
        $user       = $usermodel->getuser();
           $this->view('login','index',$user);
    }
    
    public function proses(){  
       
       session_start();
       $form = $_POST;
       $username = $form['username'];
       $password = $form['password'];
       
       if(!empty($form)){
            $msg = array();
                if(empty($username)){
                    $msg[] = 'Username Tidak Boleh Kosong';
                }
                if(empty($password)){
                    $msg[] = 'Password Tidak Boleh Kosong';
                }
                
            if(count($msg)>0){
                $error_msg = $msg;
                require 'application/views/login/index.html';
            }
           
            else {
                $login   = $this->loadModel('loginmodels');
                $prosess = $login->loginaction($username,$password);
                foreach ($prosess as $key => $value) {
                   $level   = $value->level;
                   $id_user = $value->id_user;
                }
                if(count($prosess)>0){
                  
                  Session::init();
                  Session::set('level', $level);
                  Session::set('logged', true);
                  Session::set('id_user',$id_user);
                  if($level == 'admin'){
                   $this->redirect('admin');
                  }
                  if($level == 'user'){
                   $this->redirect('test');
                  }
                }
                else{
                   echo "<script>alert('username dan password salah !!')</script>";
                   require 'application/views/login/index.html';

                }
            }
            
       }
        
      
      
    }

    public function logout(){

        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
   
    }
}
    
