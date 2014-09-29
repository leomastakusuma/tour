<?php


class signup extends Controller{
    private $model ='signupmodels';
    
//    public function __construct(){
////          Auth::handleLogin();
//    }
    public function index(){
        require 'application/templates/header.html';
        require 'application/templates/menu.html';
        require 'application/views/signup/index.html';
        require 'application/templates/footer.php';
    }
    public function saves(){
        $form=$_POST;
        $nama = $form['nama'];
        $alamat = $form['alamat'];
        $ttl    = $form['ttl'];
        $jeniskelamin = $form['jeniskelamin'];
        $email          = $form['email'];
        $username       = $form['username'];
        $password       = $form['password'];
        $tgl_registrasi = date('Y-m-d');
        if(!empty($form)){
                    if(!validname($form['nama'])){
                        $msg[] = 'Format Nama Salah';
                    }
                    if(!validaddres($form['alamat']))
                    {
                        $msg[] = 'Format Alamat Salah';
                    }
                    if(!validateEmail($form['email'])){
                        $msg[] = 'Format Email Salah';
                    }
                    if(!empty($form['jeniskelamin'])&& ($form['Jeniskelamin']=='--Pilih--')){
                        $msg[] = 'Jenis Kelamin Tidak Boleh Kosong';
                    }
                    
            
            if(count($msg)>1){
                $flashmsg=$msg;
                require 'application/templates/header.html';
                require 'application/templates/menu.html';
                require 'application/views/signup/index.html';
                require 'application/templates/footer.php';}
            else{
             $model = $this->loadModel($this->model);
             $simpan =$model->insertSignUP($nama,$alamat,$ttl,$jeniskelamin,$email,$username,$password,$tgl_registrasi);
             $this->redirect('signup/getall');
            }
        }     
    }
    
    public function getall(){
        
        $data = $this->loadModel($this->model)->getall();
        require 'application/templates/header.html';
        require 'application/templates/menu.html';
        require 'application/views/signup/data.html';
        require 'application/templates/footer.php';
    }
    
    public function content(){
        require 'application/templates/header.html';
        require 'application/templates/menu.html';
        require 'application/templates/contents.html';
        require 'application/templates/footer.php';
    }
    
    public function save(){
         $form = $_POST;
         $nama      = $form['nama'];
         $alamat    = $form['alamat'];
         $notlp     = $form['notlp'];
         $email     = $form['email'];
         $username  = $form['username'];
         $password  = $form['password'];
         $tgl_registrasi = date('Y-m-d');

       
         if(!empty($form)){
                    //Validasi Form
                    $msg=array();
                    if(!validname($nama) || empty($nama)){
                        $msg[] = 'Format Nama Salah';
                    }
                    if(!validaddres($alamat) || empty($alamat)){
                        $msg[] = 'Format Alamat Salah';
                    }
                    if(!is_numeric($notlp) || empty($notlp)){
                        $msg[] = 'Format No Telp Salah';
                    }
//                    if(!validateEmail($email) || empty($email)){
//                        $msg[] = 'Format Email Salah';
//                    }
                    if(strlen($username)<5 || empty($username)){
                        $msg[] = 'Username Minimal 5 Karakter';
                    }
                    if(strlen($password)<6 || empty($password)){
                        $msg[] = 'Password Mininal 6 Karakter';
                    }
                    
             //Jika Terdapat Kembali Ke Form Dengan Msg.
            
            $msgs=count($msg);
            if($msgs > 0){
                    $errormsg=$msg;
                    require 'application/templates/header.html';
                    require 'application/templates/menu.html';
                    require 'application/views/signup/index.html';
                    require 'application/templates/footer.php';
             }
             //Disimpan ke database
             
             else{
//                 echo '<pre>';
//                 print_r($form);
//                 echo $tgl_registrasi;
             // insert into table sign
             $model         = $this->loadModel($this->model);
             $simpan        =$model->insertSignUP($nama,$alamat,$notlp,$email,$username,$password,$tgl_registrasi);
//             $id_registrasi =$model->countid();
//             echo $id_registrasi;die;
             
             //insert into table user
             $modeluser     = $this->loadModel('usermodels');
             $simpanuser    = $modeluser->insertuser($username,$password);
             
                require 'application/views/signup/succes.html';
             }
         }
         
    }
    public function succes(){
        require 'application/views/signup/succes.html';
    }
}