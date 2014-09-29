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

    public function delete(){

    }
    public function search($id){

    }


}