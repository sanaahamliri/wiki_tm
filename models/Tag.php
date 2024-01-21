<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/config/database.php';

class Tag{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register User
    public function AddTag($data){
        
        $this->db->query('INSERT INTO tag (nomTag) 
        VALUES (:tagName)');
        // Bind values
        $this->db->bind(':tagName', $data['tagName']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function GetTag(): array
    {
        $query = "SELECT * FROM tag";
        $this->db->query($query);
        $dataname = $this->db->resultSet(PDO::FETCH_ASSOC);

        return $dataname;
    }

    public function deleteTag($idTag)
    {
        // echo $idCategorie;
        // die();
        $this->db->query('DELETE FROM tag WHERE idTag = :idTag');
        $this->db->bind(':idTag', $idTag);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function EditTag($data){


        $this->db->query('UPDATE `tag` SET `nomTag`= :tagName WHERE
        idTag = :idTag');
        // Bind values
        $this->db->bind(':tagName', $data['NewTagName']);
        $this->db->bind(':idTag', $data['id']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getCount(){
        $query = "SELECT COUNT(*) as count FROM tag"; 
        $this->db->query($query);
        $result = $this->db->execute();
        
        if($result) {
            $row = $this->db->single(); 
            return $row['count'];
        } else {
            return 0; 
        }
    }
    
}
?>