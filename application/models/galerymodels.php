<?php

class galerymodels extends Models{
    private $table = 'galery';

    public function getall(){
        $query   = "SELECT * From {$this->table} order by tgl_create desc";
        $sql     = $this->db->prepare($query);
        $sql->execute();
        return $sql->fetchAll();		
    }

    public function save(){

    } 

    public function deletegalery($id) {
        $sql = "DELETE FROM {$this->table} ";
        $sql .= " WHERE id_armada = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute(array(":id_galery" => $id));
    }
    
   


}