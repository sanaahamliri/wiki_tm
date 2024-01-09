<?php

require_once '../config/database.php';

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
}
?>