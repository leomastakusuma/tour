<?php

class galerymodels extends Models{
    private $table = 'galery';

    public function getall(){
        $query   = "SELECT * From {$this->table} order by tgl_create desc";
        $sql     = $this->db->prepare($query);
        $sql->execute();
        return $sql->fetchAll();		
    }

   public function savegalery($tanggal,$judul,$event,$gambar) {
        $data = array(':tgl_create' => $tanggal,
                      ':judul'      => $judul,
                      ':event'      => $event,
                      ':gambar'     => $gambar
        );
        $sql = "INSERT INTO {$this->table}";
        $sql .= " (tgl_create , judul, event, gambar)";
        $sql .= " VALUES ( :tgl_create, :judul, :event,  :gambar)";
        $query = $this->db->prepare($sql);      
        $query->execute($data);
     
    }
    
    public function searchgalery($id) {
        $sql = "SELECT * from {$this->table} WHERE id_galery= {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    
    public function deletegalery($id) {
        $sql = "DELETE FROM {$this->table} ";
        $sql .= " WHERE id_galery = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute(array(":id_galery" => $id));
    }
    
    public function updategalery($judul,$event, $id){
        $data = array($judul,$event,$id);
        $tanggal  = date('Y-m-d H-i-s');
        $sql = "UPDATE {$this->table} SET tgl_create =? ,judul = ? ,event = ? WHERE id_galery = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tanggal,$judul,$event, $id));         
    }
    public function updategaleryall($judul,$event,$gambar, $id){
        $data = array($judul,$event,$id);
        $tanggal  = date('Y-m-d H-i-s');
        $sql = "UPDATE {$this->table} SET tgl_create =? ,judul = ? ,event = ?, gambar = ?  WHERE id_galery = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tanggal,$judul,$event,$gambar, $id));         
    }
   


}