<?php

require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/config/database.php';

class Utilisateur
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // Register User
    public function register($data)
    {

        $this->db->query('INSERT INTO utilisateur (nom, email, password, role) 
        VALUES (:name, :email, :password, 2)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Login user
    // public function login($Email, $password)
    // {
    //     $row = $this->findUserByEmailOrName($Email);

    //     if ($row == false) return false;

    //     $hashedPassword = $row->password;
    //     if (password_verify($password, $hashedPassword)) {
    //         return $row;
    //     } else {
    //         return false;
    //     }
    // }

    public function findUserByEmailOrName($email)
    {
        $this->db->query('SELECT * FROM utilisateur WHERE email = :email');
        // $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            // print_r($row['nom']);
            return $row;
        } else {
            return false;
        }
    }


    public function getCount(){
        $query = "SELECT COUNT(*) as count FROM utilisateur"; 
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
