<?php

require_once '../config/database.php';

class Categorie
{
    private $nomCategorie;
    private $id ;


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
        // die(
        //     print_r($dataname)
        // );
        // $names = array();

        // foreach ($dataname as $data) {
            
        //     $names[] = $data['nomCategorie'];
        //     $idCategories[] = $data['idCategorie'];
        // }

        return $dataname;
    }

    public function deleteCategorie($idCategorie)
    {
        // echo $idCategorie;
        // die();
        $this->db->query('DELETE FROM categorie WHERE idCategorie = :idCategorie');
        $this->db->bind(':idCategorie', $idCategorie);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function EditCategorie($data){


        $this->db->query('UPDATE `categorie` SET `nomCategorie`= :categorieName WHERE
        idCategorie = :idCategorie');
        // Bind values
        $this->db->bind(':categorieName', $data['NewCategorieName']);
        $this->db->bind(':idCategorie', $data['id']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}



     
