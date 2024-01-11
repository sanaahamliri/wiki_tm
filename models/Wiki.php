<?php
class Wiki
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    
    public function AddWiki($data)
    {

        $this->db->query('INSERT INTO wiki (titre,contenu,image) 
        VALUES (:titre, :contenu, :image)');

        $this->db->bind(':titre', $titre);
        $this->db->bind(':contenu', $contenu);
        $this->db->bind(':image', $img);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}