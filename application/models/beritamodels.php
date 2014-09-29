<?php

class beritamodels extends Models{
    private $table = 'berita';
    
    public function getallberita(){

         $query   = "SELECT * From {$this->table} order by tgl_berita desc";
         $sql     = $this->db->prepare($query);
         $sql->execute();
         return $sql->fetchAll();
       
    }
    public function geta(){
      
        $data = $this->select('*', $this->table.' order by tgl_berita desc');
        return $data;
    
    }


    public function insertberitaall($tgl, $judul,$isi,$gambar){
        $iduser = $_SESSION['id_user'];
        $data = array(':id_user'        => $iduser,
                      ':tgl'            => $tgl,
                      ':judul'          => $judul,
                      ':isi'            => $isi,
                      ':image'          => $gambar
                      );
        $sql  = "INSERT INTO {$this->table}";
        $sql .= " (id_user , tgl_berita, judul_berita, isi_berita, gambar)";
        $sql .= " VALUES ( :id_user, :tgl, :judul, :isi, :image )";
        $query = $this->db->prepare($sql);
        $query->execute($data);      
        
    }
    
    public function deleteberita($id){
        $sql     = "DELETE FROM {$this->table} ";
        $sql    .= " WHERE id_berita = {$id}";
        $query   = $this->db->prepare($sql);
        $query->execute(array(":id_berita" => $id));
    }
    
    public function searchberita($id){
        $sql    = "SELECT * from {$this->table} WHERE id_berita= {$id}";
        $query  = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();  
    }
    
    public function updateberitaall($tgl_berita,$judul_berita,$isi_berita,$gambar,$id_berita){
        $id_user = $_SESSION['id_user'];
        $sql    = "UPDATE {$this->table} SET tgl_berita = ? ,id_user = ? , judul_berita = ? , isi_berita = ? , gambar = ? WHERE id_berita = ?";
        $query  = $this->db->prepare($sql);
        $query->execute(array($tgl_berita ,$id_user, $judul_berita , $isi_berita ,$gambar , $id_berita));
        
                     
    }
    public function updateberita($tgl_berita,$id_user,$judul_berita,$isi_berita,$id_berita){
        $sql      = "UPDATE {$this->table} SET tgl_berita = ? , id_user = ?,judul_berita = ? , isi_berita = ?  WHERE id_berita = ?";
        $query    = $this->db->prepare($sql);
        $query->execute(array($tgl_berita , $id_user, $judul_berita , $isi_berita ,$id_berita));
    }
    
	
}