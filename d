commit 9281d45508f6b78d86ce3fed17c2595315970e2a
Author: leomastakusuma <leomastakusuma@gmail.com>
Date:   Sun Sep 14 00:25:20 2014 +0700

    fixing beritamodel

diff --git a/application/controller/admin.php b/application/controller/admin.php
index 790656e..85f65b8 100644
--- a/application/controller/admin.php
+++ b/application/controller/admin.php
@@ -300,14 +300,78 @@ class admin extends Controller {
  
         }
     }
-    
+   
     public function updateberitaall(){
-        $form = $_POST;
+        $form       = $_POST;
+        $tanggal    = date('Y-m-d H:i:s');
+        $id         = $form['id'];
+        $judul      = $form['judul'];
+        $isiberita  = $form['isiberita'];
+        $images     = $_FILES['file_gambar']['name'];
+        $random     = rand(0000, 9999); //function random 
+        $newfile    = $random . $images;  // implement change name
+        $path       = getcwd();
+        $dir        = $path.'/public/images/'; 
+        $lengtjudul = strlen($judul);
+        $lengtisi   = strlen($isiberita);
+        
+ 
+        $extfile = strtolower(substr($_FILES["file_gambar"]["name"], -3));        
+        if(!empty($form)){   
+                $error = array();
+                if (!empty($judul) && ($lengtjudul < 10)) {
+                    $error[] = 'Judul Minimal 10 Karakter';
+                }
+                if (!empty($isiberita) && ($lengtisi < 50)) {
+                    $error[] = 'Isin Berita Miniman 50 Karakter !';
+                }
+                if(!empty($images))
+                  if ($extfile != 'jpg') {
+                      $error[] = 'Gambar Hanya Ektensi *.JPG yang diizinkan !';
+                }
+                
+                if(count($error) > 0){
+                    $msg          = $error;
+                    $modelgambar  = $this->loadModel($this->modelberita);
+                    $gambar       = $modelgambar->searchberita($id);
+                    $loadgambar   = $gambar->gambar;
+//                    $loadidberita = 
+                    require 'application/templates/admin/header.html';
+                    require 'application/views/admin/berita/validasi.html';
+                    require 'application/templates/admin/footer.html';
+                }
+                else {
+                    $modelberita = $this->loadModel($this->modelberita);
+                    $gambar       = $modelberita->searchberita($id);
+                    $loadgambar   = $gambar->gambar;
+                if (!empty($images)) {
+                    if (file_exists($dir . $gambar->gambar)) {
+                        unlink($dir . $gambar->gambar);
+                    }
+                    $move_gambar = $dir . basename($newfile);
+                    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $move_gambar);
+                    $data =array($tanggal,$judul,$isiberita,$newfile,$id);
+                    $simpan = $modelberita->updateberitaall($tanggal, $judul,$isiberita,$newfile,$id);
+                    $this->redirect('admin/beritaall');
+                    
+                    $this->redirect('admin/beritaall');
+                } else {
+                    $id_user     = $_SESSION['id_user'];
+                    $simpan      = $modelberita->updateberita($tanggal,$id_user,$judul,$isiberita,$id);
+                    $this->redirect('admin/beritaall');
+                    
+                }
+            }
+                    
+               
+        }
         
     }
     public function updateberita(){
-        echo '<pre>';
-        print_r($_POST);
+        $form   = $_POST;
+        if(!empty($form)){
+            
+        }
         
     }
 
