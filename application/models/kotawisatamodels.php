<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class kotawisatamodels extends Models {

    private $table = 'kota_wisata';

    public function getall() {
        $query = "SELECT * From {$this->table} order by id_kotawisata desc";
        $sql = $this->db->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function searchwisata($id) {
        $sql = "SELECT * from {$this->table} WHERE id_kotawisata= {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function deletewisata($id) {
        $sql = "DELETE FROM {$this->table} ";
        $sql .= " WHERE id_kotawisata = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute(array(":id_kotawisata" => $id));
    }

    public function savewisata($kotawisata,$gambar,$link) {
        $data = array(':kotawisata' => $kotawisata,
            ':gambar' => $gambar,
            ':link' => $link
        );

        $sql = "INSERT INTO {$this->table}";
        $sql .= " (kotawisata , gambar,link)";
        $sql .= " VALUES ( :kotawisata, :gambar, :link)";
        $query = $this->db->prepare($sql);

        $query->execute($data);
    }
    public function updatekotawisataall($kotawisata, $gambar, $link, $id_kotawisata) {
        $sql = "UPDATE {$this->table} SET kotawisata = ? , gambar = ? ,link = ? WHERE id_kotawisata = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($kotawisata, $gambar, $link, $id_kotawisata));
        
    }

    //update tampa gambar
    public function updatekotawisata($kotawisata,$link, $id) {
        $sql = "UPDATE {$this->table} SET kotawisata = ? ,link = ? WHERE id_kotawisata = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($kotawisata,$link, $id));
    }

}
