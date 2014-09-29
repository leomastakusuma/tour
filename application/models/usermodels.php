<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class usermodels extends Models{
    
    private $_table = 'user';
    
    public function getalluser(){
        $sql = "SELECT id, user,pass FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        
    }
     
 
    public function searchuser($id ){
        $sql    = "SELECT * from user WHERE id_user='{$id}'";
        $query  = $this->db->prepare($sql);   
        $query->execute();
        return $query->fetchAll();  
    
    }
    
    public function delUser($id){
        $sql    = "DELETE FROM user WHERE id ='{$id}'";
        $query  = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id));
 
    }
    
//    public function getuser(){
////        die;
//        $colums = 'id,user,pass';
//        $data   = $this->select($colums, $this->_table);
//        return $data;
//        
//        
//        
//    }
    
    public function insertuser($username,$password){        
        $level  = 'user';
        $data   = array(':user'=>$username,':pass'=>$password,':level'=>$level);
        $sql    = "INSERT INTO {$this->_table} (user, pass,level)";
        $sql   .= "VALUES (:user, :pass, :level)";
        $query  = $this->db->prepare($sql);
        $query->execute($data);
    }
    
    public function getuserinfo(){
        $sql    = "SELECT * from user WHERE id_user='{$_SESSION['id_user']}'";
        $query  = $this->db->prepare($sql);   
        $query->execute();
        return $query->fetchAll();          
    }
       
        
}   
  
