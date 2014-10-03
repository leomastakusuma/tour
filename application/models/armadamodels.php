<?php

class Armadamodels extends Models {

    private $table = 'armada';

    public function getall() {

        $query = "SELECT * From {$this->table} order by id_armada desc";
        $sql = $this->db->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function savearmada($armada, $gambar, $link) {
        $data = array(':armada' => $armada,
            ':gambar' => $gambar,
            ':link' => $link
        );

        $sql = "INSERT INTO {$this->table}";
        $sql .= " (armada , gambar,link)";
        $sql .= " VALUES ( :armada, :gambar, :link)";
        $query = $this->db->prepare($sql);

        $query->execute($data);
    }

    public function deletearmada($id) {
        $sql = "DELETE FROM {$this->table} ";
        $sql .= " WHERE id_armada = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute(array(":id_armada" => $id));
    }

    public function searcharmada($id) {
        $sql = "SELECT * from {$this->table} WHERE id_armada= {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function updatearmadaall($armada, $gambar, $link, $id_armada) {
        $sql = "UPDATE {$this->table} SET armada = ? , gambar = ? ,link = ? WHERE id_armada = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($armada, $gambar, $link, $id_armada));
        
    }

    //update tampa gambar
    public function updatearmada($armada,$link, $id) {
        $sql = "UPDATE {$this->table} SET armada = ? ,link = ? WHERE id_armada = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($armada,$link, $id));
    }

}
