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
    
    public function deletegalery($id) {
        $sql = "DELETE FROM {$this->table} ";
        $sql .= " WHERE id_armada = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute(array(":id_galery" => $id));
    }
    
   


}