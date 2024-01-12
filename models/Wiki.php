<?php

require_once '../config/database.php';

class Wiki
{


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    // public function setNomWiki($wiki)
    // {
    //     $this->nomWiki = $wiki;
    // }


    public function AddWiki($data)
    {
        $this->db->query('INSERT INTO wiki (titre,contenu,idCategorie) VALUES (:titre,:contenu,:idCategorie)');
    
        $this->db->bind(':titre', $data['WikiTitre']);
        $this->db->bind(':contenu', $data['WikiContenu']);
        $this->db->bind(':idCategorie', $data['WikiCategorie']);
        
        // Execute
        $this->db->execute();
    
        $lastIdWiki = $this->db->lastID();
        $tags = $data['WikiTags']; // Fix: Use $data['WikiTags'] instead of $this->db->$data['WikiTags']
    
        foreach ($tags as $tag) {
            $this->db->query("INSERT INTO wikitag (idWiki, idTag) VALUES (:wikiId, :tagId)");
            $this->db->bind(':wikiId', $lastIdWiki);
            $this->db->bind(':tagId', $tag); // Fix: Add a semicolon at the end
    
            $this->db->execute();
            
            if (!$this->db->execute()) { // Fix: Remove the unnecessary if condition
                return false;
            }
        }
    
        return true; // Moved outside the loop to ensure it's only returned once after all tags are processed
    }
    

    public function GetWiki(): array
    {
        $query = "SELECT * FROM wiki";
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
}