diff --git a/application/models/beritamodels.php b/application/models/beritamodels.php
index 94bce6e..cff80b0 100644
--- a/application/models/beritamodels.php
+++ b/application/models/beritamodels.php
@@ -43,15 +43,16 @@ class beritamodels extends Models{
     
     public function updateberitaall($tgl_berita,$judul_berita,$isi_berita,$gambar,$id_berita){
         $id_user = $_SESSION['id_user'];
-        $sql    = "UPDATE {$this->table} SET tgl_berita = ? , judul_berita = ? , isi_berita = ? , gambar = ? WHERE id_berita = ?";
+        $sql    = "UPDATE {$this->table} SET tgl_berita = ? ,id_user = ? , judul_berita = ? , isi_berita = ? , gambar = ? WHERE id_berita = ?";
         $query  = $this->db->prepare($sql);
-        $query->execute(array($tgl_berital , $judul_berita , $isi_berita ,$gambar , $id_user));
+        $query->execute(array($tgl_berita ,$id_user, $judul_berita , $isi_berita ,$gambar , $id_berita));
+        
                      
     }
-    public function updateberita($tgl_berita,$judul_berita,$isi_berita,$id_berita){
-        $id_user  = $_SESSION['id_user'];
-        $sql      = "UPDATE {$this->table} SET tgl_berita = ? , judul_berita = ? , isi_berita = ?  WHERE id_berita = ?";
-        $query->execute(array($tgl_berital , $judul_berita , $isi_berita , $id_user));
+    public function updateberita($tgl_berita,$id_user,$judul_berita,$isi_berita,$id_berita){
+        $sql      = "UPDATE {$this->table} SET tgl_berita = ? , id_user = ?,judul_berita = ? , isi_berita = ?  WHERE id_berita = ?";
+        $query    = $this->db->prepare($sql);
+        $query->execute(array($tgl_berita , $id_user, $judul_berita , $isi_berita ,$id_berita));
     }
     
 	
diff --git a/application/views/admin/berita/editberita.html b/application/views/admin/berita/editberita.html
index 5553c44..7193a0d 100644
--- a/application/views/admin/berita/editberita.html
+++ b/application/views/admin/berita/editberita.html
@@ -54,7 +54,7 @@
                     <div class="col-lg-12">
                         <div class="panel panel-default">
                             <div class="panel-heading">
-                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Input Reservasi</h3>
+                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Edit Berita</h3>
                             </div>
                             <div class="panel-body">
                             <form class="form-horizontal" role="form" action="<?php echo URL?>admin/updateberitaall" method="post" enctype="multipart/form-data">
diff --git a/application/views/admin/berita/validasi.html b/application/views/admin/berita/validasi.html
new file mode 100644
index 0000000..35fe896
--- /dev/null
+++ b/application/views/admin/berita/validasi.html
@@ -0,0 +1,95 @@
+<!DOCTYPE html>
+<!DOCTYPE html>
+<!--application/views/admin/berita/index.html-->
+
+   <script type="text/javascript" src="<?php echo URL;?>public/js/nicEdit-latest.js"></script>
+   <script type="text/javascript">
+       bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
+   </script>
+
+<div id="page-wrapper">
+            <div class="container-fluid">
+                 <div class="row">
+                    <div class="col-lg-12">
+                        <h1 class="page-header">
+                            Data Reservasi <small></small>
+                        </h1>
+                        <ol class="breadcrumb">
+                            <li class="active">
+                                <i class="fa fa-dashboard"></i> <a href="<?php echo URL?>admin/all">Dashboard</a>
+                            </li>
+                            <li>
+                                <i class="fa fa-dashboard"></i> <a href="<?php echo URL?>admin/beritaall">Data Berita</a>
+                            </li>
+                            <li>
+                                <i class="fa fa-dashboard"></i> <a href="<?php echo URL?>admin/berita">Input Berita</a>
+                            </li>
+                            <li>
+                                <i class="fa fa-dashboard"></i> Edit Berita
+                            </li>
+                        </ol>
+                    </div>
+                </div>
+               <!-- Message error--> 
+               
+               <?php
+                if(!empty($msg)):
+                echo "<div class='alert alert-info' role='alert'>";
+                    foreach($msg as $message){
+                        echo "<i class='fa fa-info-circle'></i> ".$message."<br />";
+                    }
+                echo "</div>";    
+                endif;
+                
+               ?> 
+               
+               <!---->            
+                
+               <div class="row">
+                    <div class="col-lg-12">
+                        <div class="panel panel-default">
+                            <div class="panel-heading">
+                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Edit Data Berita</h3>
+                            </div>
+                            <div class="panel-body">
+                            <form class="form-horizontal" role="form" action="<?php echo URL?>admin/updateberitaall" method="post" enctype="multipart/form-data">
+                            <div class="form-group">
+                                <input type="hidden" value="<?php echo $form['id']?>" name='id'>
+                            <label for="nama" class="col-sm-2 control-label">Judul</label>
+                            <div class="col-sm-5">
+                            <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" 
+                                   value ="<?php if(!empty($form['judul'])) echo $form['judul']?>"required>
+                            <!--<textarea class="form-control" id="tujuan" placeholder="Tujuan" name="tujuan" cols="5" rows="3"><?php if(!empty($form['tujuan'])) echo $form['tujuan'] ?></textarea>-->   
+                            </div>
+                            </div>
+                             
+                            <div class="form-group">
+                            <label for="paket" class="col-sm-2 control-label">Isi Berita</label>
+                            <div class="col-sm-10">
+                            <textarea class="form-control" id="isiberita" placeholder="Include Paket" name="isiberita" cols="15" rows="10"><?php if(!empty($form['isiberita'])) echo $form['isiberita']. $form['id']?></textarea>   
+                            </div>
+                            </div>       
+                     
+                            <div class="form-group">
+                            <label for="gambar" class="col-sm-2 control-label">Gambar </label>
+                            <div class="col-sm-4">
+                                <img src="<?php if(!empty($loadgambar)) echo URL .'public/images/'.$loadgambar?>" alt="IMAGE" class="img-rounded" width='40%'></p>
+                                <input type="file" id="file_gambar" name="file_gambar">
+                            <p class="help-block">Pilih Gambar *.jpeg</p>
+                            </div>
+                            </div>
+                               
+                            <div class="form-group">
+                            <div class="col-sm-offset-2 col-sm-10">
+                            <button type="submit" class="btn btn-default">Simpan</button>
+                            <button type="reset" class="btn btn-default">Hapus</button>
+                            </div>
+                            </div>                               
+                            </form>
+                      
+                                
+                                
+                            </div>
+                        </div>
+                    </div>
+                </div>
\ No newline at end of file
diff --git a/public/images/1121leo.jpg b/public/images/1121leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/1121leo.jpg differ
diff --git a/public/images/128leo.jpg b/public/images/128leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/128leo.jpg differ
diff --git a/public/images/2246leo.jpg b/public/images/2246leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/2246leo.jpg differ
diff --git a/public/images/2292leo.jpg b/public/images/2292leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/2292leo.jpg differ
diff --git a/public/images/2396leo.jpg b/public/images/2396leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/2396leo.jpg differ
diff --git a/public/images/3853leo.jpg b/public/images/3853leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/3853leo.jpg differ
diff --git a/public/images/5010leo.jpg b/public/images/5010leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/5010leo.jpg differ
diff --git a/public/images/5073leo.jpg b/public/images/5073leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/5073leo.jpg differ
diff --git a/public/images/534leo.jpg b/public/images/534leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/534leo.jpg differ
diff --git a/public/images/5572leo.jpg b/public/images/5572leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/5572leo.jpg differ
diff --git a/public/images/608leo.jpg b/public/images/608leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/608leo.jpg differ
diff --git a/public/images/6177leo.jpg b/public/images/6177leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/6177leo.jpg differ
diff --git a/public/images/6352leo.jpg b/public/images/6352leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/6352leo.jpg differ
diff --git a/public/images/705leo.jpg b/public/images/705leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/705leo.jpg differ
diff --git a/public/images/7695leo.jpg b/public/images/7695leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/7695leo.jpg differ
diff --git a/public/images/9315leo.jpg b/public/images/9315leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/9315leo.jpg differ
diff --git a/public/images/9513leo.jpg b/public/images/9513leo.jpg
new file mode 100644
index 0000000..7120172
Binary files /dev/null and b/public/images/9513leo.jpg differ
diff --git a/public/images/9927leo.jpg b/public/images/9927leo.jpg
deleted file mode 100644
index 7120172..0000000
Binary files a/public/images/9927leo.jpg and /dev/null differ
