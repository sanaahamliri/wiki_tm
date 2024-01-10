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


    // Dans votre modèle
    public function GetCategorie(): array
    {
        $query = "SELECT * FROM question";
        $stmt = $this->db->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}
