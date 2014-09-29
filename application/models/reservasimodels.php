<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'plugins/page.php';
class reservasimodels extends Models {
  
    private $table = 'reservasi';
    
    public function getall(){
        $data = $this->select('*', $this->table.' order by tgl_reservasi desc');
        return $data;
    }
     
    public function insertreservasi($tanggal,$tujuan, $durasi,$harga,$paket,$gambar){
       
        $data = array(':tgl'            => $tanggal,
                      ':durasi'         =>$durasi,
                      ':tujuan'         => $tujuan,
                      ':harga'          => $harga,
                      ':include_paket'  => $paket,
                      ':image'          => $gambar
                      );

        $sql  = "INSERT INTO {$this->table}";
        $sql .= " (tgl_reservasi , tujuan,durasi, harga, include_paket, image)";
        $sql .= " VALUES ( :tgl, :tujuan, :durasi, :harga, :include_paket, :image )";
        $query = $this->db->prepare($sql);
      
        $query->execute($data);      
       
        
    }
    
    public function searchreservasi($id){
        $sql    = "SELECT * from {$this->table} WHERE id_reservasi= {$id}";
        $query  = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();  
    }

    //update dengan gambar
    public function updatereservasiall($tgl,$tujuan,$durasi,$paket,$harga,$gambar,$id){
        // echo $tgl .'<br>'.$tujuan .'<br>'.$paket.'<br>'. $harga .'<br>'. $gambar.'<br>' . $id;die ;
        $sql    = "UPDATE {$this->table} SET tgl_reservasi = ? , tujuan = ? ,durasi = ?, harga = ? ,include_paket = ? , image = ? WHERE id_reservasi = ?";
        $query  = $this->db->prepare($sql);
        $query->execute(array($tgl , $tujuan ,$durasi, $harga , $paket ,$gambar , $id));
                     
    }

    //update tampa gambar
    public function updatereservasi($tgl,$tujuan,$durasi,$paket,$harga,$id)
    {
       $sql     = "UPDATE {$this->table} SET tgl_reservasi = ? , tujuan = ?, durasi = ? , harga = ? ,include_paket = ?  WHERE id_reservasi = ?";
       $query   = $this->db->prepare($sql);
       $query->execute(array($tgl, $tujuan ,$durasi,  $harga ,$paket ,$id));
    }
    
    public function deletereservasi($id){
        $sql     = "DELETE FROM {$this->table} ";
        $sql    .= " WHERE id_reservasi = {$id}";
        $query   = $this->db->prepare($sql);
        $query->execute(array(":id_reservasi" => $id));
    }
    public function pagex(){
        $num_row = $this->db->query('SELECT COUNT(*) from reservasi')->fetchColumn();
        $pages   = new Paginator($num_row,9,array(15,3,6,9,12,25,50,100,250,'All'));
//        echo $pages->display_pages();
        
//        echo "<div align='center'>";
//        echo "<ul class='pagination'>";
//                          echo "<li><a href='#'>&laquo;</a></li>";
//                           echo "<li><a href='#'>".$pages->display_jump_menu().."</a></li>";
//                           echo "<li><a href='#'>&raquo</a></li>";
//                         echo "</ul>";
//                     echo "</div>";    
        echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
        
        $query = "SELECT * FROM {$this->table} ORDER BY id_reservasi ASC LIMIT :start, :end";
        $stmt  = $this->db->prepare($query);
	$stmt->bindParam(':start', $pages->limit_start, PDO::PARAM_INT);
	$stmt->bindParam(':end', $pages->limit_end, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetchAll();
        return $result;
        
    }
}