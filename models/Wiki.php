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
        $tags = $data['WikiTags'];
    
        foreach ($tags as $tag) {
            $this->db->query("INSERT INTO wikitag (idWiki, idTag) VALUES (:wikiId, :tagId)");
            $this->db->bind(':wikiId', $lastIdWiki);
            $this->db->bind(':tagId', $tag);
    
            $this->db->execute();
            
            if (!$this->db->execute()) { 
                return false;
            }
        }
    
        return true;
    }
    

    public function GetWiki(): array
    {
        $query = "SELECT * FROM wiki";
        $this->db->query($query);
        $dataname = $this->db->resultSet();
       
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
