<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bukutamumodels extends Models{
    private $table = 'bukutamu';
    
    public function getall(){
       $sql   = "SELECT * FROM {$this->table} order by tanggal desc";
       $query = $this->db->prepare($sql);
       $query->execute();
       return $query->fetchAll();
    }
    
    public function save($nama,$email,$komentar,$tanggal){
        $data = array(':nama'     => $nama,
                      ':email'    => $email,
                      ':komentar' => $komentar,
                      ':tanggal'  => $tanggal
                     );
        $sql  = "INSERT INTO {$this->table}";
        $sql .= " (nama , email,komentar, tanggal)";
        $sql .= " VALUES ( :nama, :email, :komentar, :tanggal)";
        $query = $this->db->prepare($sql);
        $query->execute($data);      
        
    }
    public function deletebukutamu($id){
        $sql     = "DELETE FROM {$this->table} ";
        $sql    .= " WHERE id_bukutamu = {$id}";
        $query   = $this->db->prepare($sql);
        $query->execute(array(":id_bukutamu" => $id));
        
    }
}
