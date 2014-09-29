<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *//**
 * Description of admin
 *
 * @author leomasta
 */

//require 'application/templates/admin/view.php';
class admin extends Controller {

    //put your code here
    private $modelreservasi     = 'reservasimodels';
    private $modelberita        = 'beritamodels';
    private $modeltransaksi     = 'ordermodels';
    private $modeluser          = 'usermodels';

    public function __construct() {
        parent::__construct();
        Auth::handloginAdmin();
    }

    /*
     * 
     */

    public function index() {
        require 'application/templates/admin/header.html';
        require 'application/templates/admin/contentsfull.html';
//        require 'application/templates/admin/header.html';
//        require 'application/templates/admin/content.html';
//        require 'application/templates/admin/footer.html';
    }

    public function all() {
        require 'application/templates/admin/header.html';
        require 'application/templates/admin/contentsfull.html';
    }

    public function table() {
        require 'application/templates/admin/tables.html';
    }

    public function reservasi() {
        require 'application/templates/admin/header.html';
        require 'application/views/admin/reservasi/index.html';
        require 'application/templates/admin/footer.html';
    }

    public function insertreservasi() {

        $form = $_POST;
        $tanggal = date('Y-m-d H:i:s');
        $tujuan = $form['tujuan'];
        $durasi = $form['durasi'];
        $paket = $form['paket'];
        $harga = $form['harga'];
        $images = $_FILES['file_gambar']['name'];
        $random = rand(0000, 9999); //function random 
        $newfile = $random . $images;  // implement change name
        $path = getcwd(); //path on  root directory web
        $dir = $path . '/public/images/';

        if (!empty($form)) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));
            $error = array();


            if (empty($tujuan)) {
                $error[] = 'Format Tujuan Salah, Tidak dizinkan format Alphanumeric,Hanya [A-Z,a-z]';
            }
            if(empty($durasi)){
                $error[] = 'Durasi Tidak Boleh Kosong';
            }
            if (empty($paket)) {
                $error[] = 'Paket Tidak Boleh Kosong';
            }
            if (empty($harga)) {
                $error[] = 'Harga Tidak Boleh Kosong';
            }


            if ($extfile != "jpg") {
                $error[] = 'Format Gambar Salah, Hanya ekstensi *.jpg yang diizinkan';
            }

            if (count($error) > 0) {
                $msg = $error;
                require 'application/templates/admin/header.html';
                require 'application/views/admin/reservasi/index.html';
                require 'application/templates/admin/footer.html';
            } else {
                $move_gambar = $dir . basename($newfile);
                move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);

                //simpan ke database
                $model = $this->loadModel($this->modelreservasi);
                $simpan = $model->insertreservasi($tanggal, $tujuan,$durasi, $harga, $paket, basename($newfile));
                $this->redirect('admin/datareservasi');
            }
        }
    }

    //ambil data ketika edit reservasi
    public function editreservasi($idreservasi) {
        if (isset($idreservasi)) {
            $model = $this->loadModel($this->modelreservasi);
            $getall = $model->searchreservasi($idreservasi);
            require 'application/templates/admin/header.html';
            require view . 'admin/reservasi/editreservasi.html';
        }
    }

    //menyimpan edit reservasi
    public function saveeditreservasi() {
        $form = $_POST;
        $id = $form['id'];
        $tanggal = date('Y-m-d H:i:s');
        $durasi  = $form['durasi'];
        $tujuan = $form['tujuan'];
        $paket = $form['paket'];
        $harga = $form['harga'];
        $images = $_FILES['file_gambar']['name'];
        $random = rand(0000, 9999); //function random 
        $newfile = $random . $images;  // implement change name
        $path = getcwd(); //path on  root directory web
        $dir = $path . '/public/images/';

        if (!empty($form)) {
            //validasi

            $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));
            $error = array();
            if (empty($tujuan)) {
                $error[] = 'Format Tujuan Salah, Tidak dizinkan format Alphanumeric,Hanya [A-Z,a-z]';
            }
            if(empty($durasi)){
                 $error[] = 'Durasi Tidak Boleh Kosong';
            }
            if (empty($paket)) {
                $error[] = 'Paket Tidak Boleh Kosong';
            }
            if (empty($harga)) {
                $error[] = 'Harga Tidak Boleh Kosong';
            }

            if (!empty($images)) {
                if (($extfile != "jpg")) {
                    $error[] = 'Format Gambar Salahs, Hanya ekstensi *.jpg yang diizinkan';
                }
            }
            //mengihitung keadaan error
            if (count($error) > 0) {
                $msg = $error;
                $model = $this->loadModel($this->modelreservasi);
                $gambar = $model->searchreservasi($id);
                require 'application/templates/admin/header.html';
                require 'application/views/admin/reservasi/editreservasi.html';
                require 'application/templates/admin/footer.html';
            }
            //jika tidak ada error.
            else {
                $modelreservasi = $this->loadModel($this->modelreservasi);
                $gambar = $modelreservasi->searchreservasi($id);

                //cek gambar kosong atau tidak
                if (!empty($images)) {
                    if (file_exists($dir . $gambar->image)) {
                        unlink($dir . $gambar->image);
                    }
                    $move_gambar = $dir . basename($newfile);
                    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);
                    $simpan = $modelreservasi->updatereservasiall($tanggal, $durasi,$tujuan, $paket, $harga, $newfile, $id);
                    $this->redirect('admin/datareservasi');
                } else {

                    $simpan = $modelreservasi->updatereservasi($tanggal, $tujuan, $durasi,$paket, $harga, $id);
                    $this->redirect('admin/datareservasi');
                }
            }
        }
    }

    //get all reservasi
    public function datareservasi() {
        $modelreservasi = $this->loadModel($this->modelreservasi);
        $getall = $modelreservasi->getall();
        require 'application/templates/admin/header.html';
        require 'application/views/admin/reservasi/datareservasi.html';
        require 'application/templates/admin/footer.html';
    }

    //delete reservasi
    public function deletereservasi($id_reservasi) {
        if (isset($id_reservasi)) {
            $modelreservasi = $this->loadModel($this->modelreservasi);
            $hapus = $modelreservasi->deletereservasi($id_reservasi);
            $this->redirect('admin/datareservasi');
        }
    }

    public function berita() {
        require 'application/templates/admin/header.html';
        require 'application/views/admin/berita/index.html';
        require 'application/templates/admin/footer.html';
    }

    public function beritaall() {
        $modelberita = $this->loadModel($this->modelberita);
        $getberita = $modelberita->getallberita();
        require 'application/templates/admin/header.html';
        require 'application/views/admin/berita/databerita.html';
        require 'application/templates/admin/footer.html';
    }

    public function insertberita() {
        $form = $_POST;
        $tanggal = date('Y-m-d H:i:s');
        $judul = $form['judul'];
        $isi = $form['isiberita'];
        $images = $_FILES['file_gambar']['name'];
        $random = rand(0000, 9999); //function random 
        $newfile = $random . $images;  // implement change name
        $path = getcwd(); //path on  root directory web
        $dir = $path . '/public/images/';
        $lengtjudul = strlen($judul);
        $lengtisi = strlen($isi);


        $error = array();
        $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));
        if (!empty($form)) {
            //validasi degan gambar
            if (!empty($images)) {
                if (!empty($judul) && ($lengtjudul < 10)) {
                    $error[] = 'Judul Minimal 10 Karakter';
                }
                if (!empty($isi) && ($lengtisi < 50)) {
                    $error[] = 'Isin Berita Miniman 50 Karakter !';
                }
                if ($extfile != 'jpg') {
                    $error[] = 'Gambar Hanya Ektensi *.JPG yang diizinkan !';
                }

                //hitung jumlah keaadan error
                if (count($error) > 0) {
                    $msg = $error;
                    require 'application/templates/admin/header.html';
                    require 'application/views/admin/berita/index.html';
                    require 'application/templates/admin/footer.html';
                } else {
                    $move_gambar = $dir . basename($newfile);
                    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);

                    $modelberita = $this->loadModel($this->modelberita);
                    $simpanberita = $modelberita->insertberitaall($tanggal, $judul, $isi, $newfile);
                    $this->redirect('admin/berita');
                }
            }
            //validasi tanpa gambar
            else {
                if (!empty($judul) && ($lengtjudul < 10)) {
                    $error[] = 'Judul Minimal 10 Karakter';
                }
                if (!empty($isi) && ($lengtisi < 50)) {
                    $error[] = 'Isi Berita Miniman 50 Karakter !';
                }

                //hitung jumlah error;              
                if (count($error) > 0) {
                    $msg = $error;
                    require 'application/templates/admin/header.html';
                    require 'application/views/admin/berita/index.html';
                    require 'application/templates/admin/footer.html';
                } else {
                    $modelberita = $this->loadModel($this->modelberita);
                    $simpanberita = $modelberita->insertberitaall($tanggal, $judul, $isi, 'null');
                    $this->redirect('admin/berita');
                }
            }
        }
    }

    public function deleteberita($id_berita) {
        if (isset($id_berita)) {
            $modelberita = $this->loadModel($this->modelberita);
            $hapus = $modelberita->deleteberita($id_berita);
            $this->redirect('admin/beritaall');
        }
    }

    public function beritaedit($id_berita) {
        if (isset($id_berita)) {
            $modelberita = $this->loadModel($this->modelberita);
            $getall = $modelberita->searchberita($id_berita);
            require 'application/templates/admin/header.html';
            require 'application/views/admin/berita/editberita.html';
            require 'application/templates/admin/footer.html';
        }
    }

    public function updateberitaall() {
        $form = $_POST;
        $tanggal = date('Y-m-d H:i:s');
        $id = $form['id'];
        $judul = $form['judul'];
        $isiberita = $form['isiberita'];
        $images = $_FILES['file_gambar']['name'];
        $random = rand(0000, 9999); //function random 
        $newfile = $random . $images;  // implement change name
        $path = getcwd();
        $dir = $path . '/public/images/';
        $lengtjudul = strlen($judul);
        $lengtisi = strlen($isiberita);


        $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));
        if (!empty($form)) {
            $error = array();
            if (!empty($judul) && ($lengtjudul < 10)) {
                $error[] = 'Judul Minimal 10 Karakter';
            }
            if (!empty($isiberita) && ($lengtisi < 50)) {
                $error[] = 'Isin Berita Miniman 50 Karakter !';
            }
            if (!empty($images))
                if ($extfile != 'jpg') {
                    $error[] = 'Gambar Hanya Ektensi *.JPG yang diizinkan !';
                }

            if (count($error) > 0) {
                $msg = $error;
                $modelgambar = $this->loadModel($this->modelberita);
                $gambar = $modelgambar->searchberita($id);
                $loadgambar = $gambar->gambar;
//                    $loadidberita = 
                require 'application/templates/admin/header.html';
                require 'application/views/admin/berita/validasi.html';
                require 'application/templates/admin/footer.html';
            } else {
                $modelberita = $this->loadModel($this->modelberita);
                $gambar = $modelberita->searchberita($id);
                $loadgambar = $gambar->gambar;
                if (!empty($images)) {
                    if (file_exists($dir . $gambar->gambar)) {
                        unlink($dir . $gambar->gambar);
                    }
                    $move_gambar = $dir . basename($newfile);
                    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);
                    $data = array($tanggal, $judul, $isiberita, $newfile, $id);
                    $simpan = $modelberita->updateberitaall($tanggal, $judul, $isiberita, $newfile, $id);
                    $this->redirect('admin/beritaall');

                    $this->redirect('admin/beritaall');
                } else {
                    $id_user = $_SESSION['id_user'];
                    $simpan = $modelberita->updateberita($tanggal, $id_user, $judul, $isiberita, $id);
                    $this->redirect('admin/beritaall');
                }
            }
        }
    }

    public function updateberita() {
        
        $form       = $_POST;
        $tanggal = date('Y-m-d H:i:s');
        $id         = $form['id'];
        $judul      = $form['judul'];
        $isiberita  = $form['isiberita'];
        $lengtjudul = strlen($judul);
        $lengtisi   = strlen($isiberita);
        
         
        if(!empty($form)){
            $error = array();
            if (!empty($judul) && ($lengtjudul < 10)) {
                $error[] = 'Judul Minimal 10 Karakter';
            }
            if (!empty($isiberita) && ($lengtisi < 50)) {
                $error[] = 'Isin Berita Miniman 50 Karakter !';
            }
            /*
             * Cek Keaddaan jumlah error
             */
            if(count($error) > 0){
                $msg = $error;
                require 'application/templates/admin/header.html';
                require 'application/views/admin/berita/validasinoimage.html';
                require 'application/templates/admin/footer.html';            
            }
            else{
                $id_user = $_SESSION['id_user'];
                $modelberita = $this->loadModel($this->modelberita);
                $simpan = $modelberita->updateberita($tanggal, $id_user, $judul, $isiberita, $id);
                $this->redirect('admin/beritaall');
            }
        }
    }
    
    public function orderORD(){
        $modeltransaksi  = $this->loadModel($this->modeltransaksi);
        $getall = $modeltransaksi->getallORD();
        require 'application/templates/admin/header.html';  
        require 'application/views/admin/transaksi/dataorder.html';
        require 'application/templates/admin/footer.html'; 
    }
    
    public function orderSUCCESS(){
        $modeltransaksi  = $this->loadModel($this->modeltransaksi);
        $getall = $modeltransaksi->getallSUCCES();
        require 'application/templates/admin/header.html';  
        require 'application/views/admin/transaksi/dataordersucces.html';
        require 'application/templates/admin/footer.html'; 
    }

        public function deleteORD($id_transaksi){
        if(isset($id_transaksi)){
            $modeltransaksi = $this->loadModel($this->modeltransaksi);
            $modeltransaksi->deleteORD($id_transaksi);
            $this->redirect('admin/orderORD');
        }
        
    }
    
    public function payment($id_transaksi){
        if(isset($id_transaksi)){
            $modeltransaksi = $this->loadModel($this->modeltransaksi);
            $modeltransaksi->updateORD($id_transaksi);
            $this->redirect('admin/orderORD');
        }
    }
    


    public function armada (){
        require 'application/controller/armada.php';
        $armada = new Armada;
        $armada->getall();
                
    }
    
    public function armadanew(){
    
    require 'application/templates/admin/header.html';
    require 'application/views/admin/armada/index.html';
    require 'application/templates/admin/footer.html';
    }
    
    public function savearmada(){
        require 'application/controller/armada.php';
        $armada = new Armada;
        $armada->armadanew();
    }

}
