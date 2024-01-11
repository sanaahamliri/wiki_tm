<?php

require_once '../config/database.php';

class Categorie
{
    private $nomCategorie;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function setNomCategorie($categorie)
    {
        $this->nomCategorie = $categorie;
    }


    // Register User
    public function AddCategorie($data)
    {

        $this->db->query('INSERT INTO categorie (nomCategorie) 
        VALUES (:categorieName)');

        $this->db->bind(':categorieName', $data['categorieName']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function GetCategorie(): array
    {
        $query = "SELECT * FROM categorie";
        $this->db->query($query);
        $dataname = $this->db->resultSet(PDO::FETCH_ASSOC);

        $names = array();

        foreach ($dataname as $data) {
            $names[] = $data['nomCategorie'];
            $idCategories[] = $data['idCategorie'];
        }

        return $names;
        return $idCategories;
    }

    // public function deleteCategorie($idCategorie)
    // {
    //     $this->db->query('DELETE FROM categorie WHERE idCategorie = :idCategorie');
    //     $this->db->bind(':idCategorie', $idCategorie);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}



    // public function EditCategorie($data){


    //     $this->db->query('UPDATE `categorie` SET `nomCategorie`='[categorieName]',`nomCategorie`='[NewCategorieName]' WHERE
    //     VALUES (:categorieName)');
    //     // Bind values
    //     $this->db->bind(':categorieName', $data['categorieName']);
    //     // Execute
    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
