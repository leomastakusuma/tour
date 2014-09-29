<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ordermodels extends Models{
    private $_table = 'transaksi';
    private $_tablereservasi = 'reservasi';
    private $_tableuser = 'user';
    private $_tableregistrasi = 'registrasi';




    public function saveorder($id_reservasi, $id_user, $jml,$harga,$invoice){
        $tanggal = date('Y-m-d');
        $status  = 'ord';
        $bayar   = $jml * $harga;
        
        $data = array(':id_reservasi'   => $id_reservasi,
                      ':id_user'        =>$id_user,
                      ':jml_reservasi'  => $jml,
                      ':total_harga'    => $bayar,
                      ':tgl_pemesanan'  => $tanggal,
                      ':status'         => $status,
                      ':invoice'        => $invoice
                      );
                     
        $sql  = "INSERT INTO {$this->_table}";
        $sql .= " (id_reservasi , id_user ,jml_reservasi , total_harga , tgl_pemesanan , status, invoice )";
        $sql .= " VALUES ( :id_reservasi, :id_user, :jml_reservasi, :total_harga, :tgl_pemesanan, :status, :invoice )";
        $query = $this->db->prepare($sql);
        $query->execute($data);      
       
    }
    
    public function cekorder($id_reservasi, $tanggal){
        $sql     = "SELECT * from {$this->_table} , {$this->_tablereservasi}";
        $sql    .= " WHERE $this->_table.id_reservasi = $this->_tablereservasi.id_reservasi";
        $sql    .= " AND $this->_table.tgl_pemesanan LIKE '%$tanggal%'";
        $sql    .= " AND $this->_tablereservasi.id_reservasi = $id_reservasi";
//        echo $sql;die;
        $query  = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();  
    }
    
    public function getallORD(){
        $sql  = "SELECT DISTINCT $this->_table.id_transaksi,";
        $sql .= " $this->_table.*, $this->_tableregistrasi.* , $this->_tableuser.* , $this->_tablereservasi.* ";
        $sql .=" FROM $this->_table , $this->_tableuser, $this->_tableregistrasi, $this->_tablereservasi ";
        $sql .=" WHERE $this->_table.id_user = $this->_tableuser.id_user ";
        $sql .=" AND $this->_table.id_reservasi = $this->_tablereservasi.id_reservasi ";
        $sql .= " AND $this->_tableuser.user = $this->_tableregistrasi.username";
        $sql .= " AND $this->_table.status = 'ORD' ";
        $sql .= " AND $this->_table.invoice !='  '";
        $sql .= " group by $this->_table.id_transaksi";
        $query  = $this->db->prepare($sql);
//        print_r($query);die;
        $query->execute();
        return $query->fetchAll();  
                
        
    }
    
    public function getallSUCCES(){
        $sql  = "SELECT DISTINCT $this->_table.id_transaksi,";
        $sql .= " $this->_table.*, $this->_tableregistrasi.* , $this->_tableuser.* , $this->_tablereservasi.* ";
        $sql .=" FROM $this->_table , $this->_tableuser, $this->_tableregistrasi, $this->_tablereservasi ";
        $sql .=" WHERE $this->_table.id_user = $this->_tableuser.id_user ";
        $sql .=" AND $this->_table.id_reservasi = $this->_tablereservasi.id_reservasi ";
        $sql .= " AND $this->_tableuser.user = $this->_tableregistrasi.username";
        $sql .= " AND $this->_table.status = 'SUCCES' ";
        $sql .= " AND $this->_table.invoice !='  '";
        $sql .= " group by $this->_table.id_transaksi";
        $query  = $this->db->prepare($sql);
//        print_r($query);die;
        $query->execute();
        return $query->fetchAll();
    }


    
    
    
    public function deleteORD($id_transaksi){
        $sql    = "DELETE FROM $this->_table WHERE id_transaksi ='{$id_transaksi}'";
        $query  = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id_transaksi));
        
    }
    
    public function updateORD($id_transaksi){
       $status  = 'SUCCES';
       $sql     = "UPDATE {$this->_table} SET status = ? WHERE id_reservasi = ?";
       $query   = $this->db->prepare($sql);
       $query->execute(array($status,$id_transaksi));
    }
}