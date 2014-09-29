<?php

class Armadamodels extends Models {

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
        $sql     = "DELETE FROM {$this->table} ";
        $sql    .= " WHERE id_armada = {$id}";
        $query   = $this->db->prepare($sql);
        $query->execute(array(":id_armada" => $id));
	}

	public function searcharmada($id){
		$sql    = "SELECT * from {$this->table} WHERE id_armada= {$id}";
        $query  = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();  
	}

}