<?php

require_once '../config/database.php';

class Categorie{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register User
    public function AddCategorie($data){
        
        $this->db->query('INSERT INTO categorie (nomCategorie) 
        VALUES (:categorieName)');
        // Bind values
        $this->db->bind(':categorieName', $data['categorieName']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
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
?>
