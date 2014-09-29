<?php

class Armada extends Models {

	private $table = 'armada';

	public function getall(){

         $query   = "SELECT * From {$this->table} order by id_armada desc";
         $sql     = $this->db->prepare($query);
         $sql->execute();
         return $sql->fetchAll();
	}

	public function savearmada(){

	}

	public function deletearmada($id){

	}

	public function searcharmada($id){

	}

}