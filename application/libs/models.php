<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Models extends Controller{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function select($select,$table){  
        $sql        = "SELECT {$select} ";
        $sql       .= "FROM {$table}";
        $query      = $this->db->prepare($sql);
        $query      ->execute();
        return      $query->fetchAll();   
    }

    #Funtion Search Row
    public function search($colums,$table,$conditon){
        
       
    }
    
    public function delete($table,$where,$conditon){
        $sql  = "DELETE FROM {$table}";
        $sql .= "WHERE [$where] = [$conditon]";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    public function insert($table,$values){
        $data   = array($values);
        $sql    = "INSERT INTO {$table} VALUES {$data}";
        $query  = $this->db->prepare($sql);
        $query->execute;
    }
    
    public function update($table,$set,$values,$where){
        $sql    = "UPDATE {$table} SET {$set} = {$values} WHERE {$where}";
        $query  = $this->db->prepare($sql);
        $query->execute;
    }
    
    
}
